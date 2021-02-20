@extends('main.layout')


@section('title')

دليل الطالب

@endsection


@section('content')

<div class="h-screen main-site">


    <div class="form-container flex items-center h-full justify-center">

        <div class="home-body flex flex-col items-center w-full mb-20 pb-10">
            {{-- <!-- For New users --> --}}
            @if( session()->has('success'))
            <div class=" w-full text-right py-3 px-5 text-white">
                <div class=" py-3 px-3 shadow-sm text-white bg-blue-400 rounded-md flex justify-between item-center w-1/6">
                    <span class="inline-block">{{session()->get('success')}}</span>
                    <i class="icon-ok mx-"></i>
                </div>
            </div>
            @endif


            @if ($errors->any())
            <div class=" w-full text-right py-3 px-5 text-white">
                <ul class="inline-block py-3 px-3 shadow-sm text-white bg-red-400 rounded-md lg:w-1/2 xl:w-1/3 w-full">
                    @foreach ($errors->all() as $error)
                    <li><i class="icon-warning mx-2"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p class="p-5 text-center s-color my-3 text-4xl lg:text-right w-full lg:pr-10 xl:pr-20">إبحث عن مُعلمك
                المفضل</p>
            <form action="{{route('results')}}" method="get" class="flex flex-col xl:flex-row lg:pr-20 w-full px-10 xl:relative ">

                <label for="subject" class="lg:w-1/3 xl:w-1/4">
                    <input type="text" name="subject" placeholder="إكتب اسم المادة هنا.." class="focus:outline-none focus:border-gray-100 hover:text-gray-700 border hover:border-gray-200 w-full shadow-inner border-gray-50 rounded-full py-3 px-6">
                </label>

                <label for="stage" class="lg:w-1/3 xl:absolute xl:w-40 right-1/4 ">
                    <select name="stage" id="stage" class="my-3 px-4 py-3 xl:my-0 border text-gray-300 shadow-inner focus:outline-none  appearance-none hover:text-gray-600 hover:border-gray-200 rounded-full  w-full">
                        <option value selected disabled>إختر المرحلة</option>
                        @foreach($stages as $stage)
                        <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                        @endforeach
                    </select>
                </label>

                <button type="submit" class=" lg:w-1/3 xl:w-1/12 xl:mr-32 sbg-color text-white pr-3 pl-5 py-2 focus:outline-none rounded-full shadow-md flex hover:bg-yellow-700 items-center justify-center text-lg">
                    <i class="icon-search text-white mx-2"></i>
                    البحث
                </button>
            </form>
        </div>
    </div>

</div>

@endsection

