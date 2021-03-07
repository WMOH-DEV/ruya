<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stage;
use App\Models\Teacher;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(10);
//        $order = Order::first();
//        dd($order->user);
       // dd($orders);
        Order::where('status', 0)->update(['status' => 1]);
        return view('cp.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create($id)
    {

        $teacher = Teacher::where('id',"$id")->first();

        //dd($teacher);
        return view('main.booking.teachers', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse|Response
     */
    public function store(Request $request, ToastrFactory $factory)
    {
        //

      //  dd($request->all());
        $request->validate([
            'teacher__id'=>['integer','required'],
            'student__id'=>['integer','required'],
            'stage__id'=>['exists:stages,id', 'integer','required'],
            'subject'=>['regex:/^[a-zA-Z\sأبجدهـوزحطيكلمنسعغفصقرشتثخذضظؤاإءئةى]+$/','required'],
            'hours'=>['required','integer'],
            'contact_way'=>['regex:/^(email|phone|whatsapp)$/'],
            'start_date'=>['date'],
            'notes'=>['max:200','regex:/^[a-zA-Z\sأبجدهـوزحطيكلمنسعغفصقرشتثخذضظؤاإءئةى]+$/'],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        Order::create([
            'user_id'=> $request->student__id,
            'teacher_id'=> $request->teacher__id,
            'stage_id'=> $request->stage__id,
            'subject_name'=>$request->subject,
            'hours'=>$request->hours,
            'contact_way'=>$request->contact_way,
            'notes'=> $request->notes,
            'start_date'=>$request->start_date
        ]);

        $factory->addSuccess('تم إرسال طلبكم إلى الادارة');

        return view('main.booking.thanks');


    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ToastrFactory $factory
     * @return RedirectResponse
     */
    public function update(Request $request, ToastrFactory $factory)
    {
        //
       //dd($request->all());

        $order = Order::findOrfail("$request->order_id");

        //dd($order);
        if ($request->admin_status == $order->admin_status){
            return back();
        }else{
            $order->admin_status = $request->admin_status;
            $order->save();
            $factory->addInfo('تم تغيير حالة الطلب');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
