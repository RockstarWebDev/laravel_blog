@extends('admin.layouts.master')

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
              <h3 class="box-title">Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @include('includes.error')
            <form role="form" action="{{ route('role.update',$role->id) }}" method="post">
              {{csrf_field()}}
              {{method_field('PUT')}}

              <div class="box-body">
                <div class="col-lg-offset-3  col-md-6">
                    <div class="form-group">

                  <label for="exampleInputEmail1">Role Name</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="name" placeholder="Enter name" value="{{$role->name}}">
                </div>

                

                <div class="row">
                  <hr>
                  <div class="col-lg-4">
                    <label>Posts Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'post')
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                             checked
                            @endif
                          @endforeach>{{$permission->name}}
                        </label>
                        
                      </div>
                       
                      @endif
                    @endforeach
                  </div>

                       <div class="col-lg-4">
                    <label>Users Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'user')
                      <div class="checkbox">
                        <label>
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                             checked
                            @endif
                          @endforeach>{{$permission->name}}   
                        </label>
                       
                      </div>
                      @endif
                    @endforeach
                  </div>


                       <div class="col-lg-4">
                    <label>Others Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'other')
                      <div class="checkbox">
                        <label>
                          
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                             checked
                            @endif
                          @endforeach>{{$permission->name}}
                        </label>
                        
                      </div>
                      @endif
                    @endforeach
                  </div>
                </div>


              
              
    </div>        
            <!-- /.box-header -->
            
              


                <div class="col-md-7 col-md-offset-5">
                <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit">
                &nbsp;
                 <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
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