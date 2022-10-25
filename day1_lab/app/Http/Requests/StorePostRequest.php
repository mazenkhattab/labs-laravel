<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        return [
            'title' => "required|unique:posts,title,{$this->post}",
            'description' => ['required', 'min:10'],
            'user_id'=> 'required|exists:users,id'
        ];
    }


     /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
           'title.required' => 'title required',
            'title.min' => 'min 3 chars',
            'title.unique'=> 'title taken choose another title',
            'description.required' => 'description required ',
            'description.min' => 'description min characters 10 ',
    ];
}
}
