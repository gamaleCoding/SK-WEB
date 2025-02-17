<?php

namespace App\Http\Controllers;

use App\Models\ManageImages;
use Carbon\Carbon;
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
            'files.*' => 'required|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi,mkv,webm|max: 51200'
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
                'message' => 'Files uploaded successfully.',
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
        $images = ManageImages::orderBy('created_at', 'DESC')->get();
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
        if ($deleteImage) {
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);
        }
    }

    public function update_image(Request $request)
    {
        // dd($request->all());
        $updateDescription = ManageImages::where('id', $request->id)->update([
            'image_name' => $request->description,
        ]);
        if ($updateDescription) {
            return response()->json([
                'success' => true,
                'message' => 'Images updated successfully'
            ]);
        }
    }

    public function search_images(Request $request)
    {
        $search = $request->input('query');

        $data = ManageImages::query();

        if ($search) {
            $data->where('image_name', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%");
        }
        $allData = $data->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'success' => true,
            'images' => $allData
        ]);
    }

    public function filterBy_date(Request $request)
    {
        $dateSelected = $request->date;
        if (is_array($dateSelected) && count($dateSelected) == 2) {
            $startDate = $dateSelected[0];
            $endDate = $dateSelected[1];
            $formattedStartDate = Carbon::parse($startDate)->format('Y-m-d H:i:s');
            $formattedEndDate = Carbon::parse($endDate)->format('Y-m-d H:i:s');

        }
        // dd($formattedDate);
        $images = ManageImages::whereBetween('created_at', [$formattedStartDate, $formattedEndDate])
            ->orderBy('created_at', 'DESC')
            ->get();
        if ($images) {
            return response()->json([
                'success' => true,
                'images' => $images
            ]);
        }
        return response()->json([
            'success' => false,
            'messages' => 'No image found'
        ]);

    }
}

