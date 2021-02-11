<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractRestController
{
    /** @var UserRepository */
    protected UserRepository $userRepository;

    /** @var Request */
    protected Request $request;

    public function __construct(UserRepository $abstractRepository, Request $request)
    {
        parent::__construct($abstractRepository, $request);
    }

    /**
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        $data = $this->request->all();
        $validator = Validator::make($data, $this->getValidationRules());

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data['password'] = Hash::make($data['password']);
        $model = $this->userRepository->create($data);

        if (!$model) {
            return new JsonResponse(['errors' => 'Model was not created'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($model->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function update(int $id): JsonResponse
    {
        $data = $this->request->all();
        $validator = Validator::make($data, $this->getValidationRules());

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data['password'] = Hash::make($data['password']);
        $model = $this->userRepository->update($id, $data);

        if (!$model) {
            return new JsonResponse(['errors' => 'Model was not updated.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($model->toArray());
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
}
