<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePCRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set ke true jika semua user diizinkan untuk menyimpan PC
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255', // Nama PC wajib diisi, tidak boleh lebih dari 255 karakter
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama PC wajib diisi.',
            'nama.string' => 'Nama PC harus berupa string.',
            'nama.max' => 'Nama PC tidak boleh lebih dari 255 karakter.',
        ];
    }
}
