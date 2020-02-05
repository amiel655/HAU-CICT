<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        $users = DB::table('posts')->get();

        $title = 'HAU-CICT';
       // return view('pages.index', compact('title'));
       $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
       return view('pages.index', ['users' => $users])->with('posts', $posts);
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
        'title' => 'Services',
        'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    //RENI PA RENG KEBIT KU PARA KENG ROUTES
    public function getAccessPoint() {
        return view('pages.accesspoint');
    }

    public function getCisco() {
        return view('pages.cisco');
    }

    public function getCodeGeeks() {
        return view('pages.codegeeks');
    }

    public function getIgoara() {
        return view('pages.igoara');
    }

    public function getLoop() {
        return view('pages.loop');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function getArticles() {
        return view('pages.articles');
    }

    public function getFaculty() {
        return view('pages.faculty');
    }
    // END
}
