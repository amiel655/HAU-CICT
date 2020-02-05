<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Support\Facades\DB;
class IgoaraController extends Controller
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

        $igoara =  Post::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('igoara.index' , ['users' => $users])->with('igoara', $igoara);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('igoara.create');
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

        $igoara = new Post;
        $igoara->title = $request->input('title');
        $igoara->body = $request->input('body');
        $igoara->user_id = auth()->user()->id;
        $igoara->role = auth()->user()->role;
        $igoara->cover_image = $fileNameToStore;
        $igoara->save();
        
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
       $igoara = Post::find($id); 
       return view('igoara.show')->with('igoara', $igoara);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $igoara = Post::find($id);

        //Check for correct user

        if(auth()->user()->role !==$igoara->role){
            return redirect('/igoara')->with('error', 'Unauthorized page');
        }
        return view('igoara.edit')->with('igoara', $igoara);
        
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

        $igoara = Post::find($id);
        $igoara->title = $request->input('title');
        $igoara->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $igoara->cover_image = $fileNameToStore;
        }
        $igoara->save();
        
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
        $igoara = Post::find($id);

        if(auth()->user()->role !==$igoara->role){
            return redirect('/igoara')->with('error', 'Unauthorized page');
        }

        if($igoara->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$igoara->cover_image);
        }
        $igoara->delete();
        return redirect('/igoara')->with('success', 'Post Removed');
    }
    public function member()
    {
        $users = DB::table('members')->get();

        return view('igoara.index', ['users' => $users]);
    }
}
