@extends('blog.layouts.master')
@section('bg-img',asset('storage/'.$post->image))
@section('title', $post->title )
@section('sub-title',$post->subtitle)



@section('main-content')
	  <article>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	
                @foreach ($post->categories as $category)
                <a href="{{ route('category',$category->slug) }}" >
                <small class="pull-right"  style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">
                    {{ $category->name }}
                    </small>
                    
                </a>
                @endforeach
                		<hr>
                	

                    {!! htmlspecialchars_decode($post->body)  !!}
                <h4>Tag Clouds</h4>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag',$tag->slug ) }}" >
                <small class="pull-left"  style="margin-right: 20px;border-radius: 5px;border: 1px solid blue;padding: 5px;">
                    {{ $tag->name }}
                    </small>
                    
                </a>
                @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection