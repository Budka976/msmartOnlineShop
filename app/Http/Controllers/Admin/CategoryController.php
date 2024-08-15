<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::query()->orderBy('created_at','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
        
    }

    public function store(Request $request){
        // dd($request->all());
        $validateData = $request->validate([
            'name' => 'required|unique:categories|string|max:255',
            'slug' => 'required|unique:categories|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:10000',
            'status' => 'nullable',
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/',$filename);
            $validateData['image'] = 'uploads/categories/'.$filename;
        }
        else{
            $validateData['image'] = 'null';
        }


        Category::Query()->create([
            'name' => $validateData['name'],
            'slug' => $validateData['slug'],
            'image' => $validateData['image'],
            'status' =>$request->status == true ? 1 : 0,
        ]);

        return redirect('admin/categories')->with('success','Category created successfully');

    }

    public function edit($id){
        return view('admin.category.edit');
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

        
    }
}
