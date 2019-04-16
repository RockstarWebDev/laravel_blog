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
    <setagass="content">
      <div class="row ">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
        
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @include('includes.error')
          <form role="form" action="{{ route('user.store') }}" method="post">
              {{csrf_field()}}
            

              <div class="box-body">
                <div class="col-lg-offset-3  col-md-6">
                    <div class="form-group">

                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="name" placeholder="Enter name" value="{{ old('name') }}" 
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="email" placeholder="Enter email" value="{{ old('email') }}" >
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="phone" placeholder="Enter Number" value="{{ old('phone') }}" >
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="Password" class="form-control" id="exampleInputtext1" name="password" placeholder="Enter Password" value="{{ old('password') }}" >
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="Password" class="form-control" id="exampleInputtext1" name="password_confirmation" placeholder="Enter Password" >
                </div>



                <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" @if (old('status')==1)
                      checked
                    @endif value="1">Status</label>
                  </div>
                </div>


                <div class="form-group">
                  <label>Assign Role </label>
                  <div class="row">
                    
                    <div class="  col-md-12">
                      @foreach ($roles as $role)
                  <input type="checkbox" name="role[]" value="{{ $role->id }}">      {{ $role->name }}&nbsp;&nbsp;&nbsp;
                        
                      @endforeach
                  
                  
                    </div>


                    
                  </div>
                </div>





              </div>

              



              
              
            
            <!-- /.box-header -->
            
              


                <div class="col-md-7 col-md-offset-5">
                <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit">
                &nbsp;
                 <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
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