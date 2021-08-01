<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('bootstrap-5.0.2-dist\css\bootstrap.min.css') }} ">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-around" style="margin-top: 2%;">
            <div class="col-md-5 col-md-offset-4 border border-dark p-5">
                <h4>Register | As <ins><b>User</b></ins></h4> <br>
                <form action="/auth/saveuser" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="uName">Fullname</label>
                        <input type="text" class="form-control" name="uName"  placeholder="Enter fullname" value="{{ old('uName') }}">
                        <span class="text-danger"> @error('uName') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username"  placeholder="Enter username" value="{{ old('username') }}">
                        <span class="text-danger"> @error('username') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="userBirthday">Birthday</label>
                        <input type="date" class="form-control" name="userBirthday" value="{{ old('userBirthday') }}">
                        <span class="text-danger"> @error('userBirthday') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" class="form-control" name="userEmail"  placeholder="Enter email adresse" value="{{ old('userEmail') }}">
                        <span class="text-danger"> @error('userEmail') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" name="userPassword" class="form-control" placeholder="Enter password">
                        <span class="text-danger"> @error('userPassword') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="userPasswordConfirmation">Password Confirmation</label>
                        <input type="password" name="userPasswordConfirmation" class="form-control" placeholder="Repeat your password">
                        <span class="text-danger"> @error('userPasswordConfirmation') {{ $message }} @enderror</span>
                    </div>
                    <br>
                    <button type="submit" class="form-control btn-block btn-primary">Register</button>
                   
                    <a href="{{ route('auth.login') }}">I Already have an account, Login</a>
                </form>
            </div>
            <div class="col-md-5 col-md-offset-4 border border-dark p-5">
                <h4>Register | as <ins><b>Admin</b></ins></h4> <br>
                <form action="{{ route('auth.saveadmin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="aName">Fullname</label>
                        <input type="text" class="form-control" name="aName"  placeholder="Enter fullname" value="{{ old('aName') }}">
                        <span class="text-danger"> @error('aName') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="adminName">username</label>
                        <input type="text" class="form-control" name="adminName"  placeholder="Enter username" value="{{ old('adminName') }}">
                        <span class="text-danger"> @error('adminName') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="adminBirthday">Birthday</label>
                        <input type="date" class="form-control" name="adminBirthday" value="{{ old('adminBirthday') }}">
                        <span class="text-danger"> @error('adminBirthday') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="adminEmail">Email</label>
                        <input type="text" class="form-control" name="adminEmail"  placeholder="Enter email adresse" value="{{ old('adminEmail') }}" >
                        <span class="text-danger"> @error('adminEmail') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" name="adminPassword" class="form-control" placeholder="Enter password">
                        <span class="text-danger"> @error('adminPassword') {{ $message }} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="adminPasswordConfirmation">Password Confirmation</label>
                        <input type="password" name="adminPasswordConfirmation" class="form-control" placeholder="Rpeate your password">
                        <span class="text-danger"> @error('adminPasswordConfirmation') {{ $message }} @enderror</span>

                    </div>
                    <br>
                    <button type="submit" class="form-control btn-block btn-primary">Register</button>
                    
                    <a href="{{ route('auth.login') }}">I Already have an account, Login</a>
                </form>
            </div>
    </div>
</body>
</html>