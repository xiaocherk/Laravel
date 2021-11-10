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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Course View Table</title>

    <style>
        td,tr{
            text-align:center;
        }
    </style>

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
            <h2 class="mb-5">Course</h2>

            <div class="table-responsive">
                <div id="success">

                </div>

                <table class="table table-striped custom-table">
                    <thead>
                            <th scope="col">Course ID</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Credit Hours</th>
                            <th scope="col">Payment Fee</th>

                            <th id='add'><a href="#" data-toggle="modal" data-target="#AddPersonModal" class="btn btn-primary">Add Person</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($details as $i)

                        <tr>
                            <td>{{$i->course_id}}</td>
                            <td>{{$i->course_name}}</td>
                            <td>{{$i->credit_hours}}</td>
                            <td>{{$i->payment_fee}}</td>
                            <td><a href=''>More Details</a></td>
                        </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
 

        </div>

    </div>
</body>

</html>