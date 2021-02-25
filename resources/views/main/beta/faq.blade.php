@extends('main.layout')

@section('title')
الأسئلة الشائعة
@endsection


@section('content')


<div class="teacher-container px-5  md:px-10  pt-16 lg:pt-32 min-h-screen flex flex-col justify-between">



    <div class="page-body mt-5">

        <div class=" px-5 lg:px-10">
            <div class="bg-white p-10 rounded-lg shadow-md">
                {!! $faq !!}
            </div>
        </div>
    </div>

    <footer class="mt-10 p-5">
        <p>جميع الحقوق محفوظة</p>
    </footer>


</div>

@endsection





@section('script')


<script>
    $(function() {
        $(document).scroll(function() {
            let $nav = $(".navbar-top");
            $nav.removeClass('lg:shadow-none lg:bg-transparent', $(this).scrollTop() > 0);
            $nav.toggleClass('bg-white shadow-sm', $(this).scrollTop() > 0);
        });

    });
</script>

@endsection