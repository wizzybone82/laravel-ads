<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ads;

class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.adminHome');
    }

    public function users_list(){

        $users = User::whereIsAdmin(0)->get();
        return view('admin.users_list',compact('users'));
    }

    public function activate_user($id){
        $user_info = User::whereid($id)->first();

        if(!$user_info->active_status){
            $activate = User::whereid($id)->update(['active_status' => 1]);
            if($activate){
                return redirect('admin/users')->with('success','User Activated Successfully');
            }else{
                dd('error');
            }
        }else{
            $activate = User::whereid($id)->update(['active_status' => 0]);
            if($activate){
                return redirect('admin/users')->with('success','User In Activated Successfully');
            }else{
                dd('error');
            }
        }
      
    }

    public function delete_ad($id){
        $delete = Ads::whereAdId($id)->delete();

        if($delete){
            return redirect()->back()->with('success','Ad Deleted successfully');
        }else{
            dd('problem with deleting the advertisment');
        }
    }
}
