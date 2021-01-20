<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Teacher;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        return view('home', compact('stages'));
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
}
