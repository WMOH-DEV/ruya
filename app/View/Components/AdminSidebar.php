<?php

namespace App\View\Components;

use App\Models\Message;
use App\Models\Order;
use Illuminate\View\Component;

class AdminSidebar extends Component
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
        $newOrders  = Order::where('status', 0)->count();
        $newMsgs    = Message::where('status', 0)->count();
        return view('components.admin-sidebar', compact('newOrders','newMsgs'));
    }
}
