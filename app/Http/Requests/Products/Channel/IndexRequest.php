<?php

namespace App\Http\Requests\Products\Channel;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class IndexRequest extends BasicFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'products_id'   =>  ['required','numeric','exists:products,id'],
        ];
    }
}
