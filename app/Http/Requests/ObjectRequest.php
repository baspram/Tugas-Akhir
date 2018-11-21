<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ObjectRequest extends Request
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
            'object_id' => 'required|unique:objects,object_id',
            'name' => 'required|min:3',
            'availability' => 'required',
            'duration' => 'required',
            'content' => 'required'
        ];
    }
}
