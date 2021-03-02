<?php

namespace App\View\Components;

use App\Models\Code;
use Illuminate\View\Component;

class HeaderCodes extends Component
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
        $google_console = Code::first()->google_console;
        $adsense        = Code::first()->adsense;
        $facebook       = Code::first()->facebook;
        $headerCode     = Code::first()->header_code;
        return view('components.header-codes', compact('google_console','headerCode', 'adsense', 'facebook'));
    }
}
