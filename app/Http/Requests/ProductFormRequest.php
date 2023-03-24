<?php

namespace App\Http\Requests;

use App\Models\ProductImage;
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => ['string', 'required'],
            'category_id' => ['integer', 'required'],
            'brand_id' => ['integer', 'required'],
            'price' => ['integer', 'required'],
            'selling_price' => ['integer', 'nullable'],
            'quantity' => ['integer', 'required'],
            'description' => ['string', 'required'],
            'small_description' => ['string', 'required'],
            'image' => ['nullable',]
        ];
    }

    
}
