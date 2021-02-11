<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /** @var UserRepository */
    private UserRepository $userRepository;

    /** @var Request */
    private Request $request;

    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $validator = Validator::make($this->request->all(), [
            'sort_field' => 'nullable|string',
            'sort_direction' => 'nullable|string',
            'last_displayed_id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['errors' => 'Invalid data'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $sortField = $this->request->input('sort_field', null);
        $sortDirection = $this->request->input('sort_direction', null);
        $lastDisplayedId = (int)$this->request->input('last_displayed_id', 0);

        $users = $this->userRepository->sortAndPaginate($sortField, $sortDirection, $lastDisplayedId);

        return new JsonResponse($users);
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
        $user = $this->userRepository->create($data);

        if (!$user) {
            return new JsonResponse(['errors' => 'User was not created'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($user->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->userRepository->find($id);

        if (!$user) {
            return new JsonResponse(['errors' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($user->toArray());
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
        $user = $this->userRepository->update($id, $data);

        if (!$user) {
            return new JsonResponse(['errors' => 'User was not updated.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse($user->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $deleted = $this->userRepository->delete($id);

        if (!$deleted) {
            return new JsonResponse(['errors' => 'User was not deleted'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse(['message' => 'User was deleted successfully']);
    }

    /**
     * @return string[]
     */
    private function getValidationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}
