<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostsController extends AbstractRestController
{
    public function __construct(PostRepository $postRepository, Request $request)
    {
        parent::__construct($postRepository, $request);
    }

    /**
     * @return string[]
     */
    protected function getValidationRules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required',
        ];
    }
}
