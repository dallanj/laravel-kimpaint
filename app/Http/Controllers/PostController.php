<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Livewire\Frontpage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{    

    //temp
    private function menuLinks()
    {
        return DB::table('navigation_menus')
        ->where('type', '=', 'Menu')
        ->orderBy('sequence', 'asc')
        ->orderBy('created_at', 'asc')
        ->get();
    }
    private function subMenuLinks()
    {
        return DB::table('navigation_menus')
        ->where('type', '=', 'SubMenu')
        ->orderBy('menuid', 'asc')
        ->orderBy('sequence', 'asc')
        ->orderBy('created_at', 'asc')
        ->get();
    }
    //temp
    /**
     * Show all posts
     *
     * @return void
     */
    public function index()
    {

       return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'header' => 'All',
            'categories' => Category::all(),
            'menuLinks' => $this->menuLinks(),
            'subMenuLinks' => $this->subMenuLinks(),
        ]);
    }
    
        
    /**
     * Display an individual post
     *
     * @return void
     */
    public function show(Post $post)
    {
        // find a post by its slug and pass it to a view called 'post'
        // $post = Post::findOrFail($id);

        // pass the html file to the view
        return view('post', [
            'post' => $post,
            'header' => $post->title,
            'menuLinks' => $this->menuLinks(),
            'subMenuLinks' => $this->subMenuLinks(),
        ]);
    }

}
