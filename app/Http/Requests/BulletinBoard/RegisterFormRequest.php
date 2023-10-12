<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          // 'over_name'=>'required|',
          // 'under_name'=>'required|',
          // 'over_name_kane'=>'required|',
          // 'under_name_kane'=>'required|',
          // 'mail_address'=>'required|',
          // 'sex'=>'required|',
          // 'old_year'=>'required|',
          // 'old_month'=>'required|',
          // 'old_day'=>'required|',
          // 'role'=>'required|',
          // 'password'=>'required|',
 ];
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



    public function messages(){
        return [

            // 'post_title.min' => 'タイトルは4文字以上入力してください。',
            // 'post_title.max' => 'タイトルは50文字以内で入力してください。',
            // 'post_body.min' => '内容は10文字以上入力してください。',
            // 'post_body.max' => '最大文字数は500文字です。',
        ];
    }
}
