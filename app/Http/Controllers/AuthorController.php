<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use App\Traits\upload_image;

class AuthorController extends Controller
{
    use upload_image;
    public function index_author()
    {
        $authors = Author::all();
        return view('author', compact('authors'));
    }
    public function create_author(Request $request){
        $img_path = $this->upload_image($request, 'img', 'author');
        $authors = Author::all();
        Author::create([
            'name' => $request->name,
            'img' => $img_path,
            'facebook'=>$request->facebook,
           ]);
        return view('author',compact('authors'));
    }
    public function edit_author($id)
    {
        $authors = Author::find($id);
        return view('update_author', compact('authors'));
    }
    public function update_author(Request $request, $id)
    {
        $updated_author = Author::find($id);
        $img_path = $updated_author->img;
        $updated_author->update([
            'name' => $request->name,
            'img' => $img_path,
            'facebook' => $request->facebook,
        ]);
        return redirect()->route('author_form');
    }
    public function delete_author($id){
        $authers = Author::all();
        $updated_auther = Author::find($id);
        $updated_auther->delete();
        return redirect()->route('author_form');
    }
}
