<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/table.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/personView.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Person View Table</title>

</head>

<header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/home">Profile</a></li>
                                  <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} 
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                      </form>
                                  </li>
                                </ul>
                              </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</header>

    <body>
    <!-- Add Person Modal -->
<div class="modal fade" id="AddPersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Person</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

            <ul id="error_list">

            </ul>

            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" class="name form-control" >
            </div>

            <div class="form-group mb-3">
                <label for="">E-mail</label>
                <input type="text" class="email form-control" >
            </div>

            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" class="password form-control" >
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_person">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Add Person Modal -->

  
  <!-- Update Person Modal -->
<div class="modal fade" id="UpdatePersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Person</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

            <ul id="update_error_list"></ul>
            <input type="hidden" id="update_id">

            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" id="update_name" class="name form-control" >
            </div>

            <div class="form-group mb-3">
                <label for="">E-mail</label>
                <input type="text" id="update_email" class="email form-control" >
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary edit_person">Update</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Update Person Modal -->

    <div class="content">

        <div class="container">
            <h2 class="mb-5">Person</h2>

            <div class="table-responsive">
                <div id="success">

                </div>

                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registered Date</th>
                            <th></th>
                            <th id='add'><a href="#" data-toggle="modal" data-target="#AddPersonModal" class="btn btn-primary">Add Person</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
 

        </div>

    </div>
</body>
    <script>
        $(document).ready(function(){
            getPerson();

            function getPerson(){
                
                $.ajax({
                    type:"GET",
                    url:"/personView",
                    dataType:"json",
                    
                    success:function(response){
                        
                        $.each(response.tableView, function (key,item) {
                             $('tbody').append('<tr scope=\'row\'>\
                                    <td>'+item.id+'</td>\
                                    <td>'+item.name+'</td>\
                                    <td>'+item.email+'</td>\
                                    <td>'+item.created_at+'</td>\
                                    <td><button type="button" value="'+item.id+'" class="update_person btn btn-primary tbn-sm">Update</button></td>\
                                    <td><button type="button" value="'+item.id+'" class="remove_person btn btn-primary tbn-sm">Remove</button></td>\
                                </tr>');                             
                            });
                    }
                });
            }

            $(document).on('click','.edit_person',function(e){
                e.preventDefault();
                var person_id = $('#update_id').val();

                var data={
                    'name':$('#update_name').val(),
                    'email':$('#update_email').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:"put",
                    url:"/updatePerson/"+person_id,
                    data:data,
                    dataType:"json",                    

                    success:function(response){                        
                        console.log(response);
                        if (response.status==400){
                            $('#update_error_list').html("");
                            $('#update_error_list').addClass('alert alert-danger');

                            $.each(response.errors, function (key, err_values) { 
                                $('#update_error_list').append('<li>'+err_values+'</li>');
                            });
                        }else if (response.status==404){
                            $('#update_error_list').html("");
                            $('#update_error_list').addClass('alert alert-danger');
                            $('#update_error_list').text(response.message);
                        }else{
                            $("#success").html("");
                            $('#update_error_list').html("");
                            $("#success").addClass('alert alert-success');
                            $('#success').text(response.message);
                            $("#UpdatePersonModal").modal('hide');
                            $('tbody').html("");
                            getPerson();
                        }                        
                    }
                });

            });

            $(document).on('click','.add_person',function(e){
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
                    url:"/personView",
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
                            $("#AddPersonModal").modal('hide');
                            $('#AddPersonModal').find('input').val("");
                            $('tbody').html("");
                            getPerson();
                        }
                    }
                });
            });

            $(document).on('click','.update_person',function(e){
                e.preventDefault();

                var person = $(this).val();

                $('#UpdatePersonModal').modal('show');

                $.ajax({
                    type:"GET",
                    url:"/update/"+person,
                    success:function(response){
                        console.log(response);
                        if (response.status==404){
                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        }
                        else{
                            $('#update_id').val(person);
                            $('#update_name').val(response.rgform.name);
                            $('#update_email').val(response.rgform.email);
                        }
                    }
                });
            });

            $(document).on('click','.remove_person',function(e){
                e.preventDefault();

                var person = $(this).val();
                
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:"DELETE",
                    url:"/remove/"+person,

                    success:function(response){
                        alert("Deleted Successfully for ID #"+person);
                        console.log(response);
                        if(response.status==200){location.reload()}
                    }
                });
            });
        });
    </script>
    
    

    </html>