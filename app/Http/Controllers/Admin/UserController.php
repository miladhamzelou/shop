<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestParam;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();

        $users = RequestParam::where('id',$users,true);
        $users = RequestParam::where('email',$users,false);
        $users = RequestParam::where('mobile',$users,false);
        $users = RequestParam::whereLike('name',$users,false);

        $users = $users->orderBy('id','DESC');
        $users = $users->simplePaginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function update(User $user, Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.users.update', compact('user'));
        }

        $input = $request->only([
            'name',
            'email'
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|min:5',
            'email' => 'nullable|email|unique:users'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if (!empty($request->email)){
            $input['check_email'] = true;
        }

        $user->update($input);

        return back()->withErrors(['success' => 'عملیات با موفقیت انجام شد']);
    }

    public function delete(User $user)
    {
        $user->delete();
        return back();
    }

    public function susspend(User $user)
    {
        if ($user->susspend) {
            $user->susspend = false;
        } else {
            $user->susspend = true;
        }
        $user->save();
        return back();
    }
}
