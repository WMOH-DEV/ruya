<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Home;
use App\Models\Order;
use App\Models\Stage;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //

    /**
     * This Function to return the home view
     * With DB stages for search Query
     * @return Application|Factory|View
     */
    public function getHome()
    {
        $stages = Stage::all();
        $tests = Testimonial::all();
        $home = Home::first();
        $cats = Category::orderBy('id','desc')->get()->take(8);
        $courses = Course::orderBy('id','desc')->get()->take(3);
        return view('home', compact('stages', 'tests', 'home','cats','courses'));
    }


    /**
     * For Home search processing
     * validation + results
     * @param Request $request
     * @param ToastrFactory $factory
     * @return Application|Factory|View
     */
    public function mainSearch(Request $request, ToastrFactory $factory)
    {

        // Validation
        $request->validate([
            'stage' => ['exists:stages,id', 'max:50', 'required'],
            'subject' => ['regex:/^[a-zA-Z\sأبجدهـوزحطيكلمنسعغفصقرشتثخذضظؤاإءئةى]+$/','required']
        ]);

        // search inquires
        $selectedSubject = $request->subject;
        $selectedStage = $request->stage;

        // get Stages to return it again to the view
        $stages = Stage::all();

        // Main Inquiry
        $teacherQuery = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
            ->where('subject_name','like', "%$selectedSubject%")
            ->where('stage_id', '=', "$selectedStage")
            ->where('teachers.isAccepted', '1') // Only Accepted Teachers will appear
            ->select(['users.*','teachers.id as teacher_id', 'teachers.*','subjects.*']);



        $teachersCount = $teacherQuery->get()->count();
        $teachers = $teacherQuery->paginate(5);


        if ($teachersCount == 0){
            $factory->addError('لا يوجد نتائج بحث لهذه المادة');
        }

        return view('main.results', compact('stages', 'teachersCount','teachers' ));

    }

    public function testIndex()
    {
        $tests = Testimonial::orderBy('id','desc')->take(5)->get();
        return view('home', compact('tests'));
    }

    public function userProfile()
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($user->role_id == 2){
                $completedOrders    = Order::where('user_id', Auth::user()->id)
                                        ->where('admin_status', 'مكتمل')
                                        ->orderby('id','desc')
                                        ->paginate(20);

                $waitingOrders      = Order::where('user_id', Auth::user()->id)
                                        ->where('admin_status', 'قيد الانتظار')
                                        ->orderby('id','desc')
                                        ->paginate(20);

                $onProgressOrders   = Order::where('user_id', Auth::user()->id)
                                        ->where('admin_status', 'جاري')
                                        ->orderby('id','desc')
                                        ->paginate(20);

                $deniedOrders       = Order::where('user_id', Auth::user()->id)
                                        ->where('admin_status', 'مرفوض')
                                        ->orderby('id','desc')
                                        ->paginate(20);

                $acceptOrders       = Order::where('user_id', Auth::user()->id)
                                        ->where('admin_status', 'مقبول')
                                        ->orderby('id','desc')
                                        ->paginate(20);


                //dd($orders);
                return view('main.user.profile.index',
                    compact('user',
                        'completedOrders',
                        'onProgressOrders',
                        'deniedOrders',
                        'acceptOrders',
                        'waitingOrders'
                    ));

        }

        if ($user->role_id == 1){
            $completedOrders    = Order::where('teacher_id', Auth::user()->id)
                ->where('admin_status', 'مكتمل')
                ->orderby('id','desc')
                ->paginate(20);

            $waitingOrders      = Order::where('teacher_id', Auth::user()->id)
                ->where('admin_status', 'قيد الانتظار')
                ->orderby('id','desc')
                ->paginate(20);

            $onProgressOrders   = Order::where('teacher_id', Auth::user()->id)
                ->where('admin_status', 'جاري')
                ->orderby('id','desc')
                ->paginate(20);

            $deniedOrders       = Order::where('teacher_id', Auth::user()->id)
                ->where('admin_status', 'مرفوض')
                ->orderby('id','desc')
                ->paginate(20);

            $acceptOrders       = Order::where('teacher_id', Auth::user()->id)
                ->where('admin_status', 'مقبول')
                ->orderby('id','desc')
                ->paginate(20);


            //dd($orders);
            return view('main.user.profile.index',
                compact('user',
                    'completedOrders',
                    'onProgressOrders',
                    'deniedOrders',
                    'acceptOrders',
                    'waitingOrders'
                ));
        }

        if ($user->rol_id == 3 or $user->role_id == 4){
            return view('main.user.profile.index', compact('user'));
        }


    }

}// End HomeController
