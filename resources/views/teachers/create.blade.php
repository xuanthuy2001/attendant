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
        <label>first name</label>
        <input type="text" class="form-control" name = "first_name" value="{{  old('first_name')  }}"  placeholder="Enter full first_name ">
        @if($errors->has('first_name'))
            <div style="color: red" class="error">{{ $errors->first('first_name') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>last name</label>
        <input type="text" class="form-control" name = "last_name" value="{{  old('first_name')  }}"  placeholder="Enter full last_name ">
        @if($errors->has('last_name'))
            <div style="color: red" class="error">{{ $errors->first('last_name') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>address</label>
        <input type="text" class="form-control" name = "address" value="{{  old('address')  }}"  placeholder="Enter address ">
        @if($errors->has('address'))
            <div style="color: red" class="error">{{ $errors->first('address') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name = "email" value="{{  old('email')  }}"  placeholder="Enter email"  >
        @if($errors->has('email'))
            <div style="color: red" class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label>phone</label>
        <input type="text" class="form-control" name = "phone" value="{{  old('phone')  }}"  placeholder="Enter phone"  >
        @if($errors->has('phone'))
            <div style="color: red" class="error">{{ $errors->first('phone') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="example-fileinput">image</label>
        <input type="file" id="example-fileinput" name="image" class="form-control-file">
        @if($errors->has('image'))
            <div style="color: red" class="error">{{ $errors->first('image') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Create</button>

    <div class="form-group">
        <label>city</label>
        <select name="city" id="select-city" class="form-control"></select>
    </div>
    <div class="form-group">
        <label>district</label>
        <select name="district" id="select-district" class="form-control"></select>
    </div>
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
                if(each.pre === "Quận"){
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
