<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    //get data from table category
    public function index()
    {
        $category = category::all();
        return view('admin/category/index', compact('category'));
    }


    //show page add category
    public function create()
    {
        return view('admin/category/create');
    }


    //save send category
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new category;
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getclientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->mate_title = $data['mate_title'];
        $category->mate_description = $data['mate_description'];
        $category->mate_keyword = $data['mate_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('message', 'category Added successfully');
    }


    //show page edit category
    public function edit($category_id)
    {
        $category = category::find($category_id);
        return view('admin/category/edit', compact('category'));
    }


    //update category
    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        if ($request->hasfile('image')) {


            // update image
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '-' . $file->getclientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->mate_title = $data['mate_title'];
        $category->mate_description = $data['mate_description'];
        $category->mate_keyword = $data['mate_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/category')->with('message', 'category Update successfully');
    }

    // delete Category

    public function destroy($category_id)
    {
        $category = category::find($category_id);
        if ($category) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message', 'Category Deleted With its posts Successfuly');
        } else {
            return redirect('admin/category')->with('message', 'No Category id found');
        }
    }
}
