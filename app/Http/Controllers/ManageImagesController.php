<?php

namespace App\Http\Controllers;

use App\Models\ManageImages;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageImagesController extends Controller
{
    public function manage_images()
    {
        return Inertia::render('AdminPage/ManageImages');
    }

    public function upload_images(Request $request)
    {
        if (!$request->hasFile('files')) {
            return response()->json([
                'success' => false,
                'message' => 'No files received by the server.'
            ], 400);
        }

        $request->validate([
            'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max: 20480'
        ]);
        // dd($request->all());

        $uploadedImages = [];

        // dd($uploadedImages);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('uploads', 'public');
                $originalName = $file->getClientOriginalName();

                // dd($filePath);

                $image = ManageImages::create([
                    'file_path' => $filePath,
                    'image_name' => $originalName,
                    'created_by' => Auth::user()->id,
                ]);

                $uploadedImages[] = $image;
                // dd($uploadedImages);

            }

            return response()->json([
                'success' => true,
                'message' => 'Images uploaded successfully.',
                'images' => $uploadedImages
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No files were uploaded.'
        ], 400);
    }

    public function display_images()
    {
        $images = ManageImages::all();
        // dd($images);
        return response()->json([
            'success' => true,
            'images' => $images
        ]);
    }

    public function delete_image(Request $request)
    {
        // dd($request->all());
        $deleteImage = ManageImages::where('id', $request->id)->delete();
        if($deleteImage){
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);
        }
    }
}

