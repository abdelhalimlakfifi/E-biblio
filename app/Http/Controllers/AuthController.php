<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    // ########## -LOGIN- #########
    public function login(){
        return view('auth.login');
    }
    // ########## -register- #########
    public function register(){
        return view('auth.register');
    }
    // ########## -register a user- #########
    public function saveUser(Request $request){
        $request->validate([
            'uName' => 'required',
            'username' => 'required|min:5',
            'userBirthday' => 'required',
            'userEmail' => 'required|unique:users|email',
            'userPassword' => 'required|min:5|max:18|required_with:userPasswordConfirmation|same:userPasswordConfirmation',
            'userPasswordConfirmation' => 'min:5|max:18',
        ]);
        $user = new User;
        $user->name = $request->uName;
        $user->username = $request->username;
        $user->birthday = $request->userBirthday;
        $user->email = $request->userEmail;
        $user->password = Hash::make($request->userPassword);

        if($user->save()){
            return redirect(route('auth.login'))->with('userSuccess','You signed up as user successfully');
        }else{
            return back()->with('userFail','Something went wrong, try again');
        }
    }
    // ########## -register a Admin- #########
    public function saveadmin(Request $request){
        $request->validate([
            'aName' => 'required',
            'adminName' => 'required|min:5',
            'adminBirthday' => 'required',
            'adminEmail' => 'required|unique:users|email',
            'adminPassword' => 'required|min:5|max:18|required_with:adminPasswordConfirmation|same:adminPasswordConfirmation',
            'adminPasswordConfirmation' => 'min:5|max:18',
        ]);
        $author = new Author;
        $author->name = $request->aName;
        $author->username = $request->adminName;
        $author->email = $request->adminEmail;
        $author->birthday = $request->adminBirthday;
        $author->password = Hash::make($request->adminPassword);
        $author->numberOfBooks = 0;
        if($author->save()){
            //mkdir('books/'.$request->adminEmail);
            File::makeDirectory('books/'.$request->adminEmail);
            return redirect(route('auth.login'))->with('authorSuccess','You signed up as author successfully');
        }else{
            return back()->with('authorFail','Something went wrong, try again');
        }
    }

    public function adminCheck(Request $request){
        $request->validate([
            'adminEmail' => 'required|email',
            'adminPassword' => 'required|min:5|max:18',
        ]);
        $adminInfo = Author::where('email','=',$request->adminEmail)->first();
        if(!$adminInfo){
            return back()->with('authorFail',"we don't have this email");
        }else{
            if(Hash::check($request->adminPassword, $adminInfo->password)){
                $request->session()->put('LoggedAuthor',$adminInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('authorFail',"Incorrect Password");
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedAuthor')){
            session()->pull('LoggedAuthor');
            return redirect('auth/login');
        }
        
    }

    public function dashboard(){
        $user = ["user" => Author::where('id','=',session('LoggedAuthor'))->first(), "isAdmin" => 1];
        return view('author.dashboard', $user);
    }
}