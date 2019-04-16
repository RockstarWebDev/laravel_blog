<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i></a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="{{ route('post.index') }}">
            <i class="fa fa-calendar"></i> <span>Posts</span>
          </a>
        </li>


@can('posts.category', Auth::user())
    
        <li>
          <a href="{{ route('category.index') }}">
            <i class="fa fa-calendar"></i> <span>Categories</span>
          </a>
        </li>
@endcan

@can('posts.tag', Auth::user())
        <li>
          <a href="{{ route('tag.index') }}">
            <i class=""></i> <span>Tags</span>
          </a>
        </li>
@endcan


        
        <li>
          <a href="{{ route('user.index') }}">
            <i class="fa fa-calendar"></i> <span>Users</span>
          </a>
        </li>


        @can('admins.superAdmin', Auth::user())
            
            <li>
              <a href="{{ route('role.index') }}">
                <i class="fa fa-calendar"></i> <span>Roles</span>
              </a>
            </li>
        @endcan
        

@can('admins.superAdmin', Auth::user())
        <li>
          <a href="{{ route('permission.index') }}">
            <i class="fa fa-calendar"></i> <span>Permissions</span>
          </a>
        </li>
@endcan
    </section>
    <!-- /.sidebar -->
  </aside>