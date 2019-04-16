@extends('admin.layouts.master')

@section('head-section')
	<link rel="stylesheet" href=" {{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }} ">
@endsection

@section('main-content')
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Tables
        <small>post tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">post tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
            <!-- /.box-header -->
            
          <!-- /.box -->

          <div class="box">
            <div class="box-header">

              @can('posts.create', Auth::user())     
              <a href="{{ route('post.create') }}" class="btn btn-primary col-md-offset-5">Add Post</a>
              @endcan

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  <th>Creatd At</th>

                  @can('posts.update', Auth::user())
                      {{-- expr --}}
                  <th>Edit</th>
                  @endcan

                  @can('posts.delete', Auth::user())
                      {{-- expr --}}
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>

                  @forelse($posts as $post)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->subtitle }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->created_at->toFormattedDateString() }}</td>

                      @can('posts.update', Auth::user())
                      
                      <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                  @endcan

                  
                      <td>
                        @can('posts.delete', Auth::user())
<a class="btn btn-danger" href=""
                        
                          {{-- expr --}}
                           onclick="
if (confirm( 'Are you sure, You want to delete this?')) {

  event.preventDefault();
                          document.getElementById('delete-form-{{$post->id}}').submit();
                        }else{
                          event.preventDefault();
                        }
                          ">
                         

                           
                                            Delete

                                        </a>
                  @endcan


      <form id="delete-form-{{$post->id}}" action="{{ route('post.destroy',$post->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form></td>
                    </tr>

@empty
<tr>
  <td>No record found</td>
</tr>

                  @endforelse


                
                
                </tbody>
                <tfoot>
                <tr>
                    <th>S.No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  <th>Creatd At</th>
                  @can('posts.update', Auth::user())
                      {{-- expr --}}
                  <th>Edit</th>
                  @endcan

                   @can('posts.delete', Auth::user())
                      {{-- expr --}}
                  <th>Delete</th>
                  @endcan
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('footer-section')
	<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection