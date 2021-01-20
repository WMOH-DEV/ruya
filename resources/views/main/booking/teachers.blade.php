@extends('main.layout')

@section('title')
    طلب مادة دراسية
@endsection



@section('content')

    <div class="container mx-auto bg-gray-50">
        <div class="profile-container py-5 lg:py-10 px-5 ">
            <div class="teacher pt-20 min-h-screen xl:w-3/4  mx-auto">

                <div
                    class="teacher-head py-5  flex flex-col md:flex-row items-center justify-around md:justify-between space-y-1">
                    <!-- Teacher Img -->
                    <h2 class="text-center w-full text-2xl">تقديم طلب جديد</h2>

                </div>
                <div class="teacher-body py-5 border rounded-2xl bg-white px-2 ">

                    @if($errors->any())
                        <div class="p-5 bg-red-200 rounded-md text-gray-700 mx-5">
                            <ul class="list-disc pr-10">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </ul>
                        </div>
                    @endif

                    <form class="mx-auto px-5 md:mt-5 " method="post" action="{{route('create-order')}}">
                        @csrf

                        <label for="teacher__id">
                            <input type="hidden" value="{{$teacher->id}}" name="teacher__id">
                        </label>

                        <label for="student__id">
                            <input type="hidden" value="{{Auth::user()->id}}" name="student__id">
                        </label>

                        <div class="flex flex-wrap">
                        <label for="stage__id" class="w-full lg:w-1/3 pl-2">
                            المرحلة التعليمية
                            <select name="stage__id" class="select2-right appearance-none border w-full rounded border-gray-200 py-2 px-3">

                                @foreach($teacher->stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                                @endforeach

                            </select>
                        </label>

                            <label for="subject" class="w-full lg:w-1/3 pr-0 pl-0 lg:px-2 mt-5 lg:mt-0">
                                المادة
                                <input type="text" disabled class="py-2  w-full px-3 border border-gray-300 rounded" value="{{$teacher->subject->subject_name}}" name="subject">
                                <input type="text" hidden class="py-2  w-full px-3 border border-gray-300 rounded" value="{{$teacher->subject->subject_name}}" name="subject">
                            </label>


                            <label for="hours" class="w-full lg:w-1/3 pr-0 lg:pr-2 mt-5 lg:mt-0">
                                عدد الساعات المطلوب حجزها
                                <input type="number" class="py-2 w-full px-3 border border-gray-300 rounded" name="hours" placeholder="0">
                            </label>

                            <label for="start_date" class="w-full lg:w-1/2 mt-5 xl:mt-8 pl-2">
                                تاريخ البدء المطلوب
                                <input type="date" class="py-2  w-full px-3 border border-gray-300 rounded" name="start_date">
                            </label>


                            <label for="contact_way" class="w-full lg:w-1/2  mt-5 xl:mt-8 pr-2">
                                وسيلة التواصل المفضلة
                                <select name="contact_way" class="select2-right appearance-none border w-full rounded border-gray-200 py-2 px-3">

                                        <option value="email">البريد الإلكتروني</option>
                                        <option value="whatsapp">الواتسآب</option>
                                        <option value="phone">الهاتف</option>

                                </select>
                            </label>


                            <label for="notes" class="w-full mt-5 xl:mt-8 ">
                                ملاحظات أو اختيار مادة أخرى من المواد الثانوية للمعُلم
                                <textarea maxlength="200" class="py-2  w-full px-3 border border-gray-300 rounded" name="notes"></textarea>
                                <span class="text-xs text-red-300">* مسموح بحروف فقط</span>
                            </label>

                        <button type="submit" class="w-full py-2 mt-5 px-5 sbg-color text-white hover:bg-yellow-600 row-full rounded">إرسال الطلب</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection

{{--@section('content')--}}
{{--    <div class="teacher-container px-5  md:px-10  md:px-14 pt-16 lg:pt-32 min-h-screen">--}}

{{--    @if($errors->any())--}}
{{--        {!! implode('', $errors->all('<div>:message</div>')) !!}--}}
{{--    @endif--}}
{{--    <!-- content -->--}}
{{--        <form class="mx-auto px-5 md:mt-5 " method="post" action="{{url('store')}}">--}}
{{--            @csrf--}}

{{--            <label for="teacher__id">--}}
{{--                <input type="hidden" value="{{$teacherID}}" name="teacher__id">--}}
{{--            </label>--}}

{{--            <label for="student__id">--}}
{{--                <input type="hidden" value="{{Auth::user()->id}}" name="student__id">--}}
{{--            </label>--}}

{{--            <label for="teacher__id">--}}
{{--                <input type="hidden" value="{{$teacherID}}" name="teacher__id">--}}
{{--            </label>--}}

{{--        </form>--}}


{{--        <footer class="mt-10 p-5">--}}
{{--            <p>جميع الحقوق محفوظة</p>--}}
{{--        </footer>--}}
{{--    </div>--}}

{{--@endsection--}}



@section('script')


    <script>

        $(function () {
            $(document).scroll(function () {
                let $nav = $(".navbar-top");
                $nav.removeClass('lg:shadow-none lg:bg-transparent', $(this).scrollTop() > 0);
                $nav.toggleClass('bg-white shadow-sm', $(this).scrollTop() > 0);
            });


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
