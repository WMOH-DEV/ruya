<?php

namespace App\Http\Controllers;

use App\Models\Residence;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //show Residences on admincp
        $residences = Residence::all();
        //dd($Residences);
        return view('cp.Residences.index', compact('residences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, ToastrFactory $factory)
    {
        //
        $request->validate([
            'residence_name' => ['required', 'string', 'max:100'],
        ]);


        Residence::create([
            'residence_name' => $request->residence_name
        ]);

        //session()->flash('Residenceadded', 'تم إضافة المرحلة !!');
        $factory->addSuccess('تم إضافة دولة جديدة');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Residence $Residence
     * @return Response
     */
    public function show(Residence $residence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Residence $Residence
     * @return Response
     */
    public function edit(Residence $residence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Residence $Residence
     * @param ToastrFactory $factory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ToastrFactory $factory)
    {
        //
        $request->validate([
            'residence_name' => ['required', 'string', 'max:100'],
        ]);

        $residence = Residence::findOrFail($request->residence_id);

        $residence->update([
            'residence_name' => $request->residence_name
        ]);

        $factory->addSuccess('تم تعديل الدولة بنجاح');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     *
     * @param ToastrFactory $factory
     * @return Response
     */
    public function destroy(Request $request, ToastrFactory $factory)
    {

        //dd($request->all());
        $residence = Residence::findOrfail("$request->residence_id");
        //dd($stage);

        $residence->delete();

        $factory->addSuccess('تم حذف الدولة');

        return redirect()->back();
    }
}
