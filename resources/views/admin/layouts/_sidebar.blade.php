<!-- Page Sidebar -->
<div class="page-sidebar">

    <!-- Site header  -->
    <header class="site-header">
        <div class="site-logo"><a href="{{ route('admin.home') }}"><img src="/panel/images/logo.png" alt="Mouldifi"
                                                         title="Mouldifi"></a>
        </div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a>
        </div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse"
                                                       class="mobile-menu-icon" href="#"><i
                        class="icon-menu"></i></a></div>
    </header>
    <!-- /site header -->
    <!-- Main navigation -->
    <ul id="side-nav" class="main-menu navbar-collapse collapse">
        <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}"><i class="icon-gauge"></i><span class="title"> داشبورد</span></a>
        </li>
        <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
            <a href="{{ route('admin.user.index') }}"><i class="icon-users"></i><span class="title"> مدیریت کاربران</span></a>
        </li>
        <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-th-large"></i><span class="title"> دسته بندی ها</span></a>
            <ul class="nav collapse">
                <li class="{{ Request::is('admin/category') ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}"><span class="title"> لیست دسته بندی ها</span></a></li>
                <li class="{{ Request::is('admin/category/create') ? 'active' : '' }}"><a href="{{ route('admin.category.create') }}"><span class="title"> ایجاد دسته بندی</span></a></li>
            </ul>
        </li>
        {{--<li class="{{ Request::is('admin/shop') ? 'active' : '' }}">
            <a href="{{ route('admin.shop.index') }}"><i class="fa fa-shopping-basket"></i><span class="title"> فروشگاه ها</span></a>
        </li>--}}
        <li class="{{ Request::is('admin/shop') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-shopping-basket"></i><span class="title"> فروشگاه ها</span></a>
            <ul class="nav collapse">
                <li class="{{ Request::is('admin/shop') ? 'active' : '' }}"><a href="{{ route('admin.shop.index') }}"><span class="title"> لیست فروشگاه ها</span></a></li>
                <li class="{{ Request::is('admin/shop/create') ? 'active' : '' }}"><a href="{{ route('admin.shop.create') }}"><span class="title"> ایجاد فروشگاه</span></a></li>
            </ul>
        </li>
    </ul>
    <!-- /main navigation -->
</div>
<!-- /page sidebar -->