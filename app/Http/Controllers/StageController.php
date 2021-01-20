<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('cp.stages.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'stage_name' => ['required', 'string', 'max:100'],
        ]);

        Stage::create([
            'stage_name'=> $request->stage_name
        ]);

        session()->flash('stageadded','تم إضافة المرحلة !!');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ToastrFactory $factory)
    {
        //
        $request->validate([
            'stage_name' => ['required', 'string', 'max:100'],
        ]);

        $stage = Stage::findOrFail($request->stage_id);

        $stage->update([
            'stage_name'=> $request->stage_name
        ]);

        $factory->addSuccess( 'تم تعديل المرحلة بنجاح');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param \App\Models\Stage $stage
     * @param ToastrFactory $factory
     * @return Response
     */
    public function destroy(Request $request, Stage $stage, ToastrFactory $factory)
    {

        //dd($request->all());
        $stage = Stage::findOrfail("$request->stage_id");
        //dd($stage);

        $stage->delete();

        $factory->addSuccess('تم حذف المرحلة');

        return redirect()->back();
    }
}
