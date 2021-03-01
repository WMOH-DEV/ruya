@extends('main.main-layout')

@section('title')
    بيانات المعلم
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
                        <h1 class=" mt-2" style="font-size: 1.5rem">يرجى تعبأة البيانات ورفع الوثائق المطلوبة بصورة صحيحة</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-form-area">
                        <form action="{{ route('updateInfo') }}"
                              class="subscribe contact-post-form contact-form"
                              method="post"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="row">

                                <!-- experience -->
                                <div class="col-xl-6 experience mb-4">
                                    <div class="input-text">
                                        <select name="experience" id="experience"
                                                class="form-control  @if($errors->has('experience')) is-invalid  @endif "
                                                required>
                                            <option data-display="إختيار سنوات الخبرة">إختيار سنوات الخبرة</option>
                                            <option value="1-3"> من عام إلى ثلاثة</option>
                                            <option value="3-5">من ثلاثة أعوام إلى خمسة</option>
                                            <option value="5-10">من خمسة إلى عشرة</option>
                                            <option value="10+">أكثر من عشرة أعوام</option>
                                        </select>
                                    </div>
                                </div>


                                <!-- Qualification -->
                                <div class="col-xl-6 qualification  mb-4">
                                    <div class="input-text">
                                        <select name="qualification" id="qualification"
                                                class="form-control  @if($errors->has('qualification')) is-invalid  @endif "
                                                required>
                                            <option data-display="أعلى مؤهل حاصل عليه">أعلى مؤهل حاصل عليه</option>
                                            <option value="دبلوم">دبلوم</option>
                                            <option value="بكالوريوس">بكالوريوس</option>
                                            <option value="ليسانس">ليسانس</option>
                                            <option value="ماجستير">ماجستير</option>
                                            <option value="دكتوراه">دكتوراه</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Stages -->
                                <div class="col-xl-6 stages mb-4">
                                    <div class="input-text">
                                        <select name="stages[]" id="stages" multiple="multiple"
                                                class="multi-select @if($errors->has('stages')) is-invalid  @endif"
                                                required

                                        >
                                            @foreach($stages as $stage)
                                                <option value="{{$stage->id}}" class="pr-5">{{$stage->stage_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- subjects -->
                                <div class="col-xl-4 subjects mb-4">
                                    <div class="input-text">
                                        <select name="subject_id" id="subject_id"
                                                class="arrow-css relative form-control  @if($errors->has('subject_id')) is-invalid @endif "
                                                required>
                                            <option data-display =" إختيار مادة رئيسية واحدة">إختيار مادة التدريس الرئيسية</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- PRice-->
                                <div class="col-xl-2 pphour">
                                    <div class="input-text email-text " style="margin-bottom: 10px">
                                        <input class="form-control pl-4"
                                               type="number"
                                               placeholder="ثمن الساعة"
                                               value="{{old('email')}}"
                                               required
                                               name="pphour">
                                        <small class="form-text text-danger pl-4">بالريال السعودي</small>

                                    </div>
                                </div>

                                <!-- Additional subjects -->
                                <div class="col-xl-12 other_subjects">
                                    <div class="input-text email-text">
                                        <input class="form-control"
                                               type="text"
                                               placeholder="مواد تدريس ثانوية"
                                               value="{{old('other_subjects')}}"
                                               name="other_subjects">
                                        <small class="form-text text-danger">جميع المواد الاضافية بينها فاصلة</small>

                                    </div>
                                </div>


                                <!-- Profile IMG-->
                                <label for="profile_img" class="col-xl-4 mb-4">
                                    رفع الصورة الشخصية
                                    <input type="file"
                                           class="dropify"
                                           name="profile_img" data-height="80">
                                </label>

                                <!-- Qualification IMG-->
                                <label for="attachment" class="col-xl-4 mb-4">
                                    صورة المؤهل <span class="text-sm text-danger">(مطلوبة)</span>
                                    <input type="file"
                                           class="dropify"
                                           name="attachment" data-height="80">
                                </label>

                                <!-- Experience IMG-->
                                <label for="attachment2" class="col-xl-4 mb-4">
                                    شهادة خبرة <span class="text-sm text-danger">(إن وُجد)</span>
                                    <input type="file"
                                           class="dropify"
                                           name="attachment2" data-height="80">
                                </label>

                                <!-- Brief -->
                                <div class="col-xl-12 brief">
                                    <div class="input-text email-text">
                                        <textarea name="brief"
                                                  class="@if($errors->has('brief')) is-invalid  @endif "
                                                  cols="30"
                                                  rows="10"
                                                  maxlength="500"
                                                  placeholder="محتوى الرسالة">@if(old('message')) {{old('message')}} @endif  </textarea>
                                        <small class="form-text text-danger"> نبذه مختصرة عن اختصاصك وخبراتك ( ستظر للطلاب على صفحتك الشخصية)</small>

                                    </div>
                                </div>


                                <div class="col-12 col-md-6 offset-md-6">
                                    <div class="lg-btn lg-btn-03 text-center">
                                        <button class="c-btn" type="submit">تقديم طلب إلتحاق<i class="far fa-long-arrow-alt-left"></i></button>
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

    <script>
        if($("#errorMsg")){
            $("#errorMsg").delay(5000).slideUp(1000);
        }

        $(document).ready(function () {
            // Basic
            // $('.dropify').dropify();

            // Arabic
            $('.dropify').dropify({
                messages: {
                    default: '',
                    replace: 'استبدال الصورة',
                    remove: 'حذف الصورة',
                    error: 'خطأ في رفع الصورة'
                }
            });

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
