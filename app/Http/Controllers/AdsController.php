<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_active');
    }

    public function all_ads(){
        $all_ads = Ads::whereAdStatus(1)->get();
        return view('all_ads',compact('all_ads'));
    }
    public function index()
    {
        $ads_list =  Ads::with('users')->whereOwnerId(auth()->user()->id)->get();
       
        return view('ads.list',compact('ads_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('ads.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','string'],
            'price' => ['required'],
            'image' => ['required'],
        ]);

        if($validation->fails()){
            return redirect()->back()->with('error','Please validate the fields');
        }

    
        $filename = rand(100,1000).time().'ad'.'.'.$request->image->extension();

        $request->image->move(public_path('ads'), $filename);

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'owner_id' => auth()->user()->id,
            'owner_type' => (auth()->user()->is_admin)?'admin':'user',
            'ad_image' => $filename,
        );

        $insert =  Ads::create($data);

        if($insert){
            return redirect()->back()->with('success','Ad Created successfully');
        }else{
                dd('problem with the insert');
        }
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $details =  Ads::whereAdId($id)->first();
       $comments = Comment::with('user')->whereCommentAdId($id)->get();
    
       return view('ads.show',compact('details','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::whereAdId($id)->first();
        return view('ads.edit',compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','string'],
            'price' => ['required'],
        ]);

        if($validation->fails()){
            return redirect()->back()->with('error','Please validate the fields');
        }


        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        );

        
        if($request->has('image')){
            $filename = rand(100,1000).time().'ad'.'.'.$request->image->extension();
            $request->image->move(public_path('ads'), $filename);
            $data['ad_image'] = $filename;
        }
     

        $update =  Ads::whereAdId($id)->update($data);

        if($update){
            return redirect()->back()->with('success','Ad Updated successfully');
        }else{
                dd('problem with the insert');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Ads::whereAdId($id)->delete();

        if($delete){
            return redirect()->back()->with('success','Ad Deleted successfully');
        }else{
            dd('problem with deleting the advertisment');
        }
    }
    
    public function change_status($id){
        $status_info = Ads::whereAdId($id)->get()->toArray();
       

        if($status_info[0]['ad_status'] == 1){
            $update = Ads::whereAdId($id)->update(['ad_status'=> 0]);
            if($update){
                return redirect()->back()->with('success','Ad Unpublished successfully');
            }
        }else{
            $update = Ads::whereAdId($id)->update(['ad_status'=> 1]);
            if($update){
                return redirect()->back()->with('success','Ad published successfully');
            }
        }
       

    }

}
