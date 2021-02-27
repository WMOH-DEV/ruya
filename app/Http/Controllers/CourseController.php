<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
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

    public function update(Course $course, CourseRequest $request, ToastrFactory $factory)
    {
        $data = $request->validated();
        //dd($data);
        if ($request->hasFile('intro_image')){
            $data['intro_image'] = Storage::putFile('courses' , $request->file('intro_image'));
        }
        $data = array_filter($data);

        $course->update($data);
        $course->save();

        $factory->addSuccess('تم تعديل الكورس بنجاح');

        return redirect()->back();
    }

    public function store(CourseRequest $request, ToastrFactory $factory)
    {

        $data = $request->validated();

        if ($request->hasFile('intro_image')){
            $data['intro_image'] = Storage::putFile('courses' , $request->file('intro_image'));
        }

        $data = array_filter($data);

        Course::create($data);

        $factory->addSuccess('تم إضافة الكورس بنجاح');

        return redirect()->back();

    }//end Store

    public function destroy(Course $course, ToastrFactory $factory)
    {

        Storage::delete($course->intro_image);

        $course->delete();

        $factory->addSuccess('تم حذف الكورس');

        return redirect()->back();
    } // end Destroy

    public function show(Course $course)
    {
        return view('main.courses.course', compact('course'));
    }
}
