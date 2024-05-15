<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="myForm" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <button type="button" onclick="submitForm()">Submit</button>
    </form>
    <div id="response"></div>

    <script>
        function submitForm() {
            var formData = $('#myForm').serialize();
            $.ajax({
                type: 'POST',
                url: '{{  url("/testpost") }}', // Using named route
                data: formData,
                success: function(response) {
                    $('#response').html('<p>Name: ' + response.name + '</p><p>Email: ' + response.email + '</p>');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>