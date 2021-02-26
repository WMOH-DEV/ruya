@extends('main.layout')

@section('title')
    بيانات المعلم
@endsection


@section('css')

    <link rel="stylesheet" href="{{asset('main')}}/css/dropify.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/select2.min.css">

@endsection

@section('content')
    <div class="updateinfo-container h-screen flex item-center">



        <div class=" lg:w-5/6 xl:w-4/6  flex flex-col items-center justify-center w-full">
            <div class="register lg:w-2/3 p-5 xl:px-0 h-2/3 mt-5  w-full">
                <h2 class="text-center text-gray-400 text-xl md:text-2xl mb-2">إستكمال بيانات المعلم</h2>
                <hr class=" border-gray-100">

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

                <!-- form register -->
                <form action="{{ route('updateInfo') }}" class="grid grid-cols-6 gap-x-4 gap-y-2 place-content-center "
                      method="post" enctype="multipart/form-data">
                @csrf

                <!-- experience input -->
                    <label for="experience" class="col-span-6 mt-2 md:mt-5 md:col-span-3 relative">
                        عدد سنوات الخبرة
                        <select name="experience" id="experience"
                                class="text-gray-400 focus:text-gray-600 focus:outline-none mt-1 pr-5 shadow-sm  w-full p-2 rounded-md  @if($errors->has('experience')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                                required>

                            <option value disabled hidden class="pr-5">إختيار سنوات الخبرة</option>
                            <option value="1-3" class="pr-5"> من عام إلى ثلاثة</option>
                            <option value="3-5" class="pr-5">من ثلاثة أعوام إلى خمسة</option>
                            <option value="5-10" class="pr-5">من خمسة إلى عشرة</option>
                            <option value="10+" class="pr-5">أكثر من عشرة أعوام</option>
                        </select>

                        <i class="icon-down-circle absolute bottom-2 left-2 pointer-events-none text-gray-300"></i>
                    </label>

                    <!-- Qualification input -->
                    <label for="qualification" class="col-span-6 mt-2 md:mt-5 md:col-span-3 relative">
                        المؤهل الحاصل عليها
                        <select name="qualification" id="qualification"
                                class=" focus:outline-none text-gray-400 focus:text-gray-600 mt-1 pr-5 shadow-sm  w-full p-2 rounded-md  @if($errors->has('qualification')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                                required>
                            <option disabled selected hidden class="pr-5">أعلى مؤهل حاصل عليه</option>
                            <option value="دبلوم" class="pr-5">دبلوم</option>
                            <option value="بكالوريوس" class="pr-5">بكالوريوس</option>
                            <option value="ليسانس" class="pr-5">ليسانس</option>
                            <option value="ماجستير" class="pr-5">ماجستير</option>
                            <option value="دكتوراه" class="pr-5">دكتوراه</option>
                        </select>
                        <i class="icon-down-circle absolute bottom-2 left-2 pointer-events-none text-gray-300"></i>
                    </label>

                    <!-- Stages input -->
                    <label for="stages" class="col-span-6 mt-2 relative md:col-span-3">
                        المراحل التي تدرسها
                        <select name="stages[]" id="stages" multiple="multiple"
                                class="multi-select relative focus:outline-none mt-1 pr-5 shadow-sm  w-full p-2 rounded-md  @if($errors->has('stages')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                                required>
                            @foreach($stages as $stage)
                            <option value="{{$stage->id}}" class="pr-5">{{$stage->stage_name}}</option>
                            @endforeach
                        </select>
                        <i class="icon-down-circle absolute bottom-2 left-2 pointer-events-none text-gray-300"></i>

                    </label>

                    <!-- subject input -->
                    <label for="subject_id" class="col-span-6 mt-2 md:col-span-2 relative">
                        مادة التدريس الرئيسية
                        <select name="subject_id" id="subject_id"
                                class="arrow-css relative text-gray-400 focus:text-gray-600  focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('subject_id')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                                required>
                            <option disabled selected hidden class="pr-5">إختيار مادة رئيسية واحدة</option>


                        </select>
                        <i class="icon-down-circle absolute bottom-2 left-2 pointer-events-none text-gray-300"></i>
                    </label>

                    <!-- Pay Per hour-->
                    <label for="pphour" class="col-span-6 mt-2  md:col-span-1">
                        <span class="text-lg md:text-sm">الثمن لكل ساعة</span>
                        <input type="number" name="pphour" id="pphour"
                               placeholder="0"
                               class="arrow-css relative focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('pphour')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none">
                    </label>

                    <!-- Additional subjects -->
                    <label for="other_subjects" class="col-span-6 mt-2 md:col-span-6">
                        مواد تدريس ثانوية
                        <input type="text" name="other_subjects" autocomplete="off" id="other_subjects"
                               placeholder="جميع المواد الاضافية بينها فاصلة"
                               class="arrow-css relative focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('other_subjects')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none">
                    </label>

                    <!-- Brief -->
                    <label for="brief" class="col-span-6 mt-2 md:col-span-6">
                        نبذه مختصرة عن اختصاصك وخبراتك <span class="text-sm text-red-500"> (ستظهر للطلاب)</span>
                        <textarea name="brief" id="brief"
                                  class="relative resize-none text-gray-500 text-sm focus:outline-none mt-1 shadow-sm  w-full p-2 rounded-md  @if($errors->has('brief')) border-red-700 border-2 @else border-gray-300 border  @endif  appearance-none"
                                  maxlength="300" ></textarea>
                    </label>

                    <!-- Profile IMG-->
                    <label for="profile_img" class="col-span-6 mt-2 md:col-span-2">
                        الصورة الشخصية
                        <input type="file"
                               class="dropify focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border text-black"
                               name="profile_img" data-height="30">
                    </label>

                    <!-- Qualification IMG-->
                    <label for="attachment" class="col-span-6 mt-2 md:col-span-2">
                        صورة المؤهل <span class="text-sm text-red-500">(مطلوبة)</span>
                        <input type="file"
                               class="dropify focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border text-black"
                               name="attachment" required data-height="30">
                    </label>

                    <!-- Experience IMG-->
                    <label for="attachment2" class="col-span-6 mt-2 md:col-span-2">
                        شهادة خبرة <span class="text-sm text-red-500">(إن وُجد)</span>
                        <input type="file"
                               class="dropify focus:outline-none shadow-sm appearance-none w-full p-2 rounded-md border-gray-300 border text-black"
                               name="attachment2" data-height="30">
                    </label>


                    <!-- Submit button -->
                    <button
                        class="col-span-6 bg-yellow-600 text-white mt-3 hover:bg-yellow-700 p-2 rounded-md  border-gray-300 border">
                        تحديث البيانات
                    </button>

                </form>


            </div>
        </div>

    </div>


@endsection

@section('script')
{{--    <script src="{{asset('main')}}/js/jquery-3.5.1.min.js"></script>--}}
<script
    src="{{asset('main')}}/js/jquery-3.5.1.js"></script>
    <script src="{{asset('main')}}/js/dropify.js"></script>
    <script src="{{asset('main')}}/js/select2.min.js"></script>

    <script>

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

            // select 2
            $(document).ready(function () {
                $('.multi-select').select2({
                    placeholder: "متاح إختيار متعدد",
                    allowClear: false,
                    width: '100%'
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
