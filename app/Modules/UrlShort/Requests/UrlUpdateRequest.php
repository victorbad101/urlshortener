<?php
declare(strict_types=1);

namespace App\Modules\UrlShort\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => ['required', 'unique:urls']
        ];
    }
}