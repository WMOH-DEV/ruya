<?php

namespace App\View\Components;

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
        return view('components.main-footer', compact('stages', 'social'));
    }
}
