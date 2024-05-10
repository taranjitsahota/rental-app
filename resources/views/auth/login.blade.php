@extends("layouts.layout")
@section("title",'Login')
@section("content")

<div>
    <form action="{{ url('loginpost') }}" class="container" id="login_form" method="POST">
        @csrf
        <label for="email">Email:</label>
    <input type="email" name="email">
    
        <label for="password">Password</label>
    <input type="password" name="password">
    <div>
        <button type="submit" id="login" class="btn" >Login</button>
    </div>
    
    </form>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#login_form').validate({
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                
            },
            messages: {
              email: 'Required',
              password: 'Required',
            },
           
        });
    });
</script>
<script>
  $(document).ready(function () {
    $("#login").on('submit', (function(e) {

e.preventDefault();

$(".form_error").html("");
$(".form_error").removeClass("alert alert-danger");


$.ajax({
    type: "POST",
    url: "{{ url('/loginpost') }}",
    data: new FormData(this),
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    success: function(result) {
        location.href = "{{ url('/') }}";
    },
    error: function(data) {
        var responseData = data.responseJSON;
        if (responseData.error_type == 'form') {
            jQuery.each(responseData.errors, function(i, val) {
                $("#form-error-" + i).html(val);
            });
        }
    }
});

}));
  });
  </script>
    
@endpush