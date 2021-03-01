<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\msgModerator;

class TeacherController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrfail($id);
        return view('main.profile', compact('teacher'));

    }


    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param ToastrFactory $factory
     * @return RedirectResponse
     */

    public function destroy(Request $request, ToastrFactory $factory)
    {

        $teacher = Teacher::where('id',"$request->teacher_id")->first();
        //dd($user);

        $teacher->delete();

        $factory->addSuccess('تم إيقاف المُعلم');

        return redirect()->back();
    }

    public function delete(Request $request, ToastrFactory $factory)
    {
        // Get Main ID
        $teacherMainID = Teacher::withTrashed()->find("$request->teacher_id")->user_id;
        // Get main User
        $teacherMainUser = User::find("$teacherMainID");
        //Get Teacher account
        $teacher = Teacher::withTrashed()->where('id',"$request->teacher_id")->first();
        // Delete both Of them
        $teacher->forceDelete();
        $teacherMainUser->forceDelete();

        $factory->addSuccess('تم حذف المُعلم');

        return redirect()->back();
    }


    public function restore(Request $request, ToastrFactory $factory)
    {
        $teacher = Teacher::withTrashed()->find($request->teacher_id);
        // dd($student);
        $teacher->restore();

        $factory->addSuccess('تم إستعادة المُعلم');

        return redirect()->back();
    }


    public function suspended()
    {
        $teachers = Teacher::onlyTrashed()->paginate(5);

        //dd($teachers);
        return view('cp.teachers.suspended', compact('teachers'));
    }


    public function accept(Request $request, ToastrFactory $factory)
    {
        $teacher = Teacher::where('id',"$request->teacher_id")->first();
        $teacher->isAccepted = 1 ;
        $teacher->save();

        $factory->addInfo('تمت الموافقة على المُعلم');
        return back();
    }

    /**
     * Show teacher List at Admincp
     * @return Application|Factory|View
     */
    public function index()
    {
        $teachers = Teacher::whereHas('user', function (Builder $query){
                    return $query->where('role_id',1);
        })->orderBy('id', 'desc')->paginate(10);

       // dd($teachers);
        return view('cp.teachers.index', compact('teachers'));
    }

    /**
     * Show pending teacher at Admincp
     * @return Application|Factory|View
     */
    public function indexPending()
    {
        $teachers = Teacher::where('isAccepted',0)
            ->orderBy('id', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // dd($teachers);
        return view('cp.teachers.pending', compact('teachers'));
    }

    public function getUpdateView()
    {
        $stages = Stage::all();
        $subjects = Subject::all();
        return view('auth.update-info', compact('stages','subjects'));
    }

    /**
     * Ajax request subject
     * @param $array
     * @param Request $request
     * @return false|string
     */
    public function getSubjects($array, Request $request)
    {
        if ($request->ajax()){
            $array = array_map('intval', explode(',', $array));
            $subjects = Subject::select('subject_name', 'id')->whereIn('stage_id',$array)->pluck("subject_name","id");
            return json_encode($subjects);
        }
        return redirect()->back();
    }

    /**
     * Update info Form for Teachers
     * @param Request $request
     * @param ToastrFactory $factory
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function updateInfo(Request $request, ToastrFactory $factory)
    {

       // dd($request->all());
        // validation Teacher Information
        $request->validate([
            'experience'=> ['required','string','regex:/(1-3|3-5|5-(10)|(10)\+)$/'],
            'qualification'=> ['regex:/^(دبلوم|بكالوريوس|ليسانس|ماجستير|دكتوراه)$/'],
            'profile_img'=>['nullable','max:512', 'mimes:jpg,png,jpeg'],
            'subject_id'=>['required', 'exists:subjects,id'],
            'attachment'=>['required','max:512', 'mimes:jpg,png,jpeg,pdf'],
            'attachment2'=>['nullable','max:512', 'mimes:jpg,png,jpeg,pdf'],
            'pphour'=>['regex:/^[1-9]*[1-9][0-9]*$/'],
            'brief'=>['required', 'max:300', 'string' ],
            'other_subjects'=>['max:200', 'nullable'],
            'stages' => ['required', 'array'],
            'stages.*' => ['required', 'exists:stages,id'],
        ]);

        $attach = Storage::putFile('teachers/'.Auth::user()->id , $request->file('attachment'));

        // Insert Teacher Infos
        $createdTeacher = Teacher::create([
            'first_name'=> Auth::user()->first_name,
            'experience'=> $request->experience,
            'qualification'=>  $request->qualification,
            'subject_id'=> $request->subject_id,
            'pphour'=> $request->pphour,
            'brief'=> $request->brief,
            'other_subjects'=> $request->other_subjects,
            'user_id' => Auth::user()->id,
            'attachment' =>  $attach
        ]);

        // Insert stages [multi relation]
        $createdTeacher->stages()->sync($request->stages);

        // check if the user uploaded profile img
        if ($request->hasFile('profile_img')){
            $profileImg = Storage::putFile('teachers/'.Auth::user()->id , $request->file('profile_img'));
            $createdTeacher->profile_img = $profileImg;
            $createdTeacher->save();
        }

        // check if the user uploaded second attach
        if ($request->hasFile('attachment2')){
            $attach2= Storage::putFile('teachers/'.Auth::user()->id , $request->file('attachment2'));
            $createdTeacher->attachment2 = $attach2;
            $createdTeacher->save();
        }


        /**
         * Change isUpdated to true
         * So teacher now can bypass
         * Middleware rule
         */

        $thisTeacher = User::findOrFail(Auth::user()->id);
        $thisTeacher->isUpdated = 1;
        $thisTeacher->role_id = 1;
        $thisTeacher->save();

       // $request->session()->flash('updated', 'تم تحديث البيانات بنجاح');

        $factory->addSuccess('تم تحديث البيانات بنجاح، سيتم مراسلتكم قريباً');

        Notification::route('mail', 'Ezzanym26@gmail.com')->notify(new msgModerator($thisTeacher));

        return redirect(url('/'));

    }


    /**
     * For Teacher List View Page
     * @return Application|Factory|View
     */
    public function getList()
    {
       $stages = Stage::all();
       $teacherQuery = Teacher::where('isAccepted', '1');
       //dd($teacherQuery);
       $teachersCount = $teacherQuery->get()->count();
       $teachers= $teacherQuery->paginate(5);
       return view('main.teachers', compact('teachers', 'teachersCount','stages' ));
    }


    /**
     * search for teacher with multi Filters
     * @param Request $request
     * @param ToastrFactory $factory
     * @return Application|Factory|View
     */
    public function results(Request $request, ToastrFactory $factory)
    {
        $selectedSubject = $request->subject;
        $selectedType = $request->type;
        $stages = Stage::all();

        //dd($request->stage);

        // Simple validation
        if (!is_numeric($selectedSubject) || !is_numeric($request->stage)){
            $teachersCount = 0;
            $teachers = [];
            return view('main.search', compact('stages','teachersCount', 'teachers'));
        }

        // Once Selected type is not required so check..
        if ($selectedType){
            // FILTER = Male | female
            if ($selectedType === 'male' || $selectedType === 'female'){
                $teacherQuery = User::join('teachers', 'users.id', '=', 'teachers.user_id')
                    ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
                    ->where('gender', "$selectedType")
                    ->where('subject_id', "$selectedSubject")
                    ->where('teachers.isAccepted', '1')
                    ->select(['users.*','teachers.id as teacher_id', 'teachers.*','subjects.*']);


                $teachersCount = $teacherQuery->get()->count();
                $teachers = $teacherQuery->paginate(5);
                if ($teachersCount == 0){
                    $factory->addError('لا يتوفر مُعلم بهذه الاختيارات حالياً');
                }
                return view('main.search', compact('stages', 'teachers', 'teachersCount' ));
            }

            // FILTER = Price ASC | DESC
            if ($selectedType === 'asc' || $selectedType === 'desc'){
                $teachersQuery = User::join('teachers', 'users.id', '=', 'teachers.user_id')
                    ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
                    ->where('subject_id', "$selectedSubject")
                    ->where('teachers.isAccepted', '1')
                    ->select(['users.*','teachers.id as teacher_id', 'teachers.*','subjects.*']);


                $teachersCount = $teachersQuery->count();
                $teachers = $teachersQuery->orderBy('pphour', "$selectedType")->paginate(5);

                if ($teachersCount == 0){
                    $factory->addError('لا يوجد معلمين لهذه المادة حالياً');
                }
                return view('main.search', compact('stages', 'teachers', 'teachersCount' ));
            }
        }


        // If the search form without Filters
        $tQuery = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->join('subjects', 'teachers.subject_id', '=', 'subjects.id')
            ->where('subject_id', "$selectedSubject")
            ->where('teachers.isAccepted', '1')
            ->select(['users.*','teachers.id as teacher_id', 'teachers.*','subjects.*']);


        $teachers = $tQuery->paginate(5);
        $teachersCount = $tQuery->get()->count();

       // dd($request->subject);
        if ($teachersCount == 0 && $selectedSubject && is_numeric($request->subject)){
            return view('main.not-found');
        }
        return view('main.search', compact('stages', 'teachersCount','teachers' ));
    }


}
