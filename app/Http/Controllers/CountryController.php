<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Flasher\Prime\FlasherInterface;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //show countries on admincp
        $countries = Country::all();
        //dd($countries);
        return view('cp.countries.index', compact('countries'));
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
            'country_name' => ['required', 'string', 'max:100'],
        ]);


        Country::create([
            'country_name' => $request->country_name
        ]);

        //session()->flash('countryadded', 'تم إضافة المرحلة !!');
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
     * @param \App\Models\Country $country
     * @return Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Country $country
     * @return Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @param ToastrFactory $factory
     * @return Response
     */
    public function update(Request $request, ToastrFactory $factory)
    {
        //
        $request->validate([
            'country_name' => ['required', 'string', 'max:100'],
        ]);

        $country = Country::findOrFail($request->country_id);

        $country->update([
            'country_name' => $request->country_name
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
        $country = Country::findOrfail("$request->country_id");
        //dd($stage);

        $country->delete();

        $factory->addSuccess('تم حذف الدولة');

        return redirect()->back();
    }
}
