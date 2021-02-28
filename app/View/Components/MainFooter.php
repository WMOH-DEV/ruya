<?php

namespace App\View\Components;

use App\Models\Course;
use App\Models\Home;
use App\Models\Stage;
use Illuminate\View\Component;

class MainFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $stages = Stage::all()->take(8);
        $social = Home::first();
        $last_courses = Course::orderBy('id','desc')->take(4)->get();

        //dd($last_courses);
        return view('components.main-footer', compact('stages', 'social','last_courses'));
    }
}
