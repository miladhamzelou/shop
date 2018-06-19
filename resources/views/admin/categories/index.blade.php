@extends('admin.layouts.master')

@section('panel_title','دسته بندی ها')

@section('panel_page_title','دسته بندی ها')

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
                    <form class="form-horizontal" action="{{ route('admin.category.index') }}" method="get">
                        <div class="form-group">
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-doc-text"></i></span>
                                    <input type="text" name="name" id="name" placeholder="عنوان دسته بندی"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-dot-3"></i></span>
                                    <div class="">
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($parents as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-link"></i></span>
                                    <input type="text" name="slug" id="slug" placeholder="Slug" class="form-control">
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
                    <h3 class="panel-title">لیست دسته بندی ها</h3>
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
                                <th class="text-center">والد</th>
                                <th class="text-center">کاربر</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">ترتیب</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">slug</th>
                                <th class="text-center">ایجاد</th>
                                <th class="text-center">ویرایش</th>
                                <th class="text-center">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="text-center">
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ isset($category->parent_id) ? $category->parent->name:'---' }}</td>
                                    <td>{{ isset($category->user->name) ? $category->user->name : ' | ' }}{{ $category->user->mobile }}</td>
                                    <td>{{ $category->type }}</td>
                                    <td>{{ $category->sort }}</td>
                                    <td><a href="#" class="<?php if (!empty($user->susspend)) {
                                            echo 'txt-red';
                                        } else {
                                            echo 'txt-green';
                                        }; ?>  "><i class="fa fa-check"></i></a></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{jDate::forge($category->created_at)->format('datetime')}}</td>
                                    <td>{{jDate::forge($category->updated_at)->format('datetime')}}</td>
                                    <td>
                                        <a href="{{route('admin.category.update',['id'=>$category->id])}}"><i class="fa fa-cog text-primary"></i></a>
                                        <a href="{{route('admin.category.delete',['id'=>$category->id])}}"><i class="fa fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
