@extends('blog.layouts.master')

@section('title','THE KHAN BLOGS' )
@section('sub-title','laravel is Awesome!')
@section('bg-img',asset('blog/img/home-bg.jpg'))

@section('main-content')
     <div class="container">
        <div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
 
 @foreach ($posts as $post)
     {{-- expr --}}

            
                <div class="post-preview">
                    <a href="{{ route('post', $post->slug) }}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$post->subtitle}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> Created at - {{ $post->created_at->diffForHumans() }}</p>
                </div>
               <hr>

 @endforeach
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{ $posts->links() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
