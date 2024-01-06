<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = Route::current()->parameter('product');

        return [
            "code" => ['required', 'integer',Rule::unique('products', 'code')->ignore($product->id)],
            "name" => ['required', 'string'],
            "description"  => ['required', 'string'],
            "active"  => ['required', 'boolean'],
            "price"  => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'error'   => true,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
