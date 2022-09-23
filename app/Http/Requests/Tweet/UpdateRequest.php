<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // 値のバリデーションを行う　今回は必須項目、140文字の制限を設ける
        return [
            'tweet' => 'required|max:140',
            // 'name' => 'required'
        ];
    }

     // tweet()は任意かも?
    public function tweet(): string{

        // ツイートを取得する name属性を指定すれば読み取れる？
        return $this->input('tweet');
    }

    // public function test(): string{
    //     return $this->input('name');
    // }

    // urlの番号を取得する
    public function id(): int{
        return (int) $this->route('tweetId');
    }
}