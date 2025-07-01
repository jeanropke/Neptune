<?php

namespace App\Http\Requests\Housekeeping;

use App\Models\Catalogue\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class WebOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'salecode'  => 'required|string|max:255',
            'name'      => 'required|string|max:255',
            'item_ids'  => 'required|string',
            'price'     => 'required|numeric|min:0',
            'enabled'   => 'required|in:0,1',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $itemIds = explode(';', $this->input('item_ids'));
            $uniqueItemIds = array_unique($itemIds);

            $foundCount = Item::whereIn('id', $uniqueItemIds)->count();

            if ($foundCount !== count($uniqueItemIds)) {
                $validator->errors()->add('item_ids', 'One or more Catalogue Item IDs not found!');
            }
        });
    }
}
