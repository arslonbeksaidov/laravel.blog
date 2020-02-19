<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {

        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = new  Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message' => 'OK'];
    }

    public function all_category()
    {
        return response()->json([
            'categories' => Category::all(),
            'paginations' => Category::query()->latest()->paginate(5)
        ], 200);
    }

    public function all_pagination()
    {
        return response()->json([
            'paginations' => Category::query()->latest()->paginate(5)
        ], 200);
    }

    public function delete_category($id)
    {
        //return $id;
        Category::query()->find($id)->delete();
        return response()->json("{$id} raqamli malumot ochirildi");

    }

    public function edit_category($id)
    {
        //return $id;
        $category = Category::query()->find($id);
        return response()->json([
            "category" => $category
        ], 200);
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = Category::query()->find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
}

