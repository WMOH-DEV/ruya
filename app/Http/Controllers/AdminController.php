<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Home;
use App\Models\Message;
use App\Models\Order;
use App\Models\Page;
use App\Models\Teacher;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $allTeachersQuery = Teacher::all();
        $teachersCount = $allTeachersQuery->count();

        $allStudents = User::where('role_id','2');
        $studentsCount = $allStudents->count();
        $teachersPending = Teacher::where('isAccepted', 0)->get()->count();

        $maleTeacher = Teacher::whereHas('user',function (Builder $query){
                      return $query->where('gender','male');
        })->count();

        $femaleTeacher = Teacher::whereHas('user',function (Builder $query){
            return $query->where('gender','female');
        })->count();


        // Order Counts Will show at Admin Index
        $openOrders = Order::where('admin_status','قيد الانتظار')->count();
        $refusedOrders = Order::where('admin_status','مرفوض')->count();
        $closedOrders = Order::where('admin_status','مكتمل')->count();
        $allOrders = Order::all()->count();

        //last registered Teachers and last Orders
        $lastOrders = Order::orderBy('id', 'desc')->get()->take(3);
        $lastTeachers = Teacher::orderBy('id', 'desc')->get()->take(3);

        // Messages
        $newMsgs = Message::where('status','0')->count();
        $unAnswerMsgs = Message::where('isResponded','0')->count();
        $answeredMsgs = Message::where('isResponded','0')->count();
        $allMsgs = Message::all()->count();

        //dd($openOrders);

        return view('cp.index',
            compact('teachersCount', 'studentsCount',
                'allStudents',
                'teachersPending',
                'maleTeacher',
                'openOrders',
                'refusedOrders',
                'closedOrders',
                'allOrders',
                'lastOrders',
                'lastTeachers',
                'femaleTeacher',
                'newMsgs',
                'unAnswerMsgs',
                'answeredMsgs',
                'allMsgs',
            ));

       // dd($teachersPending);

    }


    public function homeStatics()
    {
        $home = Home::first();
        //dd($home);
        return view('cp.pages.home', compact('home'));
    }

    public function updateHomeStatics(Home $home, Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'trusted_student'   => ['required', 'numeric'],
            'courses_student'   => ['required', 'numeric'],
            'total_teachers'    => ['required', 'numeric'],
            'total_requests'    => ['required', 'numeric'],
            'support_whatsapp'  => ['required', 'numeric'],
            'whatsapp2'         => ['nullable', 'numeric'],
            'whatsapp3'         => ['nullable', 'numeric'],
            'facebook'          => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'youtube'           => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'twitter'           => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'instagram'         => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'new1'              => ['string'],
            'link1'             => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'new2'              => ['string'],
            'link2'             => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'new3'              => ['string'],
            'link3'             => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'new4'              => ['string'],
            'link4'             => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],
            'new5'              => ['string'],
            'link5'             => ['regex:/(^(http|https)\:\/\/)[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/'],

        ]);

        $data = array_filter($data);

        $home->update($data);

        $factory->addSuccess('تم تعديل الإحصائيات');

        return redirect()->back();
    }

    public function getCodes()
    {
        $code = Code::first();
        return view('cp.codes.index', compact('code'));
    }

    public function updateCodes(Code $code, Request $request, ToastrFactory $factory)
    {
        $data = $request->validate([
            'google_console'    => ['nullable', 'string'],
            'facebook'          => ['nullable', 'string'],
            'adsense'           => ['nullable', 'string'],
        ]);

        $code->update($data);

        $factory->addSuccess('تم تحديث الاكواد');

        return redirect()->back();
    }

} // End Admin Controller
