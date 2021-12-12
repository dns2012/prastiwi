<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
            'price'         => ['required', 'integer'],
            'fake_price'    => ['required', 'integer'],
            'images'        => ['required'],
            'images.*'      => ['image', 'mimes:jpeg,jpg,png,webp', 'max:3072']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required'      => ':attribute diwajibkan.',
            'string'        => ':attribute hanya berupa Abjad, Angka, dan Simbol.',
            'integer'       => ':attribute hanya berupa Angka.',
            'name.max'      => ':attribute maksimal 255 karakter.',
            'image'         => 'file hanya berupa gambar.',
            'mimes'         => 'file hanya berupa gambar dengan format jpeg, jpg, png, dan webp.',
            'images.*.max'  => 'ukuran tiap file maksimal 3MB',
        ];
    }
}
