<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    function post(post $post)
    {
    	return view('blog.post',compact('post'));
    }

}
