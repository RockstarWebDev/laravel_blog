@extends('admin.layouts.master')

@section('head-section')
<link rel="stylesheet" href=" {{ asset('admin/plugins/select2/select2.min.css') }} "
@endsection

@section('main-content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row ">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Post</h3>
            </div>
             @include('includes.error')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                  <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="title" placeholder="Enter text"
                  value="{{$post->title}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sub-Title</label>
                  <input type="text" name="subtitle" class="form-control" id="exampleInputPassword1" placeholder="subtitle" value="{{$post->subtitle}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Slug</label>
                  <input type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="slug" value="{{$post->slug}}">
                </div>


                <div class="form-group">
                  <label>Status</label>
                  <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" value="1"
@if ($post->status == 1)
  checked 
@endif
                    > Publish
                  </label>

                </div>
                </div>
                
                  </div>
                
                
                

                <div class="box-body">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="image" id="exampleInputFile">
                </div>


                                 <div class="form-group">
                <label>Categories</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" tabindex="-1" style="width: 100%;" name="categories[]">
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}"

                      @foreach ($post->categories as $postCat)
                        @if ($postCat->id == $category->id)
                          selected 
                        @endif
                      @endforeach>
                        {{ $category->name }}
                    </option>
                  @endforeach
                  
                </select>
              </div>



              <div class="form-group">
                <label>Tags</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" tabindex="-1" style="width: 100%;" name="tags[]">

                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
@foreach ($post->tags as $postTags)
  @if ($postTags->id == $tag->id)
    selected
  @endif
@endforeach
                      >{{ $tag->name }}</option>
                  @endforeach
                         
                </select>
              </div>
                  </div>
                    


              </div>

              </div>

              
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post body
                <small>Simple and fast</small>
              </h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea name="body" class="textarea" placeholder="your post here..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->body}}</textarea>


                <div class="col-md-7 pull-right">
                <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href='{{ route('post.index') }}' class="btn btn-warning">Back</a>
              </div>
      
            </div>


          </div>
                


                

              <!-- /.box-body -->

              





              
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('footer-section')
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>

<script>

$(document).ready(function() {
    $(".select2").select2();
  });



</script>
@endsection