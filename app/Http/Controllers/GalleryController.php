<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function index()
    {
        $albums = [
            'Kurunegala' => ['key' => 'kurunegala', 'image' => 'assets/images/kurunegala.jpg'],
            'Vawniya' => ['key' => 'vawniya', 'image' => 'assets/images/vawniya.jpg'],
            'Mannar' => ['key' => 'mannar', 'image' => 'assets/images/mannar.jpg'],
            'Mathale' => ['key' => 'mathale', 'image' => 'assets/images/mathale.jpg'],
            'Anuradhapura' => ['key' => 'anuradhapura', 'image' => 'assets/images/anuradhapura.jpg'],
            'Puttalam' => ['key' => 'puttalam', 'image' => 'assets/images/puttalam.jpg'],
            'Special Events' => ['key' => 'special_events', 'image' => 'assets/images/special_events.jpg'],
            'Others' => ['key' => 'others', 'image' => 'assets/images/other.jpg'],
        ];
        return view('gallery.gallery_index', compact('albums'));
    }
 

public function showAlbum($album)
{
    $model = $this->getModel($album); // Get the appropriate model for the album
    $folders = $model::all(); // Fetch all records as objects
    return view('gallery.gallery_album', compact('album', 'folders'));
}



// public function uploadImage(Request $request, $album, $folderId)
// {
//     $request->validate([
//         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $model = $this->getModel($album); // Dynamically get the model based on the album
//     $folder = $model::findOrFail($folderId); // Retrieve the folder by ID

//     if ($request->hasFile('images')) {
//         foreach ($request->file('images') as $image) {
//             // Store the image in a specific folder based on the album and folder ID
//             $path = $image->store('uploads/' . $album . '/' . $folder->folder_name, 'public');

//             // Save the image path and album name to the images table
//             \App\Models\Image::create([
//                 'folder_id' => $folder->id,
//                 'album_name' => $album, // Save the album name
//                 'image_path' => $path,  // Path to the stored file
//             ]);
//         }
//     }

//     return redirect()->route('gallery.folder', [$album, $folderId])->with('success', 'Images uploaded successfully.');
// }

// public function uploadImage(Request $request, $album, $folder)
// {
//     // Validate the uploaded files
//     $request->validate([
//         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
//     ]);

//     $model = $this->getModel($album); // Get the dynamic model
//     $folderRecord = $model::findOrFail($folder); // Find the folder record

//     if ($request->hasFile('images')) {
//         foreach ($request->file('images') as $image) {
//             // Store the image in the appropriate directory
//             $path = $image->store('uploads/' . $album . '/' . $folderRecord->folder_name, 'public');

//             // Save the image metadata in the database
//             \App\Models\Image::create([
//                 'folder_id' => $folderRecord->id,
//                 'album_name' => $album,
//                 'image_path' => $path,
//             ]);
//         }
//     }

//     return redirect()->route('gallery.folder', [$album, $folder])->with('success', 'Images uploaded successfully.');
// }

public function uploadImage(Request $request, $album, $folderId)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each uploaded image
    ]);

    $model = $this->getModel($album); // Get the model dynamically
    $folder = $model::findOrFail($folderId); // Find the folder by ID

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Store each image in the specified directory
            $path = $image->store('uploads/' . $album . '/' . $folder->folder_name, 'public');

            // Save image details in the database
            \App\Models\Image::create([
                'folder_id' => $folder->id,
                'album_name' => $album,
                'image_path' => $path,
            ]);
        }
    }

    return redirect()->route('gallery.folder', [$album, $folderId])->with('success', 'Images uploaded successfully.');
}



    // Delete an image
    public function deleteImages(Request $request, $album, $folderId)
    {
        // Validate that selected_images is provided
        $request->validate([
            'selected_images' => 'required|string',
        ]);
    
        $imageIds = explode(',', $request->input('selected_images'));
    
        // Delete images from the database and storage
        $images = \App\Models\Image::whereIn('id', $imageIds)->get();
        foreach ($images as $image) {
            // Delete from storage
            \Illuminate\Support\Facades\Storage::delete('public/' . $image->image_path);
            // Delete from database
            $image->delete();
        }
    
        return redirect()->back()->with('success', 'Selected images deleted successfully.');
    }
    

    
    public function showFolder($album, $folderId)
{
    $model = $this->getModel($album); // Dynamically get the model based on the album
    $folder = $model::findOrFail($folderId); // Retrieve the folder by ID

    $images = \App\Models\Image::where('folder_id', $folderId)
                                ->where('album_name', $album)
                                ->get(); // Fetch images specific to the album and folder

    return view('gallery.gallery_folder', compact('album', 'folder', 'images'));
}


    public function storeFolder(Request $request, $album)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
    
        // Get the appropriate model for the album
        $model = $this->getModel($album);
    
        // Ensure that the 'folder_name' and other fields are mapped correctly
        $model::create([
            'folder_name' => $request->input('name'), // Ensure correct input mapping
            'description' => $request->input('description'),
            'image_path' => null, // Add this explicitly if image_path is nullable
        ]);
    
        // Return success message
        return back()->with('success', 'Folder created successfully!');
    }
    
    public function destroyFolder($album, $folderId)
{
    $model = $this->getModel($album); // Get the model dynamically
    $folder = $model::findOrFail($folderId); // Find the folder by ID

    // Delete all images in the folder
    foreach ($folder->images as $image) {
        Storage::delete($image->image_path); // Delete image file
        $image->delete(); // Delete image record from database
    }

    // Delete the folder itself
    $folder->delete();

    return back()->with('success', 'Folder and its images deleted successfully!');
}



    // Get the model for a specific album
    private function getModel($album)
    {
        $models = [
            'kurunegala' => \App\Models\Kurunegala::class,
            'vawniya' => \App\Models\Vawniya::class,
            'mannar' => \App\Models\Mannar::class,
            'mathale' => \App\Models\Mathale::class,
            'anuradhapura' => \App\Models\Anuradhapura::class,
            'puttalam' => \App\Models\Puttalam::class,
            'special_events' => \App\Models\SpecialEvents::class,
            'others' => \App\Models\Others::class,
        ];

        return $models[$album];
    }



    

}
