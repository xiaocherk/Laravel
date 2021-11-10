<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Sign Up Form</title>
    <link rel="stylesheet" href="/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <form action="" method="POST">
        <div id="success"></div>
        <ul id="error_list"></ul>
        
        @csrf
        <h1>Sign Up Form</h1>
        <div class="icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="formcontainer">
            <div class="container">
                <label for="uname"><strong>Name</strong></label>
                <input type="text" placeholder="Enter Username" name="name" class="name" >
                <label for="mail"><strong>E-mail</strong></label>
                <input type="text" placeholder="Enter E-mail" name="email" class="email" >
                <label for="psw"><strong>Password</strong></label>
                <input type="password" placeholder="Enter Password" name="password" class="password" >

            </div>
            <button type="submit" class="submit"><strong>SIGN UP</strong></button>

        </div>
    </form>

    <script>

        $(document).ready(function(){

            $(document).on('click','.submit',function(e){
                e.preventDefault();

                var data = {
                    'name':$('.name').val(),
                    'email':$('.email').val(),
                    'password':$('.password').val()
                }
                
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:"POST",
                    url:"/form",
                    data: data,
                    dataType:"json",
                    success:function (response){

                        // if bad response
                        if (response.status==400){
                            $('#error_list').html("");
                            $('#error_list').addClass('alert alert-danger');

                            $.each(response.errors, function (key, err_values) { 
                                 $('#error_list').append('<li>'+err_values+'</li>');
                            });
                        }
                        else{
                            $('#error_list').html("");
                            $('#success').addClass('alert alert-success');
                            $('#success').text(response.message);
                        }
                    }
                });
            });
        });

        </script>

</body>

</html>