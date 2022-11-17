@extends('layout.master')
@section('title',$title)
@section('css')
<link href="{{ asset('css/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<form class="mt-5" action="{{ route('teacher.add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>full name</label>
        <input type="text" class="form-control" name="fullname" value="{{  old('fullname')  }}" placeholder="Enter full first_name ">
        @if($errors->has('fullname'))
        <div style="color: red" class="error">{{ $errors->first('fullname') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>city</label>
                <select name="city" id="select-city" class="form-control"></select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>district</label>
                <select name="district" id="select-district" class="form-control"></select>
            </div>
        </div>
    </div>
    
   <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{  old('email')  }}" placeholder="Enter email">
            @if($errors->has('email'))
            <div style="color: red" class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>phone</label>
            <input type="text" class="form-control" name="phone" value="{{  old('phone')  }}" placeholder="Enter phone">
            @if($errors->has('phone'))
            <div style="color: red" class="error">{{ $errors->first('phone') }}</div>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <div class="form-group">
                <label>Birth Date</label>
                <input type="text" name="birthdate" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                @if($errors->has('birthdate'))
                <div style="color: red" class="error">{{ $errors->first('birthdate') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label>Gender</label>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="gender" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="2" type="radio" name="gender" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    female
                </label>
            </div>
        </div>
        @if($errors->has('gender'))
            <div style="color: red" class="error">{{ $errors->first('gender') }}</div>
        @endif
    </div>
   </div>
    <div class="form-group">
        <label for="example-fileinput">image</label>
        <input type="file" id="example-fileinput" name="image" class="form-control-file">
        @if($errors->has('image'))
            <div style="color: red" class="error">{{ $errors->first('image') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  
   
    
</form>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        async function loadDistrict()
        {
            $('#select-district').empty();
            const path = $("#select-city option:selected").data('path');
            const response =await fetch('{{ asset('locations/') }}'+ path)
            const data = await response.json();
            $.each(data.district, function(index, each){
                if(each.pre === "Quận" || each.pre === "Huyện"){
                    $('#select-district').append(`<option >${each.name}</option>`);
                }
            })
        }


        $( document ).ready(async function() {
            $('#select-city').select2();
            const response = await fetch('{{ asset('locations/index.json') }}');
            const cities = await response.json();
           $.each(cities, function(index, city)
           {
                $('#select-city').append(`<option data-path='${city.file_path}'>${index}</option>`);
           })

           $('#select-city').change(function(){
                loadDistrict();
           });
           $('#select-district').select2();
           loadDistrict();
        });
    </script>
@endsection
