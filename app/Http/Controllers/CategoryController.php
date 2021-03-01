<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $cats = Category::all();

        return view('cp.courses.cats', compact('cats'));
    } // end index

    public function update(Category $cat, Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'name'          => ['string', 'max:200'],
            'short_name'    => ['string', 'max:100'],
            'image'         => ['max:512', 'image'],
        ]);

        if ($request->hasFile('image')){
            $data['image'] = Storage::putFile('courses' , $request->file('image'));
        }
        $data = array_filter($data);

        $cat->update($data);
        $cat->save();

        $factory->addSuccess('تم تعديل التصنيف بنجاح');

        return redirect()->back();
    }

    public function store(Request $request, ToastrFactory $factory)
    {

        $data = $request->validate([
            'name'          => ['required', 'string', 'max:200'],
            'short_name'    => ['required', 'string', 'max:100'],
            'image'         => ['max:512', 'image'],
        ]);

        if ($request->hasFile('image')){
            $data['image'] = Storage::putFile('courses' , $request->file('image'));
        }

        $data = array_filter($data);

        Category::create($data);

        $factory->addSuccess('تم تعديل التصنيف بنجاح');

        return redirect()->back();
    }//end Store

    public function destroy(Category $cat, Request $request, ToastrFactory $factory)
    {

        Storage::delete($cat->image);

        $cat->delete();

        $factory->addSuccess('تم حذف التصنيف');

        return redirect()->back();
    }


    public function show()
    {
        $cats = Category::all();
        $courses = Course::orderBy('id','desc')->get();
        return view('main.courses.index', compact('cats','courses'));
    }

} // End Controller
