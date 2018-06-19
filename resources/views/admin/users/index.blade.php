@extends('admin.layouts.master')

@section('panel_title','مدیریت کاربران')

@section('panel_page_title','مدیریت کاربران')

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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" name="name" id="name" placeholder="نام و نام خانوادگی"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-mobile"></i></span>
                                    <input type="text" name="mobile" id="mobile" placeholder="شماره همراه"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-mail"></i></span>
                                    <input type="text" name="email" id="email" placeholder="ایمیل" class="form-control">
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
                    <h3 class="panel-title">لیست کاربران</h3>
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
                                <th class="text-center">نام و نام خانوادگی</th>
                                <th class="text-center">سطح کاربری</th>
                                <th class="text-center">تلفن همراه</th>
                                <th class="text-center">ایمیل</th>
                                <th class="text-center">susspend</th>
                                <th class="text-center">عضویت</th>
                                <th class="text-center">ویرایش</th>
                                <th class="text-center">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>---</td>
                                    <td class="<?php if (empty($user->check_mobile)) echo 'txt-red';?>">{{ $user->mobile }}</td>
                                    <td class="<?php if (empty($user->check_email)) echo 'txt-red';?>">{{ $user->email }}</td>
                                    <td><a href="#" class="<?php if (!empty($user->susspend)) {
                                            echo 'txt-red';
                                        } else {
                                            echo 'txt-green';
                                        }; ?> "><i class="fa fa-check"></i></a></td>
                                    <td>{{jDate::forge($user->created_at)->format('datetime')}}</td>
                                    <td>{{jDate::forge($user->updated_at)->format('datetime')}}</td>
                                    <td>
                                        <a href="{{route('admin.user.update',['id'=>$user->id])}}"><i class="fa fa-cog text-primary"></i></a>
                                        <a href="{{route('admin.user.delete',['id'=>$user->id])}}"><i class="fa fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>

@endsection