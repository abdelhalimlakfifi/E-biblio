<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
class BookController extends Controller
{
    public function saveBook(Request $request){
        //session('LoggedAuthor')
        $request->validate([
            'filename' => 'required|mimes:pdf',
            'title' => 'required|min:2|max:255',
            'description' => 'required',
        ]);
        
        $author = Author::where('id','=',session('LoggedAuthor'))->first();
        $name = date("Y_m_d_H_i_s");
        $path = public_path()."/books/".$author->email;
        $pdf = $request->file('filename');
        $pdf->move($path, $name.".pdf");
        
        $book = new Book;
        $book->title = $request->title;
        $book->desctiption = $request->title;
        $book->authorId = session('LoggedAuthor');
        $book->path = $path."/".$name."pdf";
        $book->save();
        return redirect("admin/dashboard");
    }
}
