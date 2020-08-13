<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        return view('Admin.Categories.index', compact('categories'));
    }
    public function create(){
        return view('Admin.Categories.create');
    }
    public function store(CategoryRequest $request){
        $category = new Category;
        $category->c_name = $request->c_name;
        $category->c_slug = Str::slug($request->c_name);
        if ($request->hasFile('image')) {
			
            $file = $request->image;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('categories/'), $filename);
            $category->c_avatar = 'categories/' . $filename;
            $image = Image::make(public_path('categories/'.$filename))->fit(640,426);
            $image->save();
        }
        $category->save();
        return \redirect()->route('admin.category.index');
    }
    public function hot($id){
    	$category = Category::find($id);
    	$category->c_hot =! $category->c_hot;
    	$category->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$category = Category::find($id);
    	return view('admin.categories.update', compact('category'));
    }
    public function update(CategoryRequest $request,$id){
    	$category =  Category::find($id);
        $category->c_name = $request->c_name;
        $category->c_slug = Str::slug($request->c_name);
        if ($request->hasFile('image')) {
            // xoa anh cu
            if ($category->c_avatar) {
                $old_image = $category->c_avatar;
                unlink($old_image);
            }
            $file = $request->image;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('category/'), $filename);
            $category->c_avatar = 'category/' . $filename;
            $image = Image::make(public_path('category/'.$filename))->fit(640,426);
            $image->save();
        }
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function destroy($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect()->back();
    }
}
