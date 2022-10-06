
<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> Web Nội Thất     </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="navbar-custom-menu">
            @if(\Illuminate\Support\Facades\Auth::check())
                @php
                    $user = \Illuminate\Support\Facades\Auth::user();
                @endphp
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu open" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <span class="hidden-xs">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if($user->avatar && file_exists(public_path($user->avatar)))
                                    <img src="{{ asset($user->avatar) }}" class="img-circle" alt="">
                                @else
                                    <img src="{{ asset('upload/user-404.png') }}" class="img-circle" alt="">
                                @endif
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.user.edit',['user' => $user->id]) }}" class="btn btn-default btn-flat">Thiết lập</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                <!-- Control Sidebar Toggle Button -->
                </ul>
            @endif

        </div>

    </nav>
</header>


