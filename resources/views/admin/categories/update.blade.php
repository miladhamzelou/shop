@extends('admin.layouts.master')

@section('panel_title','بروز رسانی دسته بندی')

@section('panel_page_title','بروز رسانی دسته بندی')

@section('panel_content')
    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-48">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">ویرایش دسته بندی</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-lg-offset-3">
                        @include('admin.layouts.errors')
                        <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="parent_id">والد</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                @foreach($categories as $cat)
                                        <option <?php if ($cat->id == $category->parent_id) {echo 'selected';} ?> value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">عنوان دسته بندی</label>
                                <input type="text" value="{{ $category->name }}" class="form-control" id="name" name="name"
                                       placeholder="عنوان دسته بندی">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{ $category->slug }}" class="form-control" id="slug" name="slug"
                                       placeholder="slug">
                            </div>

                            <div class="form-group">
                                <label for="sort">ترتیب</label>
                                <input type="text" value="{{ $category->sort }}" class="form-control" id="sort" name="sort"
                                       placeholder="ترتیب">
                            </div>

                            <div class="form-group">
                                <label for="type">نوع</label>
                                <input type="text" value="{{ $category->type }}" class="form-control" id="type" name="type"
                                       placeholder="نوع">
                            </div>

                            <button type="submit" class="btn btn-success btn-block">ایجاد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection