@extends('admin.layouts.master')

@section('head-section')
	<link rel="stylesheet" href=" {{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }} ">
@endsection

@section('main-content')
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Tables
        <small>User tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">User tables</li>
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
              @can('admins.create', Auth::user())
                 
              <a href="{{ route('user.create') }}" class="btn btn-primary col-md-offset-5">Add User</a>
              @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Assigned Roles</th>
                  <th>Active</th>
                  <th>created at</th>
                  @can('admins.update', Auth::user())
                    
                  <th>Edit</th>
                  @endcan

                  @can('admins.delete', Auth::user())
                      <th>Delete</th>
                  @endcan
                  
                  
                </tr>
                </thead>
                <tbody>

                  @forelse($users as $user)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $user->name }}</td>

                      <td>@foreach ($user->roles as $user_role)
                        {{ $user_role->name}},<br> 
                      @endforeach</td>
                   <td>{{ $user->status ? 'Active' : 'Not Active' }}</td>
                      

                      <td>{{ $user->created_at->toFormattedDateString() }}</td>

                      @can('admins.update', Auth::user())
                        <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a></td>    
                      @endcan
                      
                      

@can('admins.delete', Auth::user())
                        <td><a class="btn btn-danger" href=""
                        
                          {{-- expr --}}
                           onclick="
if (confirm( 'Are you sure, You want to delete this?')) {

  event.preventDefault();
                          document.getElementById('delete-form-{{$user->id}}').submit();
                        }else{
                          event.preventDefault();
                        }
                          ">

                           
                                            Delete

                                        </a>
                        

      <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form></td>    
@endcan


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
                  <th>Name</th>
                  <th>Assigned Roles</th>
                  <th>Active</th>
                  <th>created at</th>
                   @can('admins.update', Auth::user())
                    
                  <th>Edit</th>
                  @endcan
                  
                  @can('admins.delete', Auth::user())
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