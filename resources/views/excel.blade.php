@extends('layouts.layout')
@section("title","excel")
@section('content')

<div class="container">
  <form action="/exceldata" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <input type="text" placeholder="name" name="name" id="name">
    <input type="text" placeholder="contact" name="contact" id="contact"> --}}
    <input type="file" name="file" id="file">
    <input type="submit" id="submit" class="btn btn-primary">
    {{-- <a href="/exportdata"><button type="button" id="excel" class="btn btn-primary">Export Excel</button></a> --}}
    
  </form>
</div>

{{-- @push('scripts')
<script>
$(document).ready(function(){
    $('#submit').click(function(e){

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      })

      e.preventDefault();
      var name = $('#name').val();
      var contact = $('#contact').val();
      $.ajax({
        url:"{{ url('exceldata') }}",
        type:'GET',

        data:{
            name:name,
            contact:contact,
        },
        success:function(data){
        alert('data inserted')
         
        //   if($.isEmptyObject(data.error)){
        //     if(data){
        //       // console.log($users);
        //       window.location=
        //     }
        //     else{
        //     alert('Not registered or invalid credentials')
        //   } 
           
        // }
        //   else{
        //     alert('Not registered or invalid credentials')
        //   }
        }

      });
    });
  });
</script>
@endpush --}}