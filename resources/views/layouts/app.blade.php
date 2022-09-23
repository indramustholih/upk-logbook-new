<!DOCTYPE html>
<html lang="{{ config('app.locate') }}">

<head>
    @include('layouts.header')
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
        {{-- <!-- Main Header --> --}}
        <header class="main-header">

            {{-- <!-- Logo --> --}}
            <a href="{{ route('home') }}" class="logo">
                {{-- <!-- mini logo for sidebar mini 50x50 pixels --> --}}
                <span class="logo-mini"><img src="{{ asset('images/logo.png') }}" class="img-thumbnail"
                        alt="Responsive image"></span>
                {{-- <!-- logo for regular state and mobile devices --> --}}
                <span class="logo-lg">LOGBOOK</span>
            </a>

            {{-- <!-- Header Navbar --> --}}
            <nav class="navbar navbar-static-top" role="navigation">
                {{-- <!-- Sidebar toggle button--> --}}
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                {{-- <!-- Navbar Right Menu --> --}}
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        {{-- <!-- Messages: style can be found in dropdown.less--> --}}
                        <li class="dropdown messages-menu">
                            {{-- <!-- Menu toggle button --> --}}
                            <ul class="dropdown-menu">
                                {{-- <!-- inner menu: contains the messages --> --}}
                                <ul class="menu">
                                    <li>
                                        {{-- <!-- start message --> --}}
                                        <a href="#">
                                            <div class="pull-left">
                                                {{-- <!-- User Image --> --}}
                                                <img src="https://avatars.dicebear.com/api/micah/{{ Auth::user()->name }}.svg"
                                                    class="img-circle" alt="User Image">
                                            </div>
                                        </a>
                                    </li>
                                    {{-- <!-- end message --> --}}
                                </ul>
                                {{-- <!-- /.menu --> --}}
                        </li>
                    </ul>
                    <!-- </li> -->

                    {{-- <!-- User Account Menu --> --}}
                    <li class="dropdown user user-menu">
                        {{-- <!-- Menu Toggle Button --> --}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <!-- The user image in the navbar--> --}}
                            <img src="https://avatars.dicebear.com/api/micah/{{ Auth::user()->name }}.svg" class="user-image"
                                alt="User Image">
                            {{-- <!-- hidden-xs hides the username on small devices so only the image appears. --> --}}
                            <span class="hidden-xs">
                                @if (Auth::user()->level == 1)
                                    <small>{{ Auth::user()->name }}</small>
                                @else
                                    <small>{{ Auth::user()->name }}</small>
                                @endif
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            {{-- <!-- The user image in the menu --> --}}
                            <li class="user-header">
                                <img src="https://avatars.dicebear.com/api/micah/{{ Auth::user()->name }}.svg" class="img-circle"
                                    alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <script>
                                        new Date().getFullYear() > 2010 && document.write(new Date().getFullYear());
                                    </script></small>
                                </p>
                            </li>
                            {{-- <!-- Menu Footer--> --}}
                            <li class="user-footer">
                                <div class="pull-left">
                                    {{-- jangan dulu --}}
                                    {{-- <a href="{{route('user.profil')}}" class="btn btn-default btn-flat">Profile</a> --}}
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="btn btn-default btn-flat">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- </ul> -->
                </div>
            </nav>
        </header>

        {{-- <!-- Left side column. contains the logo and sidebar --> --}}
        <aside class="main-sidebar">
            {{-- <!-- sidebar: style can be found in sidebar.less --> --}}
            <section class="sidebar">
                {{-- <!-- Sidebar user panel (optional) --> --}}
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="https://avatars.dicebear.com/api/micah/{{ Auth::user()->name }}.svg" class="img-circle"
                            alt="User Image">
                    </div>

                    <div class="pull-left info">
                        <p>
                            <small>{{ Auth::user()->name }}</small>
                        </p>
                        {{-- <!-- Status --> --}}
                        <a href="#">
                            @if (Auth::user()->level == 1)
                                <small>Admin</small>
                            @else
                                <small>User</small>
                            @endif
                        </a>
                    </div>
                </div>

                {{-- <!-- Sidebar Menu --> --}}
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    {{-- Dashboard --}}
                    <li class="{{ Request::path() === '/' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    {{-- Admin --}}
                  

                        {{-- kondisi menu aktif master --}}
                        @if (Request::path() === 'jabatan' || Request::path() === 'kegiatan-jabatan' || Request::path() === 'kegiatan-jabatan-tambahan' )
                            @php($master = 'active')
                        @else
                            @php($master = '')
                        @endif

                        {{-- master data --}}
                        <li class="treeview {{ $master }}">
                            <a href="#">
                                <i class="fa fa-database"></i>
                                <span>Master Data</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu {{ $master }}">
                                <li class="{{ Request::path() === 'jabatan' ? 'active' : '' }}">
                                    <a href="{{ route('jabatan.index') }}">
                                        <table border="0">
                                            <tr>
                                                <td style="vertical-align: top"> <i class="fa fa-circle-o"></i></td>
                                                <td style="padding-left: 12px">Jabatan</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'kegiatan-jabatan' ? 'active' : '' }}">
                                    <a href="{{ route('kegiatan-jabatan.index') }}">
                                        <table border="0">
                                            <tr>
                                                <td style="vertical-align: top"> <i class="fa fa-circle-o"></i></td>
                                                <td style="padding-left: 12px">Kegiatan Utama</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'kegiatan-jabatan-tambahan' ? 'active' : '' }}">
                                    <a href="{{ route('kegiatan-jabatan-tambahan.index') }}">
                                        <table border="0">
                                            <tr>
                                                <td style="vertical-align: top"> <i class="fa fa-circle-o"></i></td>
                                                <td style="padding-left: 12px">Kegiatan Tambahan</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                    
                    {{-- kondisi menu aktif hcdp --}}
                        @if (Request::path() === 'master-kegiatan' || Request::path() === 'log-kegiatan/input' || Request::path() === 'log-kegiatan'
                        || Request::path() === 'log-kegiatan-tambahan/input'
                        )
                            @php($hcdp = 'active')
                        @else
                            @php($hcdp = '')
                        @endif  

                        {{-- HCDP --}}
                        <li class="treeview {{ $hcdp }}">
                            <a href="#">
                                <i class="fa fa-recycle"></i>
                                <span>Kegiatan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::path() === 'master-kegiatan' ? 'active' : '' }}">
                                    <a href="{{ route('master-kegiatan.index') }}">
                                        <i class="fa fa-circle-o"></i> 
                                        Master Kegiatan
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'log-kegiatan/input' ? 'active' : '' }}">
                                    <a href="{{ route('log-kegiatan.input') }}">
                                        <i class="fa fa-circle-o"></i> 
                                        Input Kegiatan Utama
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'log-kegiatan-tambahan/input' ? 'active' : '' }}">
                                    <a href="{{ route('log-kegiatan-tambahan.input') }}">
                                        <i class="fa fa-circle-o"></i> 
                                        Input Kegiatan Tambahan
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'log-kegiatan' ? 'active' : '' }}"><a
                                        href="{{ route('log-kegiatan.index') }}"><i class="fa fa-circle-o"></i> Data Kegiatan</a></li>
                            </ul>
                        </li>

                        {{-- kondisi menu aktif setting --}}
                        @if (Request::path() === 'user' || Request::path() === 'setting')
                            @php($setting = 'active')
                        @else
                            @php($setting = '')
                        @endif

                        <li class="treeview {{ $setting }}">
                            <a href="#">
                                <i class="fa fa-gear"></i>
                                <span>Setting</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::path() === 'user' ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}">
                                        <table border="0">
                                            <tr>
                                                <td style="vertical-align: top"> <i class="fa fa-circle-o"></i></td>
                                                <td style="padding-left: 12px"> Profile</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li class="{{ Request::path() === 'user' ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}">
                                        <table border="0">
                                            <tr>
                                                <td style="vertical-align: top"> <i class="fa fa-circle-o"></i></td>
                                                <td style="padding-left: 12px"> Users</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                            </ul>
                        </li>
                </ul>
                {{-- <!-- /.sidebar-menu --> --}}
            </section>
            {{-- <!-- /.sidebar --> --}}
        </aside>

        {{-- <!-- Content Wrapper. Contains page content --> --}}
        <div class="content-wrapper">
            {{-- <!-- Content Header (Page header) --> --}}
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                <ol class="breadcrumb">
                    @section('breadcrumb')
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                    @show
                </ol>
            </section>
            {{-- <!-- /.content Header (Page header) --> --}}

            {{-- <!-- Main content --> --}}
            <section class="content container-fluid">
                @yield('content')
            </section>
            {{-- <!-- /.content --> --}}
        </div>

        {{-- <!-- Main Footer --> --}}
        @include('layouts.footer')
        @include('layouts.scripts')

</body>

</html>
