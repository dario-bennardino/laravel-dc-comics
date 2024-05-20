<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' =>  'required|min:3|max:120',
            'description' => 'nullable',
            'thumb' => 'nullable',
            'price' =>  'required|min:2|max:10',
            'series' =>  'nullable|min:3|max:60',
            'sale_date' =>  'required|date',
            'type' =>  'required|min:3|max:60',
            'artists' =>  'required',
            'writers' =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo deve contenere non più di :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.min' => 'Il prezzo deve contenere almeno :min caratteri',
            'price.max' => 'Il prezzo deve contenere non più di :max caratteri',
            'series.min' => 'La serie deve contenere almeno :min caratteri',
            'series.max' => 'La serie deve contenere non più di :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.date' => 'La data deve essere formato date',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.min' => 'Il tipo deve contenere almeno :min caratteri',
            'type.max' => 'Il tipo deve contenere non più di :max caratteri',
            'artists.required' => 'Artisti è un campo obbligatorio',
            'writers.required' => 'Scrittori è un campo obbligatorio',

        ];
    }
}
