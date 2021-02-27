@extends('main.main-layout')

@section('title')
    طلب مادة رئيسية
@endsection


@section('css')

    <link rel="stylesheet" href="{{asset('main')}}/css/dropify.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/select2.min.css">

@endsection

@section('content')



    <!-- contact-area-start -->
    <div class="contact-area grey-bg pb-100 teacher-area register-area">
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center mb-60">
                        <span><i class="fal fa-ellipsis-h"></i>اهلا بك في منصة رؤية اكادمي <i class="fal fa-ellipsis-h"></i></span>
                        <h1 class=" mt-2" style="font-size: 1.5rem">يرجى تعبأة بيانات الطلب لإرسالها للإدارة</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-form-area">
                        <form action="{{ route('create-order') }}"
                              class="subscribe request-post-form contact-form"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="row">
                                <label for="teacher__id">
                                    <input type="hidden" value="{{$teacher->id}}" name="teacher__id">
                                </label>

                                <label for="student__id">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="student__id">
                                </label>
                                <!-- experience -->
                                <div class="col-xl-4 stage__id mb-4">
                                    <div class="input-text">
                                        <label for="subject">المرحلة المطلوبة</label>
                                        <select name="stage__id" id="stage__id"
                                                class="form-control  @if($errors->has('stage__id')) is-invalid  @endif "
                                                required>
                                            <option data-display="المرحلة التعليمية">المرحلة التعليمية</option>
                                            @foreach($teacher->stages as $stage)
                                                <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- Qualification -->
                                <div class="col-xl-4 subject  mb-4">
                                    <div class="input-text">
                                        <label for="subject">مادة الأستاذ الرئيسية</label>
                                        <input type="text" disabled class="form-control" value="{{$teacher->subject->subject_name}}" name="subject">
                                        <input type="text" hidden class="form-control" value="{{$teacher->subject->subject_name}}" name="subject">
                                    </div>
                                </div>


                                <!-- PRice-->
                                <div class="col-xl-4 hours">
                                    <div class="input-text email-text " style="margin-bottom: 10px">
                                        <label for="hours">
                                            عدد الساعات المطلوب حجزها
                                        </label>
                                        <input class="form-control pl-4"
                                               type="number"
                                               placeholder="0"
                                               value="{{old('hours')}}"
                                               required
                                               name="hours">
                                    </div>
                                </div>

                                <!-- date-->
                                <div class="col-xl-6 date mb-20">
                                    <div class="input-text email-text " style="margin-bottom: 10px">
                                        <label for="date">
                                            تاريخ البدء المطلوب
                                        </label>
                                        <input class="form-control pl-4"
                                               type="date"
                                               value="{{old('start_date')}}"
                                               required
                                               name="start_date">
                                        <small class="form-text text-danger pl-4">التاريخ الذي تود بدء الدراسة به</small>
                                    </div>
                                </div>

                                <!-- way-->
                                <div class="col-xl-6 contact_way">
                                    <div class="input-text email-text " style="margin-bottom: 10px">
                                        <label for="contact_way">
                                            وسيلة التواصل المفضلة
                                        </label>
                                        <select name="contact_way" id="contact_way"
                                                class="form-control  @if($errors->has('contact_way')) is-invalid  @endif "
                                                required>
                                            <option data-display="وسيلة الاتصال بكم">وسيلة الاتصال بكم</option>
                                            <option value="email">البريد الإلكتروني</option>
                                            <option value="whatsapp">الواتسآب</option>
                                            <option value="phone">الهاتف</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12 notes">
                                    <div class="input-text email-text " style="margin-bottom: 10px">
                                        <label for="notes">
                                            ملاحظات أو اختيار مادة أخرى من المواد الثانوية للمعُلم
                                        </label>
                                        <textarea name="notes" id="notes" cols="30" maxlength="200">{{old('notes')}}</textarea>
                                        <small class="form-text text-danger pl-4">تستطيع كتابة أي اضافة أو ملحوظة، مثال: الحجز بالشهر بدلاً من الساعة</small>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                                    <div class="mx-auto">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="lg-btn lg-btn-03 text-center">
                                        <button class="c-btn" type="submit">تقديم الطلب<i class="far fa-long-arrow-alt-left"></i></button>
                                    </div>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area-end -->






@endsection





@section('script')
    <script src="{{asset('main')}}/js/dropify.js"></script>
    <script src="{{asset('main')}}/js/select2.min.js"></script>
    {!! NoCaptcha::renderJs('ar') !!}
    <script>


        $(document).ready(function () {

            if($("#errorMsg")){
                $("#errorMsg").delay(5000).slideUp(1000);
            }

            $('.multi-select').niceSelect('destroy');
            // select 2
            $(document).ready(function () {
                $('.multi-select').select2({
                    placeholder: "متاح إختيار متعدد",
                    allowClear: false,
                    width: '100%',
                    dir: "rtl",
                    border: 'none',
                });
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
                                $('#subject_id').niceSelect('update')
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
