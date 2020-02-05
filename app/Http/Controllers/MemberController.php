<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Member;
use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'], ['except' => ['index']]);
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
        $member =  Member::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('member.index')->with('member', $member);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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

        $member = new Member;
        $member->title = $request->input('title');
        $member->body = $request->input('body');
        $member->user_id = auth()->user()->id;
        $member->role = auth()->user()->role;
        $member->cover_image = $fileNameToStore;
        $member->save();
        
        return redirect('/member')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $member = Member::find($id); 
      return view('member.show')->with('member', $member);

      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $member = Member::find($id);

        //Check for correct user

        if(auth()->user()->role !==$member->role){
            return redirect('/member')->with('error', 'Unauthorized page');
        }
        return view('member.edit')->with('member', $member);
        
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

        $member = Member::find($id);
        $member->title = $request->input('title');
        $member->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $member->cover_image = $fileNameToStore;
        }
        $member->save();
        
        return redirect('/member')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);

        if(auth()->user()->role !==$member->role){
            return redirect('/member')->with('error', 'Unauthorized page');
        }

        if($member->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$member->cover_image);
        }
        $member->delete();
        return redirect('/member')->with('success', 'member Removed');
    }

    public function archive()
    {
        $member = Member::withTrashed()->get();
         
        // //$posts =  Post::orderBy('title', 'desc')->get();
         return view('member.archive')->with('member', $member);
    }

    public function restore($id)
    {
       
       $member = Member::onlyTrashed()->find($id);
       $member->restore();
       return redirect('/member')->with('success', 'member Restored');
    
    }
}
