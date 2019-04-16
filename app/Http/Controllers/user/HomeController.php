<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
    	$posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(2);
    	return view('blog.home',compact('posts'));
    }

    

function category(category $category)
    {
      $posts = $category->posts();
      return view('blog.home',compact('posts'));
    }


    function tag(tag $tag)
    {
        $posts = $tag->posts(); 
        return view('blog.home',compact('posts'));  
    }


}
