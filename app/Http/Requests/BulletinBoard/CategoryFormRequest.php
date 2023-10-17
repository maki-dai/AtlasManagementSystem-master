<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'main_category' => 'required|string|max:100|unique:main_categories',
            // ※'main_category_id' => 'required| ',
            'sub_category' => 'required|string|max:100|unique:sub_categories',

//             main_category_name	"・必須項目
// ・100文字以内
// ・文字列型
// ・同じ名前のメインカテゴリーは登録できない"
// main_category_id	"・必須項目
// ・登録されているメインカテゴリーか"
// sub_category_name	"・必須項目
// ・100文字以内
// ・文字列型
// ・同じ名前のサブカテゴリーは登録できない"
        ];
    }

    public function messages(){
        return [
          'main_category.required'=>'メインカテゴリーは必須項目です。',
          'main_category.string'=>'メインカテゴリーは文字列型で入力してください。',
          'main_category.max'=>'メインカテゴリーは100文字以内で入力してください。',
          'main_category.unique'=>'このメインカテゴリーは既に登録されています',

          // ※'main_category_id.required'=>'',
          // 'main_category_id.'=>'',

          'sub_category.required'=>'サブカテゴリーは必須項目です。',
          'sub_category.string'=>'サブカテゴリーは文字列型で入力してください。',
          'sub_category.max'=>'サブカテゴリーは100文字以内で入力してください。',
          'sub_category.unique'=>'このサブカテゴリーは既に登録されています',

        ];
    }
}
