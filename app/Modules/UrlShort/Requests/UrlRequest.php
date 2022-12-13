<?php
declare(strict_types=1);

namespace App\Modules\UrlShort\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url_name' => ['required', 'url']
        ];
    }
}