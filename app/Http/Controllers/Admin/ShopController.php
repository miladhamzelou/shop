<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestParam;
use App\Models\Category;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::query();

        $shops = RequestParam::where('id', $shops, true);
        $shops = RequestParam::where('parent_id', $shops, false);
        $shops = RequestParam::whereLike('name', $shops, false);
        $shops = RequestParam::where('slug', $shops, false);

        $shops = $shops->orderBy('id', 'DESC');
        $shops = $shops->simplePaginate(15);

        $categories = Shop::all();
        return view('admin.shops.index', compact(['shops', 'categories']));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $categories = Category::where('type', 'shop')->orderBy('name', 'ASC')->get();
            return view('admin.shops.create', compact('categories'));
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'username' => 'required|string|unique:shops',
            'domain' => 'nullable|string|unique:shops',
            'phone' => 'nullable|string|min:10',
            'address' => 'nullable|string|min:10',
            'type' => 'required|string|min:2',
            'category_id' => 'nullable|numeric',
            'sort' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $shop = Shop::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'domain' => $request->domain,
            'username' => $request->username,
            'type' => $request->type,
            'sort' => $request->sort,
            'address' => $request->address,
            'phone' => $request->phone,
            'category_id' => $request->category_id,
            'expire' => Carbon::now()->addDay(30),
        ]);

        return back()->withErrors(['success' => 'عملیات با موفقیت انجام شد']);
    }

    public function update(Shop $shop, Request $request)
    {
        if ($request->isMethod('get')) {
            $shops = Shop::where('id', '<>', $shop->id)->orderBy('name', 'ASC')->get();
            return view('admin.shops.update', compact(['shop', 'shops']));
        }

        $input = $request->only([
            'name',
            'slug',
            'type',
            'parent_id',
            'sort',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'slug' => 'nullable|string|unique:categories',
            'type' => 'required|string|min:2',
            'parent_id' => 'nullable|numeric',
            'sort' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $shop->update($input);

        return redirect()->route('admin.shops.index');
    }

    public function delete(Shop $shop)
    {
        $shop->delete();
        return back();
    }

    public function approved(Shop $shop)
    {
        if ($shop->approved) {
            $shop->approved = false;
        } else {
            $shop->approved = true;
        }
        $shop->save();
        return back();
    }
}
