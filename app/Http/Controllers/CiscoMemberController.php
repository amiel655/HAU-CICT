<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class CiscoMemberController extends Controller
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
        
        $ciscomemberdb =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('ciscomemberdb')->with('ciscomemberdb', $ciscomemberdb);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciscomemberdb.create');
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

        $ciscomemberdb = new Member;
        $ciscomemberdb->title = $request->input('title');
        $ciscomemberdb->body = $request->input('body');
        $ciscomemberdb->user_id = auth()->user()->id;
        $ciscomemberdb->role = auth()->user()->role;
        $ciscomemberdb->cover_image = $fileNameToStore;
        $ciscomemberdb->save();
        
        return redirect('/cisco')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $ciscomemberdb = Member::find($id); 
      return view('ciscomemberdb.show')->with('ciscomemberdb', $ciscomemberdb);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $ciscomemberdb = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$ciscomemberdb->role){
            return redirect('/ciscomemberdb')->with('error', 'Unauthorized page');
        }
        return view('ciscomemberdb.edit')->with('ciscomemberdb', $ciscomemberdb);
        
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

        $ciscomemberdb = Member::find($id);
        $ciscomemberdb->title = $request->input('title');
        $ciscomemberdb->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $ciscomemberdb->cover_image = $fileNameToStore;
        }
        $ciscomemberdb->save();
        
        return redirect('/cisco')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciscomemberdb = Member::find($id);

        if(auth()->user()->role !==$ciscomemberdb->role){
            return redirect('/cisco')->with('error', 'Unauthorized page');
        }

        if($ciscomemberdb->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$ciscomemberdb->cover_image);
        }
        $ciscomemberdb->delete();
        return redirect('/cisco')->with('success', 'member Removed');
    }

    public function archive()
    {
        $ciscomemberdb = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('ciscomemberdb.archive')->with('ciscomemberdb', $ciscomemberdb);
    }

    public function restore($id)
    {
       
       $ciscomemberdb = Member::onlyTrashed()->find($id);
       $ciscomemberdb->restore();
       return redirect('/cisco')->with('success', 'member Restored');
    
    }
}
