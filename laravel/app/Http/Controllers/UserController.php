<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class UserController extends AbstractRestController
{
    public function __construct(UserRepository $userRepository, Request $request)
    {
        parent::__construct($userRepository, $request);
    }

    /**
     * @return string[]
     */
    protected function getValidationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * @return Closure[]
     */
    protected function getStoreRequestDataTransformers(): array
    {
        return $this->getPasswordTransformers();
    }

    /**
     * @return Closure[]
     */
    protected function getUpdateRequestDataTransformers(): array
    {
        return $this->getPasswordTransformers();
    }

    /**
     * @return Closure[]
     */
    protected function getPasswordTransformers(): array
    {
        return [
            'password' => function (string $password) {
                return Hash::make($password);
            }
        ];
    }
}
