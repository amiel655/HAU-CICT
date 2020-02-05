<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class AccessPointMemberController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginlogs()
    {

        return view('member.loginlogs')->with('member', $member);
    }
    
    public function index()
    {
        $accesspointmemberdb =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('accesspointmemberdb')->with('accesspointmemberdb', $accesspointmemberdb);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accesspointmemberdb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //HANDLE FILE UPLOAD

        if($request->hasFile('cover_image')){
            //  get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore= 'noimage.jpg';
        }
        //Create post

        $accesspointmemberdb = new Member;
        $accesspointmemberdb->title = $request->input('title');
        $accesspointmemberdb->body = $request->input('body');
        $accesspointmemberdb->user_id = auth()->user()->id;
        $accesspointmemberdb->role = auth()->user()->role;
        $accesspointmemberdb->cover_image = $fileNameToStore;
        $accesspointmemberdb->save();
        
        return redirect('/accesspoint')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $accesspointmemberdb = Member::find($id); 
      return view('accesspointmemberdb.show')->with('accesspointmemberdb', $accesspointmemberdb);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $accesspointmemberdb = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$accesspointmemberdb->role){
            return redirect('/accesspointmemberdb')->with('error', 'Unauthorized page');
        }
        return view('accesspointmemberdb.edit')->with('accesspointmemberdb', $accesspointmemberdb);
        
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
               //HANDLE FILE UPLOAD

               if($request->hasFile('cover_image')){
                //  get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }
           
        //Create post

        $accesspointmemberdb = Member::find($id);
        $accesspointmemberdb->title = $request->input('title');
        $accesspointmemberdb->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $accesspointmemberdb->cover_image = $fileNameToStore;
        }
        $accesspointmemberdb->save();
        
        return redirect('/accesspoint')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accesspointmemberdb = Member::find($id);

        if(auth()->user()->role !==$accesspointmemberdb->role){
            return redirect('/accesspoint')->with('error', 'Unauthorized page');
        }

        if($accesspointmemberdb->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$accesspointmemberdb->cover_image);
        }
        $accesspointmemberdb->delete();
        return redirect('/accesspoint')->with('success', 'member Removed');
    }

    public function archive()
    {
        $accesspointmemberdb = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('accesspointmemberdb.archive')->with('accesspointmemberdb', $accesspointmemberdb);
    }

    public function restore($id)
    {
       
       $accesspointmemberdb = Member::onlyTrashed()->find($id);
       $accesspointmemberdb->restore();
       return redirect('/accesspoint')->with('success', 'member Restored');
    
    }
}
