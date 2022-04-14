<?php

namespace App\Rules\Api;

use Illuminate\Contracts\Validation\Rule;
use App\Services\Api\SignService;

class SignRule implements Rule
{
    protected $SignService;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->SignService = app(SignService::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->SignService->validate(request()->all());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute incorrect';
    }
}
