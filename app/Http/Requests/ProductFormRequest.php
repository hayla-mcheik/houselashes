<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],  
            'slug' => [
                'required',
                'string'
            ],         
            'small_description' => [
                'required',
                'string',
         
            ],           
             'description' => [
                'required',
                'string',
           
            ],
            'original_price' => [
                'nullable',
                'integer',  
            ],  
             'selling_price' => [
                'required',
                'integer',  
            ],
            'quantity' => [
                'required',
                'integer',  
            ],
            'trending' => [
                'nullable', 
            ], 
             'status' => [
                'nullable', 
            ],  
             'meta_title' => [
                'required',
                'string',
                'max:255'  
            ],  
             'meta_keyword' => [
                'nullable',
                'string',
            ],
            'meta_description' => [
                'nullable',
                'string',
            ],
            'image' => [
                'nullable',

            ]


        ];
    }
}
