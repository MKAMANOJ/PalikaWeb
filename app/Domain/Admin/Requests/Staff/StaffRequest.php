<?php

namespace App\Domain\Admin\Requests\Staff;


use App\EBP\Contracts\IFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest implements IFormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'           => 'required|min:3|max:50',
            'order'          => 'required|integer',
            'email'          => 'nullable|email',
            'image'          => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'personal_phone' => 'nullable|max:15',
            'office_phone'   => 'nullable|max:15',
        ];
    }
}