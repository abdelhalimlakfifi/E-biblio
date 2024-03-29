<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('bootstrap-5.0.2-dist\css\bootstrap.min.css') }} ">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">E-bibliotheque</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              @if ($isAdmin == 1)
              <li class="nav-item">
                <a class="nav-link" href="/admin/add-books">Add a book</a>
              </li>
              @endif
              
              
            </ul>
            <span class="navbar-text" style="margin-right: 25px">
                {{ $user->first()->name }}
            </span>
            <span class="navbar-text">
                <a href="/auth/logout">Logout</a>
            </span>
          </div>
        </div>
      </nav>
    @yield('content')
</body>
</html>