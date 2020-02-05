<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class CodeGeeksMemberController extends Controller
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
        $codegeeksmemberdb =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('codegeeksmemberdb')->with('codegeeksmemberdb', $codegeeksmemberdb);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codegeeksmemberdb.create');
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

        $codegeeksmemberdb = new Member;
        $codegeeksmemberdb->title = $request->input('title');
        $codegeeksmemberdb->body = $request->input('body');
        $codegeeksmemberdb->user_id = auth()->user()->id;
        $codegeeksmemberdb->role = auth()->user()->role;
        $codegeeksmemberdb->cover_image = $fileNameToStore;
        $codegeeksmemberdb->save();
        
        return redirect('/codegeeks')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $codegeeksmemberdb = Member::find($id); 
      return view('codegeeksmemberdb.show')->with('codegeeksmemberdb', $codegeeksmemberdb);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $codegeeksmemberdb = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$codegeeksmemberdb->role){
            return redirect('/codegeeksmemberdb')->with('error', 'Unauthorized page');
        }
        return view('codegeeksmemberdb.edit')->with('codegeeksmemberdb', $codegeeksmemberdb);
        
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

        $codegeeksmemberdb = Member::find($id);
        $codegeeksmemberdb->title = $request->input('title');
        $codegeeksmemberdb->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $codegeeksmemberdb->cover_image = $fileNameToStore;
        }
        $codegeeksmemberdb->save();
        
        return redirect('/codegeeks')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codegeeksmemberdb = Member::find($id);

        if(auth()->user()->role !==$codegeeksmemberdb->role){
            return redirect('/codegeeks')->with('error', 'Unauthorized page');
        }

        if($codegeeksmemberdb->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$codegeeksmemberdb->cover_image);
        }
        $codegeeksmemberdb->delete();
        return redirect('/codegeeks')->with('success', 'member Removed');
    }

    public function archive()
    {
        $codegeeksmemberdb = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('codegeeksmemberdb.archive')->with('codegeeksmemberdb', $codegeeksmemberdb);
    }

    public function restore($id)
    {
       
       $codegeeksmemberdb = Member::onlyTrashed()->find($id);
       $codegeeksmemberdb->restore();
       return redirect('/codegeek')->with('success', 'member Restored');
    
    }
}
