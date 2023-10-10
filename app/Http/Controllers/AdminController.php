<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    }//end method

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method 

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));

    }// End Method 

    public function AdminUpdate(Request $request){

        $profile_id = Auth::user()->id;

        $old_photo = "";

        $oldphoto = $request->old_photo;


        

        if($request->file('photo')){

            if (!empty($oldphoto)) {
                unlink($oldphoto);
            }

            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/admin_photo/'.$name_gen);
            $save_url = 'upload/admin_photo/'.$name_gen;

            User::findOrFail($profile_id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'ตั้งค่าโปรไฟล์ใหม่เรียบร้อยแล้ว', 
                'alert-type' => 'info'
            );

            

            return redirect()->back()->with($notification);


        } else {

            User::findOrFail($profile_id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'ตั้งค่าโปรไฟล์ใหม่เรียบร้อยแล้วแบบไม่มีรูป', 
                'alert-type' => 'info'
            );

            

            return redirect()->back()->with($notification);

        } // End Eles 


    }// End Method 

    public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method

    
}
