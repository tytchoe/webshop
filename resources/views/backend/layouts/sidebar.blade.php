<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(\Illuminate\Support\Facades\Auth::check())
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($user->avatar && file_exists(public_path($user->avatar)))
                    <img src="{{ asset($user->avatar) }}" class="img-circle" alt="">
                @else
                    <img src="{{ asset('upload/user-404.png') }}" class="img-circle" alt="">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        @endif
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Danh Mục</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.vendor.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Nhà cung cấp</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Thương hiệu</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.article.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Bài viết</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Banner</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.contact.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Liên hệ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>QL Thành viên</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('admin.role.index') }}">--}}
{{--                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Chức vụ</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li>
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Cấu hình Website</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
