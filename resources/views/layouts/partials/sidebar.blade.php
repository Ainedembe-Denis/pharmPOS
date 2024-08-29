<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="overflow: hidden; position: fixed; top: 0;">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="overflow-y: auto; width: 100%;  height: 100vh; background-color: #4d98f8; ">

	<a href="{{route('home')}}" class="logo">
		<span class="logo-lg">{{ Session::get('business.name') }}</span>
	</a>

    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom'); !!}

    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

