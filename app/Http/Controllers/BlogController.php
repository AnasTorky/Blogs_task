<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\upload_image;
use App\Models\Blog;
use App\Models\Author;

class BlogController extends Controller
{
    use upload_image;
    
    public function index_blog()
    {
        $blogs = Blog::all();
        $authors = Author::all();
        return view('blogs', compact('blogs','authors'));
    }
    public function create_blog(Request $request){
        $img_path = $this->upload_image($request, 'image', 'blog');
        Blog::create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'content'=>$request->content,
            'image'=>$img_path,
            'author_id'=>$request->author_id,
           ]);
        return redirect()->route('blog_form');
    }
    public function edit_blog($id)
    {
        $blogs = Blog::find($id);
        $authors = Author::all();
        return view('update_blog', compact('blogs', 'authors'));
    }
    public function update_blog(Request $request, $id)
    {
        $updated_blog = Blog::find($id);
        $img_path = $updated_blog->image;
        $updated_blog->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $img_path,
        ]);
        return redirect()->route('blog_form');
    }
    public function delete_blog($id){
        $blogs = Blog::all();
        $updated_blog = Blog::find($id);
        $updated_blog->delete();
        return redirect()->route('blog_form');
    }
}
