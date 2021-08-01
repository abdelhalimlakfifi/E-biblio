<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('bootstrap-5.0.2-dist\css\bootstrap.min.css') }} ">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-around" style="margin-top: 10%;">
            <div class="col-md-4 col-md-offset-4 border border-dark p-5">
                @if(Session::get('userSuccess'))
                    <div class="alert alert-success">
                        {{ Session::get('userSuccess') }}
                    </div>
                @endif
                @if(Session::get('userFail'))
                    <div class="alert alert-danger">
                        {{ Session::get('userFail') }}
                    </div>
                @endif
                <h4>Login | As User</h4> <br>
                <form action="" method="post">
                    
                    @csrf
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" class="form-control" name="userEmail"  placeholder="Enter email adresse" >
                      
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" name="userPassword" class="form-control" placeholder="Enter password">
                     
                    </div>
                    <br>
                    <button type="submit" class="form-control btn-block btn-primary">Login</button>
                   
                    <a href="{{ route('auth.register') }}">I don't have an account, Create new</a>
                </form>
            </div>
            <div class="col-md-4 col-md-offset-4 border border-dark p-5">
                @if(Session::get('authorSuccess'))
                    <div class="alert alert-success">
                        {{ Session::get('authorSuccess') }}
                    </div>
                @endif
                @if(Session::get('authorFail'))
                    <div class="alert alert-danger">
                        {{ Session::get('authorFail') }}
                    </div>
                @endif
                <h4>Login | As Admin</h4> <br>
                <form action="{{ route('admin.check') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="adminEmail">Email</label>
                        <input type="text" class="form-control" name="adminEmail"  placeholder="Enter email adresse" >
                      
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" name="adminPassword" class="form-control" placeholder="Enter password">
                    </div>
                    <br>
                    <button type="submit" class="form-control btn-block btn-primary">Login</button>
                    
                    <a href="{{ route('auth.register') }}">I don't have an account, Create new</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>