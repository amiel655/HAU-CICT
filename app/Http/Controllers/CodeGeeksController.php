<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Support\Facades\DB;
class CodeGeeksController extends Controller
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
        $codegeeks =  Post::orderBy('created_at', 'desc')->paginate(10);
        //$posts =  Post::orderBy('title', 'desc')->get();
        return view('codegeeks.index', ['users' => $users])->with('codegeeks', $codegeeks);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codegeeks.create');
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

        $codegeeks = new Post;
        $codegeeks->title = $request->input('title');
        $codegeeks->body = $request->input('body');
        $codegeeks->user_id = auth()->user()->id;
        $codegeeks->role = auth()->user()->role;
        $codegeeks->cover_image = $fileNameToStore;
        $codegeeks->save();
        
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
       $codegeeks = Post::find($id); 
       return view('codegeeks.show')->with('codegeeks', $codegeeks);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $codegeeks = Post::find($id);

        //Check for correct user

        if(auth()->user()->role !==$codegeeks->role){
            return redirect('/codegeeks')->with('error', 'Unauthorized page');
        }
        return view('codegeeks.edit')->with('codegeeks', $codegeeks);
        
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

        $codegeeks = Post::find($id);
        $codegeeks->title = $request->input('title');
        $codegeeks->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $codegeeks->cover_image = $fileNameToStore;
        }
        $codegeeks->save();
        
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
        $codegeeks = Post::find($id);

        if(auth()->user()->role !==$codegeeks->role){
            return redirect('/codegeeks')->with('error', 'Unauthorized page');
        }

        if($codegeeks->cover_image != 'noimage.jpg'){
            //DELETE
            Storage::delete('public/cover_images/'.$codegeeks->cover_image);
        }
        $codegeeks->delete();
        return redirect('/codegeeks')->with('success', 'Post Removed');
    }
}
