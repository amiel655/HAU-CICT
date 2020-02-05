<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Support\Facades\DB;
class CiscoController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::table('members')->get();

        $cisco =  Post::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('cisco.index' , ['users' => $users])->with('cisco', $cisco);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cisco.create');
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

        $cisco = new Post;
        $cisco->title = $request->input('title');
        $cisco->body = $request->input('body');
        $cisco->user_id = auth()->user()->id;
        $cisco->role = auth()->user()->role;
        $cisco->cover_image = $fileNameToStore;
        $cisco->save();
        
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
       $cisco = Post::find($id); 
       return view('cisco.show')->with('cisco', $cisco);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cisco = Post::find($id);

        //Check for correct user

        if(auth()->user()->role !==$cisco->role){
            return redirect('/cisco')->with('error', 'Unauthorized page');
        }
        return view('cisco.edit')->with('cisco', $cisco);
        
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

        $cisco = Post::find($id);
        $cisco->title = $request->input('title');
        $cisco->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $cisco->cover_image = $fileNameToStore;
        }
        $cisco->save();
        
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
        $cisco = Post::find($id);

        if(auth()->user()->role !==$cisco->role){
            return redirect('/cisco')->with('error', 'Unauthorized page');
        }

        if($cisco->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$cisco->cover_image);
        }
        $cisco->delete();
        return redirect('/cisco')->with('success', 'Post Removed');
    }
}
