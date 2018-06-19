@extends('admin.layouts.master')

@section('panel_title','ایجاد فروشگاه')

@section('panel_page_title','ایجاد فروشگاه')

@section('panel_content')
    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-48">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">ایجاد فروشگاه</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-lg-offset-3">
                        @include('admin.layouts.errors')
                        <form action="{{ route('admin.shop.create') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="parent_id">دسته بندی</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">عنوان فروشگاه</label>
                                <input type="text" value="{{ @old('title') }}" class="form-control" id="title" name="title"
                                       placeholder="عنوان دسته بندی">
                            </div>

                            <div class="form-group">
                                <label for="slug">دومین</label>
                                <input type="text" value="{{ @old('domain') }}" class="form-control" id="domain" name="domain"
                                       placeholder="دومین">
                            </div>

                            <div class="form-group">
                                <label for="slug">نام کاربری</label>
                                <input type="text" value="{{ @old('username') }}" class="form-control" id="username" name="username"
                                       placeholder="نام کاربری">
                            </div>

                            <div class="form-group">
                                <label for="slug">آدرس</label>
                                <input type="text" value="{{ @old('address') }}" class="form-control" id="address" name="address"
                                       placeholder="آدرس">
                            </div>

                            <div class="form-group">
                                <label for="slug">تلفن ثابت</label>
                                <input type="text" value="{{ @old('phone') }}" class="form-control" id="phone" name="phone"
                                       placeholder="تلفن ثابت">
                            </div>

                            <div class="form-group">
                                <label for="sort">ترتیب</label>
                                <input type="text" value="{{ @old('sort') }}" class="form-control" id="sort" name="sort"
                                       placeholder="ترتیب">
                            </div>

                            <div class="form-group">
                                <label for="type">نوع</label>
                                <input type="text" value="{{ @old('type') }}" class="form-control" id="type" name="type"
                                       placeholder="نوع">
                            </div>

                            <div class="form-group">
                                <label for="type">توضیحات</label>
                                <input type="text" value="{{ @old('description') }}" class="form-control" id="description" name="description"
                                       placeholder="توضیحات">
                            </div>

                            <button type="submit" class="btn btn-success btn-block">ایجاد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection