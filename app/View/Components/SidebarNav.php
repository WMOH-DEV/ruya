<?php

namespace App\View\Components;

use App\Models\Home;
use Illuminate\View\Component;

class SidebarNav extends Component
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
        $whatsapp = Home::first()->support_whatsapp;
        $whatsapp2 = Home::first()->whatsapp2;
        $whatsapp3 = Home::first()->whatsapp3;
        return view('components.sidebar-nav',compact('whatsapp', 'whatsapp2', 'whatsapp3'));
    }
}
