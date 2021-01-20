@extends('main.layout')

@section('title')
    الملف الشخصي
@endsection

@section('content')

<div class="container mx-auto bg-gray-50">
    <div class="profile-container py-5 lg:py-10 px-5 ">
        <div class="teacher pt-20">

            <div class="teacher-head py-5  flex flex-col md:flex-row items-center justify-around md:justify-between relative space-y-1">
            <!-- Teacher Img -->
                <div class="img rounded-full w-1/3 md:w-1/6 flex justify-center items-center xl:absolute xl:top-10 xl:right-20">
                    <img src="{{ asset('uploads') }}/{{$teacher->profile_img}}" alt="profile" class="h-20 xl:h-48 rounded-2xl ring ring-gray-200">
                </div>
                <div class="img rounded-full w-1/3 md:w-1/6 flex justify-center items-center hidden xl:block ">
                </div>

                <div class="body md:w-4/6">
                    <div class="teacher-name flex justify-center items-center text-xl xl:text-2xl"> <span>{{$teacher->user->first_name}}  <span>{{$teacher->user->last_name}}</span></span></div>
                    <div class="teacher-review flex items-center justify-center xl:mt-2">
                        <i class="icon-star text-yellow-500 mx-0"></i>
                        <i class="icon-star text-yellow-500 mx-0"></i>
                        <i class="icon-star text-yellow-500 mx-0"></i>
                        <i class="icon-star text-yellow-500 mx-0"></i>
                    </div>
                    <div class="teacher-info px-5 mt-5 flex flex-wrap justify-center items-center txt-gray-400">
                        <div class="country w-1/2 xl:w-auto">
                            <i class="icon-location mx-1"></i>
                            <span>{{$teacher->user->country->country_name}}</span>
                        </div>
                        <div class="qualification flex items-center w-1/2 xl:w-auto xl:mr-5">
                            <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p>{{$teacher->qualification}}</p>
                        </div>
                        <div class="pphour w-1/2 xl:w-auto xl:mr-5">
                            <i class="icon-money mx-1"></i>
                            <span class=" text-xl">{{$teacher->pphour}}</span>
                            <span>ر.س/ساعة</span>
                        </div>
                        <div class="experience w-1/2 xl:w-auto xl:mr-5">
                            <i class="icon-briefcase mx-1"></i>
                            <span>خبرة</span>
                            <span>{{$teacher->experience}}</span><span class="mx-1">سنوات</span>
                        </div>
                    </div>
                </div>

                <div class="order pt-5 md:w-1/6 flex justify-center items-center xl:absolute xl:top-2/3 xl:left-10">
                    @if(Auth::check() AND Auth::user()->role_id !== 1)
                    <a href="{{url('booking/teacher')}}/{{$teacher->id}}" >
                        <button class="sbg-color text-white focus:outline-none rounded-full py-2 px-3 xl:px-5 xl:py-3 xl:text-xl hover:bg-yellow-700">تواصل مع المُعلم</button>
                    </a>
                        @endif
                </div>
                <!-- Empty space -->
                <div class="order pt-5 md:w-1/6 flex justify-center items-center hidden xl:block">
                </div>
            </div>
            <div class="teacher-body py-5 border rounded-t-2xl bg-white px-2 xl:px-20">
                <div class="px-2 md:flex md:flex-wrap lg:px-20">
                   <div class="about border-b border-gray-100 xl:mb-5 pb-5 md:w-full md:text-center">
                       <p class="mb-5">
                           <span class="border-b-2 border-yellow-600 md:hidden">عن</span>
                           <span class="md:hidden">المُعلم</span>
                           <span class="hidden md:inline-block md:border-b-2 md:border-yellow-600">عن المُعلم</span>
                       </p>
                       <p class="text-gray-500">{{$teacher->brief}}</p>
                   </div>
                   <div class="experience mt-5 border-b border-gray-100 pb-5 md:w-1/2 xl:pr-32">
                       <p class="mb-5">
                           <span class="border-b-2 border-yellow-600">الخبرة</span>
                           <span>الوظيفية</span>
                       </p>
                       <p class="text-gray-500">يعمل في مجال التعليم لمدة تتراوح من <span>{{$teacher->experience}}</span> سنوات</p>
                   </div>
                   <div class="other_sub mt-5 border-b border-gray-100 pb-5 md:w-1/2 xl:pr-20">
                       <p class="mb-5">
                           <span class="border-b-2 border-yellow-600">المواد</span>
                           <span>التعليمية</span>
                       </p>
                       <p class="text-gray-500">
                           <span>{{$teacher->subject->subject_name}}</span>
                           <span class="mr-2">{{$teacher->other_subjects}}</span>
                       </p>
                   </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
