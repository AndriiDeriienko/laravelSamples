<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostsController extends AbstractRestController
{
    /** @var PostRepository */
    protected PostRepository $postRepository;

    /** @var Request */
    protected Request $request;

    public function __construct(PostRepository $abstractRepository, Request $request)
    {
        parent::__construct($abstractRepository, $request);
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
