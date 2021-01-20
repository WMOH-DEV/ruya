<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Subject;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stages = Stage::all();
        $subjects = Subject::paginate(20);

        return view('cp.subjects.index', compact('stages','subjects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //dd($request->all());
        $request->validate([
            'subject_name' => ['required', 'string', 'max:100'],
            'stage_id' =>['exists:stages,id', 'required']
        ]);

        Subject::create([
            'stage_id' => $request->stage_id,
            'subject_name'=> $request->subject_name
        ]);

        session()->flash('subjectadded','تم إضافة المادة !!');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Subject $subject
     * @param ToastrFactory $factory
     * @return RedirectResponse
     */
    public function update(Request $request, Subject $subject, ToastrFactory $factory)
    {
        //
        $request->validate([
            'subject_name' => ['required', 'string', 'max:100'],
            'stage_id' =>['exists:stages,id', 'required']
        ]);

        $subject = Subject::findOrFail($request->subject_id);

        $subject->update([
            'stage_id' => $request->stage_id,
            'subject_name'=> $request->subject_name
        ]);

        $factory->addSuccess( 'تم تعديل المادة بنجاح');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Request $request, Subject $subject, ToastrFactory $factory)
    {

        //dd($request->all());
        $subject = Subject::findOrfail("$request->subject_id");
        //dd($subject);

        $subject->delete();

        $factory->addSuccess('تم حذف المادة');

        return redirect()->back();
    }

}
