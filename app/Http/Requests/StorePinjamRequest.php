<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePinjamRequest extends FormRequest
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
        return [
            //
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'pc_id' => 'required|exists:pcs,id', // Pastikan pc_id valid dan ada di tabel pcs
            'kelengkapan' => 'required|exists:kelengkapan',
            'tanggalPinjam' => 'required|date',
            'tanggalKembali' => 'nullable|date|after_or_equal:tanggalPinjam',
        ];
    }
}
