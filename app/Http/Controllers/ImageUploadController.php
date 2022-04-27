<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;

class ImageUploadController extends Controller
{
    function index()
    {
     return view('image_upload');
    }

    public function store(Request $request)
    {
    	$image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $image->move(public_path('images'),$avatarName);
         
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $avatarName;
        $imageUpload->uzklausosId = $request->uzklausosId;
        $imageUpload->save();
        return response()->json(['success'=>$avatarName]);
    }

    function destroy(Request $request)
    {
        $filename = $request->get('filename');
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path().'/images/'.$filename;
        
        if(file_exists($path)){
            unlink($path);
        }

        return $filename;
    }
}
?>
