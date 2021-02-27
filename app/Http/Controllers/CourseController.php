<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(20);
        $cats = Category::all();
        return view('cp.courses.index', compact('courses', 'cats'));
    } // end index

    public function update(Course $course, Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'name'          => ['string', 'max:200'],
            'short_name'    => ['string', 'max:100'],
            'image'         => ['max:512', 'image'],
        ]);

        if ($request->hasFile('intro-image')){
            $data['intro-image'] = Storage::putFile('courses' , $request->file('intro-image'));
        }
        $data = array_filter($data);

        $course->update($data);
        $course->save();

        $factory->addSuccess('تم تعديل الكورس بنجاح');

        return redirect()->back();
    }

    public function store(Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'title'                 => ['required', 'string', 'max:200'],
            'price'                 => ['required', 'string'],
            'duration'              => ['required', 'string'],
            'instructor'            => ['required', 'string'],
            'about_instructor'      => ['required', 'string'],
            'how'                   => ['required', 'string'],
            'lectures'              => ['nullable', 'numeric'],
            'language'              => ['nullable', 'string'],
            'intro_video'           => ['nullable', 'string'],
            'intro_image'           => ['nullable', 'image'],
            'intro_text'            => ['required', 'string'],
            'content'               => ['required', 'string'],
            'for_who'               => ['nullable', 'string'],
            'requirements'          => ['nullable', 'string'],
            'category_id'           => ['required', 'numeric'],
        ]);

        if ($request->hasFile('intro_image')){
            $data['intro_image'] = Storage::putFile('courses' , $request->file('intro_image'));
        }

        $data = array_filter($data);

        Course::create($data);

        $factory->addSuccess('تم إضافة الكورس بنجاح');

        return redirect()->back();

    }//end Store

    public function destroy(Category $cat, Request $request, ToastrFactory $factory)
    {

        Storage::delete($cat->image);

        $cat->delete();

        $factory->addSuccess('تم حذف التصنيف');

        return redirect()->back();
    }
}
