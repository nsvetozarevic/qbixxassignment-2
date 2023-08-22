<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Requests;

use Domain\Clients\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'items.*.type' => ['required', Rule::in(Item::ALLOWED_TYPES)],
            'items.*.title.en' => ['required', 'string'],
            'items.*.title.nl' => ['required', 'string'],
            'items.*.title.fr' => ['required', 'string'],
            'items.*.paragraph.en' => ['required', 'string'],
            'items.*.paragraph.nl' => ['required', 'string'],
            'items.*.paragraph.fr' => ['required', 'string'],
        ];
    }
}
