<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileImageUploadController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a unique image name
        $imageName = 'avatar-user' . $request->user()->id .'.'.$request->image->extension();

        // Store the image in the 'public/profile/{user_id}' directory
        $path = $request->file('image')->storeAs('profile/'.$request->user()->id, $imageName, 'public');

        // Update user's image path
        $request->user()->update([
            'image_path' => $path
        ]);

        if($request->expectsJson()){
            return response()->json(['message' => $path]);
        }

        return back()->with('success','You have successfully upload image.');
    }
}
