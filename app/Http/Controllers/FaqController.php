<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //

    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('cp.pages.faq', compact('faqs'));
    }

    public function store(Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'ques'      => ['required', 'string', 'max:500'],
            'answer'    => ['required', 'string', 'max:1000']
        ]);

        Faq::create($data);

        $factory->addSuccess('تم إضافة سؤال جديد إلى الموقع');

        return redirect()->back();
    }

    public function update(Faq $ques, Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'ques'      => ['required', 'string', 'max:500'],
            'answer'    => ['required', 'string', 'max:1000']
        ]);

        $ques->update($data);

        $factory->addSuccess('تم تعديل السؤال بنجاح');

        return redirect()->back();
    } // end Update


    public function destroy(Faq $ques, ToastrFactory $factory )
    {

        $ques->delete();

        $factory->addSuccess('تم حذف السؤال');

        return redirect()->back();

    }

    public function mainIndex()
    {
        $faqs = Faq::paginate(10);
        return view('main.pages.faq', compact('faqs'));
    } // End Main index
}
