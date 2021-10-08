<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Show the application view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner/image-crop');
    }

    /**
     * Submit image upload.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCropPost(Request $request)
    {
        $request->validate([
            'bannerFile' => 'required',
            'bannerFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if(!empty($request->bannerFile)) {
            $data = $request->bannerFile;

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);
            $image_name = time() . '.png';
            $path = public_path('storage/banner/'.$image_name);
            file_put_contents($path, $data);

            $bannerModal = new Banner();
            $bannerModal->name = json_encode($image_name);
            $bannerModal->image_path = json_encode($path);
            $bannerModal->save();

            //return back()->with('success', 'Banner has successfully uploaded!');
            return response()->json(['status' => 1, 'message' => "Image uploaded successfully"]);
        }
    }

    public function fileUpload(Request $req){
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if($req->hasfile('imageFile')) {
            $file = $req->file('imageFile');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/storage/banner/', $name);
            $imgData = $name;

            $fileModal = new Banner();
            $fileModal->name = json_encode($imgData);
            $fileModal->image_path = json_encode($imgData);
            $fileModal->save();

            return back()->with('success', 'Banner has successfully uploaded!');
        }
    }
}
