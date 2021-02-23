@extends('cp.layout')

@section('title')
    الشروط والأحكام
@endsection

@section('content')

<section class="content py-1 px-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header d-flex justify-content-between align-content-center">
                    <h4 class="col-6">
                        الشروط والأحكام
                    </h4>
                    <div class="buttons col-6 buttons col-6 d-flex justify-content-end">
                        <button id="edit" class="btn btn-primary" onclick="edit()" type="button">تعديل الحالي</button>
                        <button id="save" class="btn btn-warning mr-1" onclick="save()" type="button">حفظ</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body pad">
                    <div class="mb-3">
                        <div class="click2edit p-3 border-0 w-100"></div>
                        <label for="terms" class="w-100 privacyLabel">
                            <textarea name="terms" class="w-100 border-0" id="terms">@if(isset($terms)) {{$terms}} @else صفحة الخصوصية لموقع دليل الطالب @endif</textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>

@endsection

@section('custom-js')
<script src="{{asset('cp/plugins/summernote/summernote-bs4.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            //  airMode: true

        });
    });
</script>

<script>
    $(function() {
        $('.click2edit').html($('#terms').val());
        $('.privacyLabel').hide();


    });
    var edit = function() {
        $('.click2edit').hide();
        $('.privacyLabel').show();
        $('#terms').summernote({
            focus: true,
            //  height: 200,
        });


    };

    var save = function() {
        var markup = $('#terms').summernote('code');
        $('#terms').summernote('destroy');
        $('.privacyLabel').hide();
        $('.click2edit').html($('#terms').val());
        $('.click2edit').show()
        //  console.log($('.click2edit').html());
        $.ajax({
            url: "{{ URL::to('admincp/pages/terms/sent') }}" + '?_token=' + '{{ csrf_token() }}',
            type: "post",
            dataType: "html",
            data: {
                "termsInput": $('#terms').val()
            },
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data)
            }
        });
    };
</script>

@endsection

@section('adminCSS')
<link rel="stylesheet" href="{{asset('cp/plugins/summernote/summernote-bs4.css')}}">
<style>
    .note-editable {
        height: 200px;
    }
</style>
@endsection
