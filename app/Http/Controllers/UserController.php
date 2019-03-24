<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Register(Request $req){
        $date = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->subYears(10);

        $valid = Validator::make($req->all(),[
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|alpha_num|min:5',
            'conf_password' => 'required|same:password',
            'photo' => 'required|image',
            'gender' => 'required',
            'dob' => 'required|before:'.$date,
            'address' => 'required|min:10'
        ],[
            'conf_password.required' => 'Please input Confrim password field',
            'dob.required' => 'The birthdate field is required',
            'dob.before' => 'You must at least 10 years old'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        $table = new User();
        $table->email = $req->email;
        $table->password = bcrypt($req->password);

        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $ext = $file->extension();
            $filename = time().".".$ext;
            $file->move('img/UserPhoto', $filename);
            $table->photo = $filename;
        }

        $table->gender = $req->gender;
        $table->date_of_birth = $req->dob;
        $table->address = $req->address;
        $table->role_id = 2;
        $table->save();

        return redirect('/Login');
    }


    public function Login(Request $req){
        $valid = Validator::make($req->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        if(Auth::attempt([
            'email'=>$req->email,
            'password'=>$req->password
        ])){
            return redirect('/');
        }

        return redirect('/Login');
    }

    public function GetDate(){
        $date = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->format('l, d M Y');
        return view('index',compact('date'));
    }

    public function Logout(){
        Auth::logout();
        return redirect('/Login');
    }

    public function ShowUpdateUserPage(){
        $user = User::get();
        return view('admin.updateUser',compact('user'));
    }

    public function GetUserById(Request $req){
        $user = User::where('id','=',$req->id)->get();
        return view('admin.editUser',compact('user'));
    }

    public function UpdateUser(Request $req){
        $date = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->subYears(10);

        $valid = Validator::make($req->all(),[
            'email' => 'required|email|unique:users|max:255',
            'photo' => 'required|image',
            'gender' => 'required',
            'dob' => 'required|before:'.$date,
            'address' => 'required|min:10',
        ],[
            'dob.required' => 'The birthdate field is required',
            'dob.before' => 'You must at least 10 years old'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $ext = $file->extension();
            $filename = time().".".$ext;
            $file->move('img/UserPhoto', $filename);

            User::where('id','=',$req->id)->update(
                [
                    'photo'=>$filename,
                    'email'=>$req->email,
                    'gender'=>$req->gender,
                    'date_of_birth'=>$req->dob,
                    'address'=>$req->address
                ]
            );
        }

        $user = User::get();

        $msg = "Succesfully update user !";

        return view('admin.updateUser',compact('user','msg'));
    }

    public function ShowDeleteUserPage(){
        $user = User::get();
        return view('admin.deleteUser',compact('user'));
    }

    public function DeleteUser(Request $req){
        User::where('id','=',$req->id)->delete();
        $user = User::get();

        $msg = "Succesfully delete user !";

        return view('admin.deleteUser',compact('user','msg'));
    }

    public function EditProfile(Request $req){
        $date = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->subYears(10);

        $valid = Validator::make($req->all(),[
            'email' => 'required|email|unique:users|max:255',
            'photo' => 'required|image',
            'gender' => 'required',
            'dob' => 'required|before:'.$date,
            'address' => 'required|min:10',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        if (Input::hasFile('photo')) {
            $file = Input::file('photo');
            $ext = $file->extension();
            $filename = time().".".$ext;
            $file->move('img/UserPhoto', $filename);

            User::where('id','=',$req->id)->update(
                [
                    'photo'=>$filename,
                    'email'=>$req->email,
                    'gender'=>$req->gender,
                    'date_of_birth'=>$req->dob,
                    'address'=>$req->address
                ]
            );
        }

        $user = User::get();

        $msg = "Succesfully edit profile !";

        return view('member.profile',compact('user','msg'));
    }
}
