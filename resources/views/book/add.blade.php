@extends('layout.header', ['isAdmin' => 1, 'user'=> App\Models\Author::where('id','=',session('LoggedAuthor'))])

@section('content')
<div class=".justify-content-md-center">
    <h4>Login | As User</h4> <br>
    <form action="/admin/save-book" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title"  placeholder="Enter the book title">
            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="description">description</label>
            {{-- <input type="password" name="userPassword" class="form-control" placeholder="Enter password"> --}}
            <textarea name="description" class="form-control" id="description" cols="20" rows="10"></textarea>
            <span class="text-danger">@error('description') {{ $message }} @enderror</span>

        </div>
        <input type="file" id="myFile" name="filename">
        <span class="text-danger">@error('filename') {{ $message }} @enderror</span>

        <br>
        <button type="submit" class="form-control btn-block btn-primary">add</button>
        
    </form>
</div>
@endsection