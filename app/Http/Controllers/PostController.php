<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use File;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        return view('admin/post/create', compact('category', 'tags'));
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
            'judul' => 'required',
            'category_id'  => 'required',
            'content'  => 'required',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().'.'.$gambar->getClientOriginalExtension();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id() ,
            'hit' => 0
        ]);
        
        $post->tags()->attach($request->tags);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect()->route('post.index')->with('status', 'Add Data Post Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findorfail($id);
        $category = Category::all();
        $tags = Tags::all();
        return view('admin.post.edit', compact('post', 'category', 'tags'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'is_publish' => 'required',
            'gambar'  => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $post = Posts::findorfail($id);

        if($request->has('gambar')) {
            File::delete($post->gambar);
            $gambar = $request->gambar;
            $new_gambar = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('public/uploads/posts/', $new_gambar);
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'is_publish' => $request->is_publish,
                'gambar' => 'public/uploads/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'is_publish' => $request->is_publish,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('post.index')->with('status', 'Update Data Post Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->route('post.index')->with('status', 'Delete Data Post Success');
    }

    public function trash()
    {
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.trash', compact('post'));
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('post.trash')->with('status', 'Restore Data Trash Post Success ( Please check Data in List Post !)');
    }

    public function kill($id)
    {
        
        $post = Posts::withTrashed()->where('id', $id)->first();
        File::delete($post->gambar);
        $post->forceDelete();
        return redirect()->route('post.trash')->with('status', 'Delete Data Trash Success');
    }
}
