@extends('main.main-layout')

@section('title')
    قائمة المعلمين
@endsection


@section('content')

    <div class="grey-bg pb-100 teacher-area register-area search-teacher">
        <div class="container">
            @if ($errors->any())
                <div class=" py-3" id="errorMsg">
                    <ul class="inline-block py-3 px-3 text-danger rounded-md">
                        @foreach ($errors->all() as $error)
                            <li><i class="far fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="get"
                  action="{{url('search')}}">
                @csrf
                <div class="row">
                    <div class="col-xl-3">
                        <div class="input-text">
                            <select name="stage" id="stages"
                                    class="form-control  @if($errors->has('experience')) is-invalid  @endif "
                                    required>
                                <option data-display="إختيار المرحلة">اختر المرحلة</option>
                                @foreach($stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="col-xl-3">
                        <div class="input-text">
                            <select name="subject" id="subject_id"
                                    class="form-control  @if($errors->has('experience')) is-invalid  @endif "
                                    required>
                                <option data-display="إختيار المادة">اختر المادة</option>
                            </select>
                        </div>
                    </div>

                    <!-- Filter -->
                    <div class="col-xl-3">
                        <div class="input-text">
                            <select name="experience" id="experience"
                                    class="form-control  @if($errors->has('experience')) is-invalid  @endif "
                                    required>
                                <option data-display="إختيارات محددة">إختيارات محددة</option>
                                <option value="toprank">الأعلى تقييم</option>
                                <option value="asc">الأقل سعراً</option>
                                <option value="desc">الأعلى سعراً</option>
                                <option value="male">معلم</option>
                                <option value="female">معلمة</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-xl-3">
                        <div class="lg-btn lg-btn-02 text-center">
                            <button class="c-btn" type="submit">البحث عن معلم<i class="far fa-long-arrow-alt-left"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <!-- Search result number -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="input-text result-back">

                        <p> إجمالي عدد المعلمين المسجلين لدينا:
                            <span> {{$teachersCount}}</span></p>
                    </div>
                </div>
            </div>


            <div class="search-results">
                <ul>
                    @foreach($teachers as $teacher)
                        <li class="teacher-item">
                            <div class="row">
                                <div class="col-xl-2 d-flex  align-items-center justify-content-center">
                                    <img style="height: 150px;" src="{{ asset('uploads') }}/{{$teacher->profile_img}}"
                                         alt="pic" class="img-fluid rounded"/>
                                </div>
                                <div class="col-xl-8 info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{url('teachers/show')}}/{{$teacher->id}}"
                                               class="text-primary">
                                                <p class="mt-3 h5">{{ $teacher->user->first_name .' '. $teacher->user->last_name}}</p>
                                            </a>
                                            <!-- stars -->
                                            <ul class="d-flex mx-auto align-items-center justify-content-center">
                                                <li class=" m-0 text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor"
                                                         style="width: 20px; height: 20px"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </li>
                                                <li class=" m-0 text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor"
                                                         style="width: 20px; height: 20px"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </li>
                                                <li class=" m-0 text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor"
                                                         style="width: 20px; height: 20px"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </li>
                                                <li class=" m-0 text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor"
                                                         style="width: 20px; height: 20px"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </li>
                                                <li class=" m-0 text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor"
                                                         style="width: 20px; height: 20px"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </li>

                                            </ul>
                                            <!-- divider -->
                                            <hr class="my-2">
                                            <div class="pref mt-1"
                                                 style="text-overflow: ellipsis ellipsis; height: 60px; overflow: hidden">
                                                <p>{{$teacher->brief}}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 col-xl-4">
                                            <div class="grade d-flex align-items-center justify-content-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20"
                                                     style="width: 1.2rem; height: 1.2rem"
                                                     class="mx-2"
                                                     fill="currentColor">
                                                    <path
                                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                                </svg>
                                                <span>{{$teacher->qualification}}</span>
                                            </div>
                                        </div>
                                        <div class="col-7 col-xl-4 offset-xl-4">
                                            <div class="exp d-flex align-items-center justify-content-center">
                                                <svg
                                                    style="width: 1.2rem; height: 1.2rem"
                                                    class="mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                                          clip-rule="evenodd"/>
                                                    <path
                                                        d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                                </svg>
                                                <p class="mx-2 mb-0">الخبــــرة: </p>
                                                <p class="mb-0"><span>{{$teacher->experience}}</span> <span> سنوات </span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <p class="mt-3 text-center">متوسط السعر</p>
                                    <div class="text-center">
                                        <p class="my-2 h2">{{$teacher->pphour}}</p>
                                        <span class="text-sm"> ريال لكل ساعة</span>
                                    </div>
                                    <div class="submit d-flex  align-items-center justify-content-center">
                                        <a href="{{url('booking/teacher')}}/{{$teacher->id}}">
                                            <button
                                                class="c-btn  py-2 px-3 text-sm my-3">
                                                احجز الآن
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
                {{$teachers->links()}}

                {{--                <div class="loader">Loading...</div>--}}
            </div>
        </div>
    </div>



@endsection



@section('script')


    <script>

        $(function () {

            // Ajax for subjects
            let stages = $('#stages');
            stages.on('change', function () {
                let stageId = $(this).val();
                if (stageId.length >= 1) {
                    $.ajax({
                        url: "{{ URL::to('search-stage') }}/" + stageId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $('#subject_id').empty();
                            $.each(data, function (key, value) {
                                $('#subject_id').append('<option value="' +
                                    key + '">' + value + '</option>');
                                $('#subject_id').niceSelect('update');
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
