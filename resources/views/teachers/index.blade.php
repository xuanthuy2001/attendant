@extends('layout.master')
@section('title',$title)
@section('css')
<link href="{{ asset('css/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
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
                        name="search" class="form-control m-input search" placeholder="Enter Country Name" aria-label="Search" />
                        <ul id="filter-select" class="filter-select no-value">
                        </ul>
                </div>
            </form>
        </div>
    </div>
    <h4 class="page-title">Tasks <a href="{{ route('teacher.create') }}" class="btn btn-success btn-sm ml-3">Add New</a></h4>
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
            <td>{{ $teacher -> full_name }}</td>
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

@section('js')
<script>
    
</script>
<script type='text/javascript'>
        var array=[];
        $('#header-search').on('keyup', function() {
            var search = $('.search');
            $.ajax({
                url:  "{{ route('teacher.searchByName') }}",
                type: 'GET',
                data: search,
                success:function(data){ 
                   
                }
            })
    });
        //<![CDATA[
        //global variables
        var keyword = $("#keyword");
        var filterSelect = $("#filter-select");
        var keywordHref = $("#keyword-button").attr("href");
        var keywordVal = "";
        /*var filters = {
        "aardvark" : { sprite : "" }
        }
        var filterArray = Object.keys(filters);*/
        
        var filterArray = [];
        //the filter array.  It should probably be organized better, or possibly broken down into a few arrays.  You can collapse it, since it takes up a lot of space.  These are actual popular search terms at paviliongift.com.
        var newFilter = [];
        var tabIndex = -1;
        //Events
        
        keyword.on("focus", function(e){
        e.preventDefault();
        if (keywordVal !== "" && keydownTarget !== 9 && keydownTarget !== 16 && keydownTarget !== 38 && keydownTarget !== 40 && newFilter.length > 1) {
            fillSelect();
        }
        });
        keyword.on("keyup", function(e) {
        keywordVal = $(this).val();
        keydownTarget = e.which;
        var ignoreKeys = e.which !== 9 && e.which !== 16 && e.which !== 38 && e.which !== 40;
        if (keywordVal !== "" && ignoreKeys) { 
            newFilter = filterArray.filter(isResult);
            if (newFilter.length === 0) {
            removeListBlur();
            return false;
            }
                //keyword.val(newFilter[0]);
                //keyword[0].setSelectionRange(selectRange, newFilter[0].length);
        }
        
        if (e.which !== 9 && ignoreKeys) {
            fillSelect();
            tabIndex = -1;
            if (newFilter.length === 0) {
            removeListBlur();
            return false;
            }
            
        }
        });
        keyword.on("keydown", function(e) {
        if (keywordVal !== "") {
            if (e.which === 9) {
            e.preventDefault();
            keydownTarget = e.which;
            if (!e.shiftKey) {
            cycleSelectList("next");
            }
            if (e.shiftKey) { 
            cycleSelectList("previous");
            }
        }
            if (e.which === 38 || e.which === 40) {
            e.preventDefault();
            keydownTarget = e.which;
            }
            if (e.which === 38) {
            cycleSelectList("previous");
            }
            else if (e.which === 40) {
            cycleSelectList("next");
            }
        }
        if (e.which === 13) {
            $("#keyword-button").click()
        }
        });
        /*use mousedown instead of click because the keyword blur event is firing before this call back can occur*/
        $("#filter-select").on("mousedown",".filter-select-list", function(e){
        e.preventDefault();
        var $this = $(this);
        var currentIndex = $this.index();
        tabIndex = currentIndex;
        keydownTarget = 9;
        cycleSelectList("none");
        });
        keyword.on('blur', removeListBlur);
        //helper functions
        function isResult(val) {
                return val.indexOf(keywordVal.toLowerCase()) === 0 
        }
        function removeListBlur() {
        if (filterSelect.has("li").length) {
            filterSelect.addClass("no-value").children("li").remove();
        }
        }
        function cycleSelectList(direction) {
        var newList = filterSelect.find("li");
            if (direction === "previous") {
            if (tabIndex <= 0) {
                tabIndex = newList.length;
            }
            tabIndex--;
            }
            else if (direction === "next") {
            tabIndex++;
            if (tabIndex === newList.length) {
                
                tabIndex = 0;
            }
            }
        newList.eq(tabIndex).addClass("list-highlight");
        keyword.val(newList.eq(tabIndex).attr("data-value"));
        newList.not(newList.eq(tabIndex)).removeClass("list-highlight");
            keyword.focus();
        }
        function fillSelect() {
        filterSelect.children("li").remove();
        //filterSelect.attr("size",newFilter.length)
        if (keywordVal !== "") {
            filterSelect.removeClass("no-value");
        for (var i = 0; i < newFilter.length; i++) {
            filterSelect.append("<li class='filter-select-list' data-value='" + newFilter[i] + "'>" + newFilter[i] + "</li>");
            //filters[i].sprite;
        }
        }
        else {
            filterSelect.addClass("no-value");
        }
        }
        //for demo purposes only
        $("#keyword-button").on("click", fillHref)
        function fillHref() {
        var newHrefString = keywordHref + keyword.val().replace(/\s+/g, '+');
        var newHref = $("#keyword-button").attr("href", newHrefString);
        }
        //]]>
 </script>
@endsection

