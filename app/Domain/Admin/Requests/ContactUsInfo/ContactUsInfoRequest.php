<?php

namespace App\Domain\Admin\Requests\ContactUsInfo;

use App\EBP\Contracts\IFormRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactUsRequest
 * @package App\Domain\Front\Requests
 */
class ContactUsInfoRequest extends FormRequest implements IFormRequest
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
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "title"  => 'required|max:100|min:2',
            "email"  => 'nullable|email',
            "phone1" => 'nullable|min:3|max:15',
            "phone2" => 'nullable|min:3|max:15',
            "fax"    => 'nullable|min:3|max:15',
        ];
    }
}
