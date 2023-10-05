<?php

namespace App\Http\Controllers;

use App\DataTables\PropertiesDataTable;
use App\Models\Amenity;
use App\Models\HouseType;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyPhoto;
use App\Models\PropertyStage;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function index(Request $request, $prop = null )
    {
        $properties = Property::where('deleted_at', NULL)->orderByDesc('id');

        if(!empty($prop)) {
            $properties = $properties->where('house_type_id', end($prop_type));
        }

        if (!empty($request->bedroom)) {
            $properties = $properties->where('bedrooms' , intval($request->bedroom));
        }

        if (!empty($request->bathroom)) {
            $properties = $properties->where('bathrooms', intval($request->bathroom));
        }

        if (!empty($request->sort_price)) {
            if ($request->sort_price == "high_price") {
                $properties = $properties->orderBy('price', 'DESC');
            }

            if ($request->sort_price == "low_price") {
                $properties = $properties->orderBy('price', 'ASC');
            }
        }

        $properties = $properties->lazy();
        
        return view('pages.properties.index', [
            'properties' => $properties
        ]);
    }

    public function indexDashboard(PropertiesDataTable $datatable)
    {
        return $datatable->render('pages.dashboard.properties.index');
    }

    public function getAll(Request $request, $prop = null)
    {
        $properties = Property::where('deleted_at', NULL)->orderByDesc('id');

        if(!empty($prop)) {
            $properties = $properties->where('house_type_id', end($prop_type));
        }

        if (!empty($request->bedroom)) {
            $properties = $properties->where('bedrooms' , intval($request->bedroom));
        }

        if (!empty($request->bathroom)) {
            $properties = $properties->where('bathrooms', intval($request->bathroom));
        }

        if (!empty($request->sort_price)) {
            if ($request->sort_price == "high_price") {
                $properties = $properties->orderBy('price', 'DESC');
            }

            if ($request->sort_price == "low_price") {
                $properties = $properties->orderBy('price', 'ASC');
            }
        }

        $properties = $properties->lazy();

        return view('pages.properties.index', [
            'properties' => $properties
        ]);
    }

    public function add(Request $request)
    {
        $house_stages = Stage::get();
        $amenities = Amenity::get();

        if($request->method() == "GET") {
            $house_types = HouseType::get();

            return view('pages.dashboard.properties.add',[
                'house_types'  => $house_types,
                'house_stages' => $house_stages,
                'amenities'    => $amenities
            ]);
        }

        $validator = Validator::make($request->all(), [
            'title'       => 'required|string',
            'price'       => 'required|numeric',
            'main_image'  => 'image|mimes:jpg,jpeg,png,gif',
            'floor_image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first()); 
            return response()->json(['error' => 'ok']);
        }

        try {

            $property = Property::create([
                'title'         => $request->title,
                'house_type_id' => $request->type,
                'price'         => $request->price,
                'currency'      => $request->currency,
                'bedrooms'      => $request->bedroom,
                'bathrooms'     => $request->bathroom,
                'floors'        => $request->no_floor,
                'square_meter'  => $request->sqmt,
                'thumbnail'     => "https://",
                'floor_image'   => "https://",
                'premium_image' => "https://",
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
                $thumbnailImg->resize(817, 446);

                $thumbnailImg->save(storage_path('/app/public/properties/thumbnails/' . $thumbnail),90);

                $thumbnailLink = url('storage/properties/thumbnails/'.$thumbnail);

                $property->update([
                    'thumbnail'  => $thumbnailLink
                ]);
            }

            if ($request->hasFile('floor_image')) {

                $path = storage_path('/app/public/properties/floors/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $path = storage_path('/app/public/properties/premium/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $floor = $request->floor_image->getClientOriginalName();
                $floorExtension = $request->file('floor_image')->extension();

                $floor = sprintf("%s_%s_FLOOR.%s", uniqid(), date("YmdHis"), $floorExtension);
                $premium = sprintf("%s_%s_PREMIUM.%s", uniqid(), date("YmdHis"), $floorExtension);

                $floorImg = Image::make($request->file('floor_image')->getRealPath());
                $floorImg->resize(817, 446);
                $floorImg->pixelate(12)->blur(100);

                $premiumImg = Image::make($request->file('floor_image')->getRealPath());
                $premiumImg->resize(817, 446);

                $floorImg->save(storage_path('/app/public/properties/floors/' . $floor),90);
                $premiumImg->save(storage_path('/app/public/properties/premium/' . $premium),90);

                $floorLink = url('storage/properties/floors/'.$floor);
                $premiumLink = url('storage/properties/premium/'.$premium);

                $property->update([
                    'floor_image'   => $floorLink,
                    'premium_image' => $premiumLink
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
                        PropertyStage::create([
                            'property_id' => $property->id,
                            'stage_id' => $key,
                            'price' => $stage
                        ]);
                    }
                }
            }

            Session::flash('success', 'Property created successfully'); 
            return response()->json(['success' => 'ok']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'An error has occurred failed to add new property'); 
            return response()->json(['error' => 'ok']);
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

        return view('pages.properties.view', [
            'property' => $property,
            'amenities' => $amenities,
            'stages'   => $stages,
            'photos' => $photos
        ]);
    }

    public function delete(Request $request) {
        try {
            if ($request->has('property_id')) {
                $property = Property::find($request->input('property_id'));
                if ($property){
                    $property->delete();
                    return redirect('/dashboard/properties')->withSuccess('Property Deleted');
                } else {
                    return back()->withError('Property not found');
                }
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/properties')->withError('Property could not be deleted');
    }
}
