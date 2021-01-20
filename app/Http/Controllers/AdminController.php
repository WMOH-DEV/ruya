<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Page;
use App\Models\Teacher;
use App\Models\User;
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
        $openOrders = Order::where('admin_status','مفتوح')->count();
        $refusedOrders = Order::where('admin_status','مرفوض')->count();
        $closedOrders = Order::where('admin_status','تم استلام العمولة')->count();
        $allOrders = Order::all()->count();

        //last registered Teachers and last Orders
        $lastOrders = Order::orderBy('id', 'desc')->get()->take(3);
        $lastTeachers = Teacher::orderBy('id', 'desc')->get()->take(3);


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
                'femaleTeacher'));

       // dd($teachersPending);

    }




} // End Admin Controller
