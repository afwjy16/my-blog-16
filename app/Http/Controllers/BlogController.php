<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Tags;

class BlogController extends Controller
{
    public function index(Posts $posts){

        // $recentPost = $posts->orderBy('created_at', 'desc')->take(6)->get();
        $bannerPost = Posts::where('is_publish', '1')->orderby('hit', 'desc')->orderBy('created_at', 'desc')->take(3)->get();
        $category_widget= Category::all();
        $tags_widget= Tags::all();
        $popularPost = Posts::orderBy('hit', 'desc')->take(5)->get();
        $recentPost = $posts->latest()->take(6)->get();
        return view('blog.blog', compact('recentPost', 'category_widget','tags_widget' ,'popularPost', 'bannerPost'));
    }

    public function detail($slug){
        $category_widget= Category::all();
        $detailPost = Posts::where('slug', $slug)->first();
        $hit = $detailPost->hit + 1;
        $hitData = ['hit' => $hit];
        $tags_widget= Tags::all();
        $detailPost->update($hitData);
        $popularPost = Posts::orderBy('hit', 'desc')->take(5)->get();
        $relatedPost = Posts::where('id', 'not like', $detailPost->id)->where('category_id', $detailPost->category_id )->take(3)->get();
        return view('blog.detail', compact('detailPost', 'category_widget','tags_widget' , 'relatedPost', 'popularPost'));
    }

    public function list(){
        $tags_widget= Tags::all();
        $category_widget= Category::all();
        $popularPost = Posts::orderBy('hit', 'desc')->take(5)->get();
        $listPost = Posts::latest()->paginate(6);
        return view('blog.list', compact('listPost', 'category_widget','tags_widget' , 'popularPost'));
    }

    public function list_category(category $category) {
        $tags_widget= Tags::all();
        $category_widget= Category::all();
        $popularPost = Posts::orderBy('hit', 'desc')->take(5)->get();
        $listPost = $category->posts()->paginate(6);
        return view('blog.list', compact('listPost', 'category_widget','tags_widget' , 'popularPost'));
    }

    public function search(request $request) {
        $tags_widget= Tags::all();
        $category_widget= Category::all();
        $popularPost = Posts::orderBy('hit', 'desc')->take(5)->get();
        $listPost = Posts::where('judul', $request->search)->orWhere('judul', 'like', '%'.$request->search.'%')->paginate(6);
        return view('blog.list', compact('listPost', 'category_widget','tags_widget' , 'popularPost'));
    }


}
