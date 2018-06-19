<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Helpers\Sms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^09[0-3][0-9]{8}$/u'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'return' => [
                    'code' => 422,
                    'message_fa' => 'شماره تلفن همراه وارد شده اشتباه است.',
                ]
            ], 422);
        }
        $code = rand(111111, 999999);
        $user = User::where(['mobile' => $request->mobile])->first();
        if (!$user) {
            $user = User::create([
                'mobile' => $request->mobile,
                'token' => Str::random(100),
                'code' => $code,
            ]);
        }

        $sms = Sms::sendOtp($user, 'shopVerify');
        if ($sms) {
            return response()->json([
                'return' => [
                    'code' => 200,
                    'message_fa' => 'کد احراز هویت شما با موفقیت به شماره موبایل شما پیامک شد',
                ]
            ], 200);
        } else {
            return response()->json([
                'return' => [
                    'code' => 200,
                    'message_fa' => 'خطا در ارسال کد احراز هویت! لطفا مجددا تلاش کنید.',
                ]
            ], 200);
        }
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^09[0-3][0-9]{8}$/u',
            'code' => 'required|numeric|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'return' => [
                    'code' => 422,
                    'message_fa' => 'شماره تلفن یا کد احراز هویت ارسال شده صحیح نمیباشد',
                ]
            ], 422);
        }
        $user = User::where(['mobile' => $request->mobile])->first();
        if (!$user) {
            return response()->json([
                'return' => [
                    'code' => 404,
                    'message_fa' => 'کاربری با این شماره همراه یافت نشد',
                ]
            ], 404);
        }
        if ($user->code == $request->code) {
            $user->check_mobile = true;
            $user->save();
            Auth::loginUsingId($user->id,true);
            return response()->json([
                'return' => [
                    'code' => 200,
                    'message_fa' => 'عملیلات ورود موفقیت آمیز بود',
                ]
            ], 200);
        } else {
            return response()->json([
                'return' => [
                    'code' => 422,
                    'message_fa' => 'کد احراز هویت ارسال شده صحیح نمیباشد',
                ]
            ], 422);
        }
    }
}
