<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function edit(User $user){
        return view('user.edit',compact('user'));
    }

    

    public function update(User $user, Request $request) {
        $image = $request->file('image');
        
        $request->validate([
            'about' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($image) {
            $oldImagePath = public_path('storage/users/' . $user->image);
    
            // Check if the user has an existing image and it's a file, then delete it.
            if ($user->image && is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 250)->save(public_path('storage/users/' . $image_name));
        } else {
            $image_name = $user->image;
        }
    
        $user->update([
            'about' => $request->about,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image_name,
        ]);
    
        return redirect(route('user.index'))->with('success', 'Profile Updated Successfully');
    }
    

    public function myprofile(User $user){
        
        return view('user.myprofile',compact('user'));
    }


    public function delete(User $user){
        // $this->authorize('delete', $user);
        $user->delete();
        return redirect(route('user.index'))->with('success','User Deleted Successfully');
    }

}
