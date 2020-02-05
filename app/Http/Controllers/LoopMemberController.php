<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class LoopMemberController extends Controller
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
        $loopmemberdb =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('loopmemberdb')->with('loopmemberdb', $loopmemberdb);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loopmemberdb.create');
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

        $loopmemberdb = new Member;
        $loopmemberdb->title = $request->input('title');
        $loopmemberdb->body = $request->input('body');
        $loopmemberdb->user_id = auth()->user()->id;
        $loopmemberdb->role = auth()->user()->role;
        $loopmemberdb->cover_image = $fileNameToStore;
        $loopmemberdb->save();
        
        return redirect('/loops')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $loopmemberdb = Member::find($id); 
      return view('loopmemberdb.show')->with('loopmemberdb', $loopmemberdb);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $loopmemberdb = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$loopmemberdb->role){
            return redirect('/loopmemberdb')->with('error', 'Unauthorized page');
        }
        return view('loopmemberdb.edit')->with('loopmemberdb', $loopmemberdb);
        
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

        $loopmemberdb = Member::find($id);
        $loopmemberdb->title = $request->input('title');
        $loopmemberdb->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $loopmemberdb->cover_image = $fileNameToStore;
        }
        $loopmemberdb->save();
        
        return redirect('/loops')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loopmemberdb = Member::find($id);

        if(auth()->user()->role !==$loopmemberdb->role){
            return redirect('/loops')->with('error', 'Unauthorized page');
        }

        if($loopmemberdb->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$loopmemberdb->cover_image);
        }
        $loopmemberdb->delete();
        return redirect('/loops')->with('success', 'member Removed');
    }

    public function archive()
    {
        $loopmemberdb = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('accesspointmemberdb.archive')->with('accesspointmemberdb', $accesspointmemberdb);
    }

    public function restore($id)
    {
       
       $loopmemberdb = Member::onlyTrashed()->find($id);
       $loopmemberdb->restore();
       return redirect('/loops')->with('success', 'member Restored');
    
    }
}
