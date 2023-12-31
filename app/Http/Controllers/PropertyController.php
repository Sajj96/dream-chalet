<?php

namespace App\Http\Controllers;

use App\DataTables\PropertiesDataTable;
use App\Models\Amenity;
use App\Models\HouseType;
use App\Models\Plan;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyPhoto;
use App\Models\PropertyStage;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageFilter;
use App\Models\PropertyFloor;

class PropertyController extends Controller
{
    public function index(Request $request, $prop = null )
    {
        $properties = Property::where('deleted_at', NULL);
        $house_types = HouseType::get()->pluck('name')->toArray();

        $type = explode('=', $prop);

        if(in_array(ucwords(reset($type)), $house_types)) {
            $properties = $properties->where('house_type_id', intval(end($type)));
        }

        if (in_array('bedroom', $type)) {
            if(intval(end($type)) == 5) {
                $properties = $properties->where('bedrooms' , '>=', intval(end($type))); 
            } else {
                $properties = $properties->where('bedrooms' , intval(end($type)));
            }
        }

        if (in_array('bathroom', $type)) {
            $properties = $properties->where('bathrooms', intval(end($type)));
        }

        if ($request->has('search')) {
            $properties = $properties->where('title', 'LIKE', '%'.$request->get('search').'%');
        }

        if ($request->has('sort_price')) {
            if ($request->get('sort_price') == "high_price") {
                $properties = $properties->orderBy('price', 'DESC');
            }

            if ($request->get('sort_price') == "low_price") {
                $properties = $properties->orderBy('price', 'ASC');
            }
        } else {
            $properties = $properties->orderByDesc('id');
        }

        $properties = $properties->get();
        
        return view('pages.properties.index', [
            'properties' => $properties
        ]);
    }

    public function indexDashboard(PropertiesDataTable $datatable)
    {
        return $datatable->render('pages.dashboard.properties.index');
    }

