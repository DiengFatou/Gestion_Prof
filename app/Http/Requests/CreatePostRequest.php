<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'specialite' => 'required'


        ];
    }

    public function failedValidation(Validator $validator)
    {
        // Renvoie une réponse JSON contenant les erreurs de validation
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation',
            'errorList' => $validator->errors()
        ]));

    }
    public function messages() {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'prenom.required'=> 'Le prenom est obligatoire',
            'email.required'=> 'L\'email est obligatoire',
            'telephone.required'=> 'Le telephone est obligatoire',
            'specialite.required'=> 'L\'specialite est obligatoire',
        ];
    }
}
