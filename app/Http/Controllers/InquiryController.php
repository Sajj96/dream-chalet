<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::get();
        return view('pages.dashboard.inquiries.index', ['inquiries' => $inquiries]);
    }

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'service'         => 'required|string',
            'full_name'       => 'required|string',
            'email'           => 'required|string',
            'mobile'          => 'required|string',
            'street'          => 'required|string',
            'ward'            => 'required|string',
            'city'            => 'required|string',
            'country'         => 'required|string',
            'delivery_fee'    => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $inquiry = Inquiry::create([
                'type'      => $request->service,
                'property_id'  => $request->property_id,
                'name'      => $request->full_name,
                'email'     => $request->email,
                'mobile'    => $request->mobile,
                'street'    => $request->street,
                'ward'      => $request->ward,
                'city'      => $request->city,
                'country'   => $request->country,
                'description' => $request->description,
                'amount' => (int) $request->amount,
                'delivery_fee' => (int) $request->delivery_fee
            ]);

            if(Auth::check()) {
                $inquiry->update([
                    'user_id' => Auth::user()->id
                ]);
            }

            if ($request->hasFile('support_image')) {

                $path = storage_path('/app/public/properties/supporting_docs/');
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $file = $request->support_image->getClientOriginalName();
                $fileExtension = $request->file('support_image')->extension();

                $file = sprintf("%s_%s_DOC.%s", uniqid(),date("YmdHis"), $fileExtension);
                $fileImg = Image::make($request->file('support_image')->getRealPath());
                $fileImg->resize(817, 446);

                $fileImg->save(storage_path('/app/public/properties/supporting_docs/' . $file),90);

                $fileLink = url('storage/properties/supporting_docs/'.$file);

                $inquiry->update([
                    'photo_path'  => $fileLink
                ]);
            }

            return redirect()->route('checkout',['inquiry' => $inquiry->id])->withSuccess('Your information have been submitted successfully!');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to send information');
        }
    }

    public function delete(Request $request) {
        try {
            if ($request->has('inquiry_id')) {
                $house_inquiry = Inquiry::find($request->input('inquiry_id'));
                $house_inquiry->delete();
                return redirect('/dashboard/inquiries')->withSuccess('Inquiry deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/inquiries')->withError('Inquiry could not be deleted');
    }
}
