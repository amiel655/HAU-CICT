<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class IgoaraMemberController extends Controller
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
        $igoaramemberdb =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('igoaramemberdb')->with('igoaramemberdb', $igoaramemberdb);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('igoaramemberdb.create');
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

        $igoaramemberdb = new Member;
        $igoaramemberdb->title = $request->input('title');
        $igoaramemberdb->body = $request->input('body');
        $igoaramemberdb->user_id = auth()->user()->id;
        $igoaramemberdb->role = auth()->user()->role;
        $igoaramemberdb->cover_image = $fileNameToStore;
        $igoaramemberdb->save();
        
        return redirect('/igoara')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $igoaramemberdb = Member::find($id); 
      return view('igoaramemberdb.show')->with('igoaramemberdb', $igoaramemberdb);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $igoaramemberdb = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$igoaramemberdb->role){
            return redirect('/igoaramemberdb')->with('error', 'Unauthorized page');
        }
        return view('igoaramemberdb.edit')->with('igoaramemberdb', $igoaramemberdb);
        
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

        $igoaramemberdb = Member::find($id);
        $igoaramemberdb->title = $request->input('title');
        $igoaramemberdb->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $igoaramemberdb->cover_image = $fileNameToStore;
        }
        $igoaramemberdb->save();
        
        return redirect('/igoara')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $igoaramemberdb = Member::find($id);

        if(auth()->user()->role !==$igoaramemberdb->role){
            return redirect('/igoara')->with('error', 'Unauthorized page');
        }

        if($igoaramemberdb->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$igoaramemberdb->cover_image);
        }
        $igoaramemberdb->delete();
        return redirect('/igoara')->with('success', 'member Removed');
    }

    public function archive()
    {
        $igoaramemberdb = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('igoaramemberdb.archive')->with('igoaramemberdb', $igoaramemberdb);
    }

    public function restore($id)
    {
       
       $igoaramemberdb = Member::onlyTrashed()->find($id);
       $igoaramemberdb->restore();
       return redirect('/igoara')->with('success', 'member Restored');
    
    }
}
