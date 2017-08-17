<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;

    use Redirect;
    use Hash;
    use App\User;
    use Validator;
    use Auth;

  class UsersController extends Controller{
    
    protected $layout = "layouts.main";

    public function getRegister(){
        return view('users.register');
    }


    public function getLogin(){
        return view('users.login');
    }

    public function postCreate(Request $request){
       $validator = Validator::make($request->all(),[
           'username' => 'required|alpha|min:2',
	   'email' => 'required|email|unique:users',
	   'password' => 'required|alpha_num|between:6,12|confirmed',
	   'password_confirmation'=>'required|alpha_num|between:6,12'
       ]);

       if($validator->passes()){
           $user = new User;
	   $user->username = $request->username;
	   $user->email = $request->email;
	   $user->password = Hash::make($request->password);
	   $user->save();
	   return Redirect::to('users/login')->with('message','Have hun!');
       }else{
           return Redirect::to('users/register')->with('message','Input data is incorrect, please try again!')->withErrors($validator)->withInput();          
       }
    }
    

    public function postLogin(Request $request){
        if(Auth::attempt(array('email'=>$request->email,'password'=>$request->password))){
       return Redirect::to('users/dashboard')->with('message','You have logined');

}else{
   return Redirect::to('users/login')->with('message','username or password incorrect')->withInput();
}
    }

   public function getDashboard(){
    if(Auth::check()){
     return view('users.dashboard');
    }else{
      return Redirect::to('uses/login');
    }
  }
     
      public function getLogout(){
        if(Auth::check())
	{
	  Auth::logout();
	}
	return Redirect::to('users/login')->with('message','You are now logouted');
      }
  }
