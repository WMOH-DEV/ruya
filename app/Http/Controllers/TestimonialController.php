<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    //

    public function index()
    {
        $tests = Testimonial::paginate(20);
        return view('cp.pages.testimonials', compact('tests'));
    }

    public function store(Request $request, ToastrFactory $factory)
    {


        $data = $request->validate([
            'full_review'       => ['required', 'string', 'max:200'],
            'short_review'      => ['nullable', 'string', 'max:100'],
            'owner'             => ['required', 'string', 'max:50'],
            'owner_title'       => ['required', 'string', 'max:30'],
            'photo'             => ['nullable', 'max:512', 'mimes:jpg,png,jpeg,PNG,JPG', 'max:512'],
        ]);
        if ($request->hasFile('photo')){
        $data['photo'] = Storage::putFile('testimonials' , $request->file('photo'));
        }
        $data = array_filter($data);

        Testimonial::create($data);

        $factory->addSuccess('تم إضافة الرأي بنجاح');

        return redirect()->back();
    }

    public function update(Testimonial $test, Request $request, ToastrFactory $factory)
    {
       // dd($request->all());

        $data = $request->validate([
            'full_review'       => ['required', 'string', 'max:200'],
            'short_review'      => ['nullable', 'string', 'max:100'],
            'owner'             => ['required', 'string', 'max:50'],
            'owner_title'       => ['required', 'string', 'max:30'],
            'photo'             => ['nullable', 'mimes:jpg,png,jpeg,JPG,PNG', 'max:512'],
        ]);

        if ($request->hasFile('photo')){
            $data['photo'] = Storage::putFile('testimonials' , $request->file('photo'));
        }
        $data = array_filter($data);

        $test->update($data);

        $factory->addSuccess('تم تعديل الرأي بنجاح');

        return redirect()->back();
    } // end Update


    public function destroy(Testimonial $test, ToastrFactory $factory )
    {

        $test->delete();

        $factory->addSuccess('تم حذف الرأي');

        return redirect()->back();

    }

}
