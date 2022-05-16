<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>log in</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('control_panel_styles/css/style.css') }}">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        body{
            padding: 50px;
        }
    </style>

</head>
<body>

 <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login User</div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" aria-describedby="inputGroupPrepend2" required autofocus>
                                    @error('email')
                                    <label style="color: red" for="email">  {{$message}}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" aria-describedby="inputGroupPrepend2" required autofocus>
                                    @error('password')
                                    <label style="color: red" for="password">  {{$message}}</label>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> Login </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</body>
</html>
