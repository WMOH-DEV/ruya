@extends('main.layout')

@section('title')
نتيجة البحث
@endsection


@section('content')


<div class="teacher-container px-5  md:px-14 pt-20 min-h-screen flex flex-col justify-between">



    <div class="page-body">
        @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <!-- content -->
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4 mx-auto md:px-5 mt-5 " method="get" action="{{route('search')}}">
            <label>
                <select style="background-color:#fff;" id="stages" class="form-control w-full appearance-none border-gray-200 rounded border shadow-sm p-3 my-1 md:my-3" dir="rtl" name="stage">
                    <option style="color:rgb(59 59 59)">اختر المرحلة ...</option>
                    @foreach($stages as $stage)
                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                    @endforeach
                </select>
            </label>

            <label>
                <select style="background-color:#fff;" id="subject_id" class="form-control w-full appearance-none border-gray-200 rounded border shadow-sm p-3 my-3" dir="rtl" name="subject">
                    <option style="color:rgb(59 59 59)">اختر المادة ...</option>

                </select>
            </label>

            <label>
                <select style="background-color:#fff;" id="level-select" class="form-control w-full appearance-none border-gray-200 rounded border shadow-sm p-3 my-3" dir="rtl" name="type">
                    <option style="color:rgb(59 59 59)" disabled selected>إختيارات محددة ...</option>
                    <option value="toprank">الأعلى تقييم</option>
                    <option value="asc">الأقل سعراً</option>
                    <option value="desc">الأعلى سعراً</option>
                    <option value="male">معلم</option>
                    <option value="female">معلمة</option>
                </select>
            </label>

            <div class="submit">
                <button class=" border-gray-200 border rounded shadow-sm p-3  w-full bg-blue-400 text-white my-3 focus:outline-none hover:bg-blue-600" type="submit">البحث عن معلم
                </button>
            </div>

        </form>

        <div class="results-body flex flex-col justify-between">

            <!-- Search result number -->
            <div class="search-number px-5 my-2">
                <p class="border-gray-200 bg-white shadow-sm rounded p-3"> إجمالي عدد المعلمين المطابقين للبحث:
                    <span> {{$teachersCount}}</span>
                </p>
            </div>

            <!-- Search results  -->
            <ul class="search-result md:px-5 mt-5 ">

                @foreach($teachers as $teacher)
                <li class="teacher mt-10 px-5 bg-white shadow-md grid grid-cols-5 gap-4 py-8">
                    <div class="logo bg-white col-span-1 col-start-3 lg:col-start-1 row-span-2 md:row-span-1 flex items-center justify-center">
                        <img src="{{ asset('uploads') }}/{{$teacher->profile_img}}" alt="pic" class="h-20 lg:h-32">
                    </div>
                    <div class="info lg:col-span-3 col-span-5 bg-white text-center">
                        <a href="{{url('teachers/show')}}/{{$teacher->teacher_id}}" class="hover:text-blue-800 text-blue-500">
                            <h2 class="text-lg font-bold">{{ $teacher->first_name .' '. $teacher->last_name}}</h2>
                        </a>
                        <!-- stars -->
                        <ul class="flex mx-auto items-center justify-center">
                            <li class=" m-0 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </li>
                            <li class=" m-0 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </li>
                            <li class=" m-0 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </li>
                            <li class=" m-0 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </li>
                            <li class=" m-0 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </li>
                        </ul>

                        <!-- divider -->
                        <hr class="my-2">

                        <div class="pref mt-3">
                            <p class="text-gray-600"> {{$teacher->brief}}</p>
                            <div class="grade_exp flex flex-col md:flex-row pt-5 md:mt-3 items-start md:items-center md:justify-around lg:justify-between">
                                <!-- Teacher Graduation -->
                                <div class="grade flex items-center">
                                    <svg class="w-5 h-5 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                    </svg>
                                    <p>{{$teacher->qualification}}</p>
                                </div>

                                <!-- Teacher Subjects -->
                                <div class="grade flex items-center">
                                    <i class="icon-book mx-2"></i>
                                    <p>{{$teacher->subject_name}}</p>
                                    @if($teacher->other_subjects)
                                    <p class="mx-2">{{$teacher->other_subjects}}</p>
                                    @endif
                                </div>
                                <!-- Teacher Experience -->
                                <div class="exp flex">
                                    <svg class="w-5 h-5 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>

                                    <p class="mx-2">الخبــــرة: </p>
                                    <p><span>{{$teacher->experience}}</span> <span> سنوات </span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rate lg:col-span-1 col-span-5 bg-white flex-col items-center justify-between flex">
                        <p class="mt-3 text-center">متوسط السعر</p>
                        <div class="text-center">
                            <p class="text-4xl my-2 lg:my-0">{{$teacher->pphour}}</p>
                            <span class="text-sm md:text-base lg:text-lg"> ريال لكل ساعة</span>
                        </div>
                        <div class="submit">
                            <a href="{{url('booking/teacher')}}/{{$teacher->teacher_id}}">

                            <button class=" border-gray-200 border rounded shadow-sm py-2 px-3 text-sm md:text-base w-full bg-blue-500 text-white my-3 focus:outline-none hover:bg-blue-600">
                                احجز الآن
                            </button>
                            </a>
                        </div>
                    </div>
                </li>

                @endforeach


            </ul>

            {{$teachers->links()}}
        </div>
    </div>

    <footer class="mt-10 p-5">
        <p>جميع الحقوق محفوظة</p>
    </footer>


</div>

@endsection





@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(function() {
        $(document).scroll(function() {
            let $nav = $(".navbar-top");
            $nav.removeClass('lg:shadow-none lg:bg-transparent', $(this).scrollTop() > 0);
            $nav.toggleClass('bg-white shadow-sm', $(this).scrollTop() > 0);
        });


        // Ajax for subjects
        let stages = $('#stages');
        stages.on('change', function() {
            let stageId = $(this).val();
            if (stageId.length >= 1) {
                $.ajax({
                    url: "{{ URL::to('search-stage') }}/" + stageId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#subject_id').empty();
                        $.each(data, function(key, value) {
                            $('#subject_id').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('#subject_id').empty();
            }
        });


    });
</script>

@endsection
