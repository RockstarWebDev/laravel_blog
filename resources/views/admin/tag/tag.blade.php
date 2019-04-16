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
          <form role="form" action="{{ route('tag.store') }}" method="post">
              {{csrf_field()}}
            

              <div class="box-body">
                <div class="col-lg-offset-3  col-md-6">
                    <div class="form-group">

                  <label for="exampleInputEmail1">Tag Title</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="title" placeholder="Enter text"
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tag Slug</label>
                  <input type="text" class="form-control" id="exampleInputtext1" name="slug" placeholder="Enter slug" >
                </div>
              </div>



              
              
            
            <!-- /.box-header -->
            
              


                <div class="col-md-7 col-md-offset-5">
                <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit">
                &nbsp;
                 <a href='{{ route('tag.index') }}' class="btn btn-warning">Back</a>
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