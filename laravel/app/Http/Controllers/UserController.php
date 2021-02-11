<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Services\UserValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function userToArray(Request $request): array
    {
        return [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'email_verified_at' => (string)Carbon::now(),
            'created_at' => (string)Carbon::now(),
            'updated_at' =>(string)Carbon::now(),
        ];
    }
    /**
     * @todo: add paginate
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->userRepository->all();

        return new JsonResponse($users->toArray());
    }

    /**
     * @param Request $request
     * @param UserValidator $storeUserValidator
     * @return JsonResponse
     */
    public function store(Request $request, UserValidator $storeUserValidator): JsonResponse
    {
        $userData = [
            'name' => (string)$request->get('name'),
            'email' => (string)$request->get('email'),
            'password' => Hash::make($request->get('password')),
        ];
        try {
            $userData = $storeUserValidator->validate();
        } catch (ValidationException $e) {
            return new JsonResponse($e->errors());
        }

        $created = $this->userRepository->create($userData);

        if (is_null($created)) {
            return new JsonResponse(['errors' =>'User was not created']);
        }

        return new JsonResponse($created);
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
            return new JsonResponse(['errors' => 'User not found']);
        }


        return new JsonResponse($user);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $decodePassword = Hash::make($request->get('password'));
        $userData = [
            'name' => (string)$request->get('name'),
            'email' => (string)$request->get('email'),
            'password' => (string)$decodePassword,
        ];
        $updated = $this->userRepository->update($id, $userData);

        if (!$updated) {
            return new JsonResponse(['errors' =>'User was not updated.']);
        }

        return new JsonResponse(['message' => 'User updated']);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $deletedUser = $this->userRepository->find($id);

        if (!$deletedUser) {
            return new JsonResponse(['errors' => 'User not found']);
        }

        return new JsonResponse(['message' => 'User deleted successfully']);
    }
}
