<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\lazyMsg;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{


    public function index()
    {
        $students = User::where('role_id','2')->orderBy('id', 'desc')->paginate(20);

        return view('cp.students.index', compact('students'));
    }

    public function detailsIndex(User $student)
    {
        $orders = Order::where('user_id', "$student->id")->orderby('id','desc')->paginate(20);
        //dd($orders);
        return view('cp.students.details.index', compact('student','orders'));
    }

    public function inactive()
    {

        $students = User::where('role_id','2')->whereRaw('`last_login` < DATE_SUB(CURDATE(), INTERVAL 3 DAY)')->paginate(5);
       //dd($students);
        return view('cp.students.inactive', compact('students'));
    }


    public function suspended()
    {

        $students = User::onlyTrashed()->where('role_id','2')->orderBy('id', 'desc')->paginate(5);
        //dd($students);
        return view('cp.students.suspended', compact('students'));
    }

    public function destroy(Request $request, ToastrFactory $factory)
    {
        $student = User::findorFail("$request->student_id");
       // dd($student);
        $student->delete();

        $factory->addSuccess('تم إيقاف الطالب');

        return redirect()->back();
    }

    public function restore(Request $request, ToastrFactory $factory)
    {
        $student = User::withTrashed()->find($request->student_id);
        // dd($student);
        $student->restore();

        $factory->addSuccess('تم إستعادة الطالب');

        return redirect()->back();
    }

    use Notifiable;

    /**
     * Send Reminder to the Students
     * @param Request $request
     * @param ToastrFactory $factory
     * @return RedirectResponse
     */
    public function inactiveMsg(Request $request, ToastrFactory $factory)
    {

        $user = $request->student_id;
        $inactiveStudent = User::findOrfail("$user");
        $studentName = $inactiveStudent->fullName();
       Notification::send($inactiveStudent, new lazyMsg($studentName));

        $factory->addInfo('تم إرسال تذكير للطالب');

        return back();

    }
}
