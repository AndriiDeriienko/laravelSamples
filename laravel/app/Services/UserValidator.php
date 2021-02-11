<?php

namespace App\Services;

class UserValidator extends AbstractValidator
{
    /**
     * @return array
     */
    public function getRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|required',
        ];
    }
}