    public function add(Request $request)
    {

        if($request->method() == "GET") {
            $house_types = HouseType::get();
            $house_stages = Stage::get();
            $amenities = Amenity::get();

            return view('pages.dashboard.properties.add',[
                'house_types'  => $house_types,
                'house_stages' => $house_stages,
                'amenities'    => $amenities
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title'        => 'required|string',
            'price'        => 'required|numeric',
            'main_image'   => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first()); 
        }

        try {

            $property = Property::create([
                'title'         => $request->title,
                'house_type_id' => $request->type,
                'price'         => $request->price,
                'currency'      => $request->currency,
                'bedrooms'      => $request->bedroom,
                'bathrooms'     => $request->bathroom,
                'roofs'         => $request->roofs,
                'blocks'        => $request->blocks,
                'floors'        => $request->no_floor,
                'square_meter'  => $request->sqmt,
                'thumbnail'     => "https://",
                'floor_image'   => "https://",
                'details'       => $request->details
            ]);

            if ($request->hasFile('main_image')) {

                $path = storage_path('/app/public/properties/thumbnails/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $thumbnail = $request->main_image->getClientOriginalName();
                $thumbnailExtension = $request->file('main_image')->extension();

                $thumbnail = sprintf("%s_%s_THUMBNAIL.%s", uniqid(),date("YmdHis"), $thumbnailExtension);
                $thumbnailImg = Image::make($request->file('main_image')->getRealPath());
                $thumbnailImg->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                $thumbnailImg->resize(817, 446);

                $thumbnailImg->save(storage_path('/app/public/properties/thumbnails/' . $thumbnail),90);

                $thumbnailLink = url('storage/properties/thumbnails/'.$thumbnail);

                $property->update([
                    'thumbnail'  => $thumbnailLink
                ]);
            }

            if ($request->hasFile('floor_images')) {

                $path = storage_path('/app/public/properties/floors/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $path = storage_path('/app/public/properties/premium/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $floor_images = $request->floor_images;
                if (!is_array($floor_images)) {
                    $floor_images = [$request->floor_images];
                }

                $floorLink = "";

                foreach($floor_images as $floor_image) {
                    $floor = $floor_image->getClientOriginalName();
                    $extension = $floor_image->extension();
    
                    $floor = sprintf("%s_%s_FLOOR.%s", uniqid(), date("YmdHis"), $extension);
                    $premium = sprintf("%s_%s_PREMIUM.%s", uniqid(), date("YmdHis"), $extension);
    
                    $floorImg = Image::make($floor_image->getRealPath());
                    $floorImg->resize(670, 595);
                    $floorImg->filter(new ImageFilter(25))->blur(20);
    
                    $premiumImg = Image::make($floor_image->getRealPath());
                    $premiumImg->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                    $premiumImg->resize(670, 595);
    
                    $floorImg->save(storage_path('/app/public/properties/floors/' . $floor),90);
                    $premiumImg->save(storage_path('/app/public/properties/premium/' . $premium),90);
    
                    $floorLink = url('storage/properties/floors/'.$floor);
                    $premiumLink = url('storage/properties/premium/'.$premium);

                    PropertyFloor::create([
                        'property_id' => $property->id,
                        'photo_path'  => $premiumLink
                    ]);
                }

                $property->update([
                    'floor_image'   => $floorLink
                ]);
            }

            if (!empty($request->attachments) && $request->hasFile('attachments')) {

                $path = storage_path('/app/public/properties/attachments/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $attachments = $request->attachments;
                if (!is_array($attachments)) {
                    $attachments = [$request->attachments];
                }

                foreach($attachments as $attachment) {
                    $fileName = $attachment->getClientOriginalName();
                    $extension = $attachment->extension();
                    $fileName = sprintf("%s_%s_ATTACHMENT.%s", uniqid(), date("YmdHis"), $extension);

                    if(in_array($extension,['png','jpg','jpeg'])) {
                        $img = Image::make($attachment->getRealPath());
                        $img->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                        $img->resize(817, 446);
                        $img->text($request->title, 0, 0, function($font){
                            $font->color([0, 0, 0, 0.5]);
                        });
        
                        $img->save(storage_path('/app/public/properties/attachments/' . $fileName),90);
                    } else {
                        $attachment->storeAs('properties/attachments', $fileName, 'public');
                    }

                    $fileLink = url('storage/properties/attachments/'.$fileName);

                    PropertyPhoto::create([
                        'property_id' => $property->id,
                        'photo_path'  => $fileLink
                    ]);
                }
            }
            
            if(!empty($request->amenities)) {
                $amenities = $request->amenities;
                if (!is_array($amenities)) {
                    $amenities = [$request->amenities];
                }

                foreach($amenities as $amenity) {
                    PropertyAmenity::create([
                        'property_id' => $property->id,
                        'amenity_id'  => $amenity
                    ]);
                }
            }

            if(!empty($request->stages)) {
                foreach($request->stages as $key => $stages) {
                    foreach($stages as $stage) {
                        if($stage != "") {
                            PropertyStage::create([
                                'property_id' => $property->id,
                                'stage_id' => $key,
                                'price' => $stage
                            ]);
                        }
                    }
                }
            }

            return redirect()->route('dashboard.property')->withSuccess('Property created successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors('An error has occurred failed to add new property');
        }
    }

    public function edit(Request $request, $id = null)
    {
        if (empty($id) && $request->has('id')) {
            $id = $request->id;
        }

        $property = Property::find($id);
        if (!$property) {
            return redirect('/dashboard/properties/all')->withErrors('Property not found!');
        }

        if($request->method() == "GET") {
            $house_types = HouseType::get();
            $house_stages = Stage::get();
            $house_amenities = Amenity::get();
            $property_amenities = $property->amenities()->pluck('property_amenities.amenity_id')->toArray();
            $property_stages = $property->stages()->pluck('property_stages.stage_id')->toArray();
            $property_photos = $property->photos;
            $premium_floors = $property->floorImages;

            return view('pages.dashboard.properties.edit',[
                'house_types'     => $house_types,
                'house_stages'    => $house_stages,
                'amenities'       => $house_amenities,
                'property_amenities' => $property_amenities,
                'property_stages' => $property_stages,
                'property_photos' => $property_photos,
                'property' => $property,
                'premium_floors' => $premium_floors
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title'       => 'required|string',
            'price'       => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first()); 
        }

        try {

            $property->title = $request->title;
            $property->house_type_id = $request->type;
            $property->price         = $request->price;
            $property->currency      = $request->currency;
            $property->bedrooms      = $request->bedroom;
            $property->bathrooms     = $request->bathroom;
            $property->roofs         = $request->roofs;
            $property->blocks        = $request->blocks;
            $property->floors        = $request->no_floor;
            $property->square_meter  = $request->sqmt;
            $property->details       = $request->details;

            if ($request->hasFile('main_image')) {

                $path = storage_path('/app/public/properties/thumbnails/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $thumbnail = $request->main_image->getClientOriginalName();
                $thumbnailExtension = $request->file('main_image')->extension();

                $thumbnail = sprintf("%s_%s_THUMBNAIL.%s", uniqid(),date("YmdHis"), $thumbnailExtension);
                $thumbnailImg = Image::make($request->file('main_image')->getRealPath());
                $thumbnailImg->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                $thumbnailImg->resize(817, 446);

                $thumbnailImg->save(storage_path('/app/public/properties/thumbnails/' . $thumbnail),90);

                $thumbnailLink = url('storage/properties/thumbnails/'.$thumbnail);

                $property->update([
                    'thumbnail'  => $thumbnailLink
                ]);
            }

            if ($request->hasFile('floor_images')) {

                $path = storage_path('/app/public/properties/floors/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $path = storage_path('/app/public/properties/premium/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $floor_images = $request->floor_images;
                if (!is_array($floor_images)) {
                    $floor_images = [$request->floor_images];
                }

                $floorLink = "";

                foreach($floor_images as $floor_image) {
                    $floor = $floor_image->getClientOriginalName();
                    $extension = $floor_image->extension();
    
                    $floor = sprintf("%s_%s_FLOOR.%s", uniqid(), date("YmdHis"), $extension);
                    $premium = sprintf("%s_%s_PREMIUM.%s", uniqid(), date("YmdHis"), $extension);
    
                    $floorImg = Image::make($floor_image->getRealPath());
                    $floorImg->resize(670, 595);
                    $floorImg->filter(new ImageFilter(25))->blur(20);
    
                    $premiumImg = Image::make($floor_image->getRealPath());
                    $premiumImg->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                    $premiumImg->resize(670, 595);
    
                    $floorImg->save(storage_path('/app/public/properties/floors/' . $floor),90);
                    $premiumImg->save(storage_path('/app/public/properties/premium/' . $premium),90);
    
                    $floorLink = url('storage/properties/floors/'.$floor);
                    $premiumLink = url('storage/properties/premium/'.$premium);

                    PropertyFloor::create([
                        'property_id' => $property->id,
                        'photo_path'  => $premiumLink
                    ]);
                }

                $property->update([
                    'floor_image'   => $floorLink
                ]);
            }

            if (!empty($request->attachments) && $request->hasFile('attachments')) {

                $path = storage_path('/app/public/properties/attachments/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $attachments = $request->attachments;
                if (!is_array($attachments)) {
                    $attachments = [$request->attachments];
                }

                foreach($attachments as $attachment) {
                    $fileName = $attachment->getClientOriginalName();
                    $extension = $attachment->extension();
                    $fileName = sprintf("%s_%s_ATTACHMENT.%s", uniqid(), date("YmdHis"), $extension);

                    if(in_array($extension,['png','jpg','jpeg'])) {
                        $img = Image::make($attachment->getRealPath());
                        $img->insert('https://dreamchaletengineering.com/assets/img/dce_1.png', 'center', 10, 10);
                        $img->resize(817, 446);
                        $img->text($request->title, 0, 0, function($font){
                            $font->color([0, 0, 0, 0.5]);
                        });
        
                        $img->save(storage_path('/app/public/properties/attachments/' . $fileName),90);
                    } else {
                        $attachment->storeAs('properties/attachments', $fileName, 'public');
                    }

                    $fileLink = url('storage/properties/attachments/'.$fileName);

                    PropertyPhoto::create([
                        'property_id' => $property->id,
                        'photo_path'  => $fileLink
                    ]);
                }
            }
            
            if(!empty($request->amenities)) {
                $amenities = $request->amenities;
                if (!is_array($amenities)) {
                    $amenities = [$request->amenities];
                }

                foreach($amenities as $amenity) {
                    PropertyAmenity::create(
                        [
                           'property_id' => $property->id,
                           'amenity_id'  => $amenity
                        ],
                        [
                            'property_id' => $property->id,
                            'amenity_id'  => $amenity
                        ]
                   );
                }
            }

            if(!empty($request->stages)) {
                foreach($request->stages as $key => $stages) {
                    foreach($stages as $stage) {
                        if($stage != "") {
                            PropertyStage::updateOrCreate(
                                [
                                    'property_id' => $property->id,
                                    'stage_id' => $key
                                ], 
                                [
                                    'property_id' => $property->id,
                                    'stage_id' => $key,
                                    'price' => $stage
                                ]
                           );
                        }
                    }
                }
            }

            $property->save();

            return redirect()->route('dashboard.property')->withSuccess('Property updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withErrors('An error has occurred failed to update property');
        }
    }

    public function view(Request $request, $prop = null)
    {
        $prop = explode("-", $prop);
        $id = (int) end($prop);

        if (empty($id)) {
            return back()->withWarning("You must provide Property's ID");
        }

        $property = Property::find($id);
        if (!$property) {
            return back()->withError('Property not found');
        }

        $amenities = $property->amenities;
        $stages = $property->stages;
        $photos = $property->photos;
        $plans = Plan::get();
        $similar_properties = Property::where('house_type_id',$property->id)
                            ->where('deleted_at', NULL)->whereNot('id', $property->id)
                            ->latest()->take(3)->get();
        
        $reviews = $property->reviews()->orderByDesc('id')->get();
        $premium_floors = $property->floorImages;
        
        $property->clicks = $property->clicks + 1;
        $property->save();

        $trending_property = Property::where('deleted_at', NULL)->orderBy('clicks', 'DESC')->first();

        return view('pages.properties.view', [
            'property' => $property,
            'amenities' => $amenities,
            'stages'   => $stages,
            'photos' => $photos,
            'plans' => $plans,
            'similar_properties' => $similar_properties,
            'reviews' => $reviews,
            'premium_floors' => $premium_floors,
            'trending_property' => $trending_property
        ]);
    }

    public function downloadFile(Request $request, $id)
    {
        $property = Property::whereId($id)->where('deleted_at', NULL)->first();
        if (!$property) {
            return back()->withError('Property not found');
        }

        if($property->hasUserSubscribed) {
            $path = Property::whereId($id)->value("premium_image");
            $headers = [
                'Content-Type'        => 'application/jpeg',
                'Content-Disposition' => 'attachment; filename="HouseFloorPlan.jpg"',
            ];
    
            // return Response::make(Storage::disk('public')->get($path), 200, $headers);
        }

        return back()->withError('Please subscribe first to download the file!');
    }

    public function delete(Request $request) {
        try {
            if ($request->has('property_id')) {
                $property = Property::find($request->input('property_id'));
                if ($property){
                    $property->delete();
                    return redirect('/dashboard/properties/all')->withSuccess('Property Deleted');
                } else {
                    return back()->withError('Property not found');
                }
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/properties/all')->withError('Property could not be deleted');
    }
}
