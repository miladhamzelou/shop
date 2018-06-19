@extends('admin.layouts.master')

@section('panel_title','فروشگاه ها')

@section('panel_page_title','لیست فروشگاه ها')

@section('panel_content')
    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-48">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">جستجو</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('admin.shop.index') }}">
                        <div class="form-group">
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-doc-text"></i></span>
                                    <input type="text" name="name" id="name" placeholder="عنوان فروشگاه"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-dot-3"></i></span>
                                    <div class="">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" name="username" id="username" placeholder="نام کاربری" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button type="submit" class="btn btn-primary btn-block">جستجو</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-48">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">لیست فروشگاه ها</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">عنوان</th>
                                <th class="text-center">دسته بندی</th>
                                <th class="text-center">کاربر</th>
                                <th class="text-center">دومین</th>
                                <th class="text-center">نام کاربری</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">ترتیب</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">مخفی</th>
                                <th class="text-center">انقضا</th>
                                <th class="text-center">ایجاد</th>
                                <th class="text-center">ویرایش</th>
                                <th class="text-center">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr class="text-center">
                                    <th scope="row">{{ $shop->id }}</th>
                                    <td>{{ $shop->title }}</td>
                                    <td>{{ isset($shop->category) ? $shop->category->name:'---' }}</td>
                                    <td>{{ isset($shop->user->name) ? $shop->user->name . ' | ':'' }}{{ $shop->user->mobile }}</td>
                                    <td>{{ $shop->domain }}</td>
                                    <td>{{ $shop->username }}</td>
                                    <td>{{ $shop->type }}</td>
                                    <td>{{ $shop->sort }}</td>
                                    <td><a href="#" class="<?php if (!empty($shop->approved)) {
                                            echo 'txt-red';
                                        } else {
                                            echo 'txt-green';
                                        }; ?>  "><i class="fa fa-check"></i></a></td>
                                    <td><a href="#" class="<?php if (!empty($shop->hidden)) {
                                            echo 'txt-red';
                                        } else {
                                            echo 'txt-green';
                                        }; ?>  "><i class="fa fa-check"></i></a></td>
                                    <td>{{jDate::forge($shop->expire)->format('datetime')}}</td>
                                    <td>{{jDate::forge($shop->created_at)->format('datetime')}}</td>
                                    <td>{{jDate::forge($shop->updated_at)->format('datetime')}}</td>
                                    <td>
                                        <a href="{{route('admin.shop.update',['id'=>$shop->id])}}"><i class="fa fa-cog text-primary"></i></a>
                                        <a href="{{route('admin.shop.delete',['id'=>$shop->id])}}"><i class="fa fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $shops->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
