<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    
    //index
    public function index(Request $request)
    {
        $categories = DB::table('categories')
        ->when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
    return view('pages.category.index', compact('categories'));
    }

     public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        \App\Models\Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category successfully created');
    }

    public function show($id)
    {
        return view('pages.category.index');
    }


    public function edit($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category successfully updated');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category successfully deleted');
    }

}