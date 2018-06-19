@extends('admin.layouts.master')

@section('panel_title')
    ویرایش اطلاعات کاربر
@endsection

@section('panel_page_title')
    ویرایش اطلاعات کاربر {{ $user->name }}
@endsection

@section('panel_content')

    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-48">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">ویرایش اطلاعات</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-lg-offset-3">
                        @include('admin.layouts.errors')
                        <form action="{{ route('admin.user.update',['id'=>$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name" placeholder="نام و نام خانوادگی">
                            </div>
                            <div class="form-group">
                                <label for="mobile">شماره همراه</label>
                                <input type="text" disabled value="{{ $user->mobile }}" maxlength="11" class="form-control" id="mobile" name="mobile" placeholder="شماره همراه">
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="text" value="{{ $user->email }}" class="form-control" id="email" name="email" placeholder="ایمیل">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection