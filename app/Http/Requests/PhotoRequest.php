<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Message;

class PhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Message::where(['id' => $this->messages, 'user_id' => $this->user()->id])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:jpg,png,jpeg,bmp',
        ];
    }
}
