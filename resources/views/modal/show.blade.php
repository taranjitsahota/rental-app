  @extends("layouts.layout")
  @section("title",'show')
  @section("content")

  <div class="container">
      
    
      
        
      <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">Sr. No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($shows as $show)
              @php
              // dd($show);
          @endphp
          <th>{{ $loop->index+1 }}</th>
          <td>{{ $show->name }}</td>
          <td>{{ $show->email }}</td>
          <td>
              <button class="btn btn-primary">Edit</button>
              <a href="delete/{{ $show->id }}" class="btn btn-primary">Delete</a>
          </td>
        </tr>
          @endforeach
            
          </tbody>
        </table>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      New User
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="form" action="">
              @csrf
              <input placeholder="Name" name="name" type="text">
              <input placeholder="Email" name="email" type="text">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
              <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#form').validate({
          rules: {
            name: {
              required: true
            },
            email: {
              required: true
            },
          },
          messages: {
            name: 'Required',
            email: 'Required',
          },
        });
        });
    </script>
    
    <script>
      $("#form").on('submit', (function(e) {
        
        e.preventDefault();

$(".form_error").html("");
$(".form_error").removeClass("alert alert-danger");


$.ajax({
    type: "POST",
    url: "{{ url('store') }}",
    data: new FormData(this),
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    success: function(result) {
        location.href = "{{ url('/show') }}";
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

</script>
    
@endpush