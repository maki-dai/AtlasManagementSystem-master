<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Users\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

use App\Models\Users\Subjects;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function registerView()
    {
        // $subjects = Subjects::all();
        return view('auth.register.register');
        // compact('subjects')
    }

    public function registerPost(Request $request)
    {
        DB::beginTransaction();
        try{
            $old_year = $request->old_year;
            $old_month = $request->old_month;
            $old_day = $request->old_day;
            $data = $old_year . '-' . $old_month . '-' . $old_day;
            $birth_day = date('Y-m-d', strtotime($data));
            // $subjects = $request->subject;

            $user_get = User::create([
                'over_name' => $request->over_name,
                'under_name' => $request->under_name,
                'over_name_kana' => $request->over_name_kana,
                'under_name_kana' => $request->under_name_kana,
                'mail_address' => $request->mail_address,
                'sex' => $request->sex,
                'birth_day' => $birth_day,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ]);
            $user = User::findOrFail($user_get->id);
            // $user->subjects()->attach($subjects);
            DB::commit();
            return view('auth.login.login');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('loginView');
        }
    }
}

// フォームリクエストでのバリデーション
// over_name	"・必須項目
// ・文字列の型
// ・10文字以下"
// under_name	"・必須項目
// ・文字列の型
// ・10文字以下"
// over_name_kana	"・必須項目
// ・文字列の型
// ・カタカナのみ
// ・30文字以下"
// under_name_kana	"・必須項目
// ・文字列の型
// ・カタカナのみ
// ・30文字以下"
// mail_address	"・必須項目
// ・メールアドレスの形式
// ・登録済みのもの無効
// ・100文字以下"
// sex	"・必須項目
// ・男性、女性、その他以外無効"
// old_year	"・必須項目
// ・2000年1月1日から今日まで
// ・正しい日付かどうか（例:2/31や6/31はNG）"
// old_month
// old_day
// role	"・必須項目
// ・講師(国語)、講師(数学)、教師(英語)、生徒以外無効"
// password	"・必須項目
// ・8文字以上30文字以下
// ・確認用と同じかどうか"
