@include('admin.layouts._head')

<body>

<!-- Page container -->
<div class="page-container">

    <!-- Page Sidebar -->
@include('admin.layouts._sidebar')
<!-- /Page Sidebar -->

    <!-- Main container -->
    <div class="main-container gray-bg">

        <!-- Main content -->
        <div class="main-content">
            <h1 class="page-title">@yield('panel_page_title')</h1>

            @yield('panel_content')

        </div>
        <!-- /main content -->
    </div>
    <!-- /main container -->

</div>
<!-- /page container -->
@include('admin.layouts._footer')

