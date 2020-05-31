<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';
    protected function redirectTo() {
        session()->flash('flash_message', 'ログインが完了しました');
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // protected function validator(array $data)
    // {
    //     $validate_rules = [
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         ];
        
    //     $validate_messages = [
    //         'email.required' => 'メールアドレスを入力してください',
    //         'email.string' => 'メールアドレスは文字列で入力してください',
    //         'email.max' => 'メールアドレスは255文字以内で入力してください',
    //         'email.unique' => 'そのメールアドレスはすでに登録されています',
    //         'password.required' => 'パスワードを入力してください',
    //         'password.string' => 'パスワードは文字列で入力してください',
    //         'password.max' => 'パスワードは6文字以上で入力してください',
    //         'password.confirmed' => 'パスワードを正確に入力してください',
    //         ];
        
    //     return Validator::make($data, $validate_rules, $validate_messages);
    // }
    
}
