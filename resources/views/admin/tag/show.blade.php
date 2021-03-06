@extends('admin.layouts.master')

@section('head-section')
	<link rel="stylesheet" href=" {{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }} ">
@endsection

@section('main-content')
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tag Tables
        <small>Tag tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">tag tables</li>
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
              <a href="{{ route('tag.create') }}" class="btn btn-primary col-md-offset-5">Add Tag</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>created at</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
                </tr>
                </thead>
                <tbody>

                  @forelse($tags as $tag)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $tag->name }}</td>
                   
                      <td>{{ $tag->slug }}</td>
                      <td>{{ $tag->created_at }}</td>
                      <td><a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-warning">Edit</a></td>
                      
                      <td><a class="btn btn-danger" href=""
                        
                          {{-- expr --}}
                           onclick="
if (confirm( 'Are you sure, You want to delete this?')) {

  event.preventDefault();
                          document.getElementById('delete-form-{{$tag->id}}').submit();
                        }else{
                          event.preventDefault();
                        }
                          ">

                           
                                            Delete

                                        </a>
                        

      <form id="delete-form-{{$tag->id}}" action="{{ route('tag.destroy',$tag->id) }}" method="POST" style="display: none;">
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
                  <th>Slug</th>
                  <th>created at</th>
                  <th>Edit</th>
                  <th>Delete</th>
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