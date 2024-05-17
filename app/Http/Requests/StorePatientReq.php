<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientReq extends FormRequest
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
            'nik' => 'required|numeric|unique:patients',
            'kk' => 'required|numeric',
            'name' => 'required|string|max:200',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:100',
            'gender' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address_line' => 'required|string',
            'province_code' => 'required',
            'city_code' => 'required',
            'district_code' => 'required',
            'village_code' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'postal_code' => 'required|numeric',
            'marital_status' => 'required|string',
            'relationship_name' => 'nullable|string',
            'relationship_phone' => 'nullable|numeric',
        ];
    }
    // message
    public function messages()
    {
        return [
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'kk.required' => 'Nomor KK harus diisi',
            'name.required' => 'Nama harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'email.email' => 'Email tidak valid',
            'birth_place.required' => 'Tempat lahir harus diisi',
            'birth_date.required' => 'Tanggal lahir harus diisi',
            'birth_date.date' => 'Format tanggal lahir tidak valid',
            'address_line.required' => 'Alamat harus diisi',
            'province_code.required' => 'Provinsi harus diisi',
            'city_code.required' => 'Kota harus diisi',
            'district_code.required' => 'Kecamatan harus diisi',
            'village_code.required' => 'Kelurahan harus diisi',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'postal_code.required' => 'Kode pos harus diisi',
        ];
    }
}
