<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestParam;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query();

        $categories = RequestParam::where('id', $categories, true);
        $categories = RequestParam::where('parent_id', $categories, false);
        $categories = RequestParam::whereLike('name', $categories, false);
        $categories = RequestParam::where('slug', $categories, false);

        $categories = $categories->orderBy('id', 'DESC');
        $categories = $categories->simplePaginate(15);

        $parents = Category::whereNull('parent_id')->get();
        return view('admin.categories.index', compact(['categories','parents']));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $categories = Category::orderBy('name', 'ASC')->get();
            return view('admin.categories.create', compact('categories'));
        }

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

        $category = Category::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
            'sort' => $request->sort,
            'parent_id' => $request->parent_id,
        ]);

        return back()->withErrors(['success' => 'عملیات با موفقیت انجام شد']);
    }

    public function update(Category $category, Request $request)
    {
        if ($request->isMethod('get')) {
            $categories = Category::where('id', '<>', $category->id)->orderBy('name', 'ASC')->get();
            return view('admin.categories.update', compact(['category', 'categories']));
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

        $category->update($input);

        return redirect()->route('admin.category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return back();
    }

    public function approved(Category $category)
    {
        if ($category->approved) {
            $category->approved = false;
        } else {
            $category->approved = true;
        }
        $category->save();
        return back();
    }
}
