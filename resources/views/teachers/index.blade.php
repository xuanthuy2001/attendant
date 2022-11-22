@extends('layout.master')
@section('title',$title)
@section('css')
    <link href="{{ asset('css/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        /*autoprefixer used*/
    *, *::after, *::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box
    }
    html, body {
    /*this will give a vertical scrollbar by default, so there isn't a little jump when you start entering search terms*/
    height: calc(100% + 1px)
    }
    body {
    font: 100% 'Arimo', sans-serif;
    }
    .filter-wrapper, .keyword-wrapper {
    display: flex;
    justify-content: center;
    }
    .filter-wrapper {
    min-height: 100%;
    flex-flow: column wrap;
    align-items: center;
    position: relative
    }
    .keyword-wrapper {
    width: 100%;
    position: relative;
    }
    #keyword {

    outline: none;
    transition: border 0.5s ease-in-out
    }
    #keyword:focus {
    border-top-color: rgba(0,0,0,0);
    border-left-color: rgba(0,0,0,0);
    border-right-color: rgba(0,0,0,0);
    }
    #keyword-button {
    position: absolute;
    right: 26%;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.7em;
    color: #8DB9ED
    }
    #keyword-button:hover {
    color: #ccc
    }
    .filter-select {
    width: 100%;
    list-style: none;
    font-size: 1.1em;
    color: rgb(105,105,105);
    border: 1px solid #ccc;
    border-top: none;
    /*so things don't jump around*/
    left: 0%;
    /*Since we know the wrapper will always be 100% height, we can use half of 100% + half the height of the input*/
    top: calc(50% + 25px);
    /*for a better calculation use JS.  I'm calculating half of the body height - half the height of the input - li padding*/
    max-height: 10vh;
    overflow-y: auto;
    background: #fff
    }
    .filter-select-list {
    cursor: pointer;
    padding: 5px 10px;
    }
    .filter-select-list:hover {
    background: rgb(155,155,155);
    color: #fff
    }
    .no-value {
    border: none
    }
    .list-highlight, .list-highlight:hover {
    background: rgb(55,55,55);
    color: #fff
    }
    /*some simple responsive designs*/
    @media only screen and (max-width: 768px) {

    .filter-select, #keyword {
    width: 80%;
    }
    #keyword {
    font-size: 1.3em
    }
    .filter-select {
    font-size: 0.9em;
    left: 10%;
    top: calc(50% + 23px);
    }
    #keyword-button {
    right: 11%
    }
    }
    @media only screen and (max-width: 480px) {

    .filter-select, #keyword {
    width: 95%;
    }
    .filter-select {
    left: 2.5%;
    }
    #keyword-button {
    right: 3.5%
    }
    }
    </style>
@endsection
@section('content')
  
<div class="page-title-box">
    <div class="page-title-right">
        <div class="app-search">
            <form id="header-search">
                <div class="input-group">
                        <input type="text" id="keyword"
                        autocomplete="off" required
                        name="search" class="form-control m-input search" placeholder="Enter Name" aria-label="Search" />
                </div>
            </form>
        </div>
    </div>
  
    <h4 class="page-title">Tasks
        <a href="{{ route('teacher.create') }}" class="btn btn-success ">Add New</a>
        <form action="{{ route('import_csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="btn btn-primary mb-0" for="csv">add csv</label>
            <input type="file" name="csv" id="csv" class="d-none" accept="text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
            <button class="btn btn-success"  type="submit" >submit</button>
        </form>
   </h4>
   @if(session('status'))
    <div class="alert alert-primary" role="alert">
        {{ session('status') }}
    </div>
   @endif
    
</div>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>full name</th>
            <th>info</th>
            <th>chi tiết</th>
        </tr>
    </thead>
    <tbody id="teachers-body">
      @foreach ($teachers as $teacher)
      <tr>
            <td>{{ strtoupper($teacher -> fullname) }}</td>
            <td>
            email:    <a href="mailto:your@email.com?body=the attached file is at this link: %link%">
                            {{ $teacher -> email }}
                        </a> <br>
            phones :  <a href="tel:{{ $teacher -> phone }}">liên hệ qua {{ $teacher -> phone }}</a> <br>
             <address>
                address :  <a href="http://maps.google.com/maps?q={{ $teacher -> address }}" target="_blank">
                {{ $teacher -> address }}
                    </a>
             </address>
            <br>
            </td>
            <td><a href="">Xem chi tiết về {{ $teacher -> last_Name }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item disabled">
            <a class="page-link" href="javascript: void(0);" tabindex="-1">Previous</a>
        </li>
        {!! $teachers->links() !!}
        <li class="page-item">
            <a class="page-link" href="javascript: void(0);">Next</a>
        </li>
    </ul>
</nav>

@endsection



