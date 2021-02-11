<?php

namespace Database\Factories;

/**
 * @global Factory $factory
 */

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                /** @var User $user */
                $user = User::factory()->create();
                return $user->id;
            },
            'title' => $this->faker->sentence($nbWords = 4),
            'content' => $this->faker->text($maxNbChars = 200),
            'created_at' => $this->faker->dateTime($max = 'now'),
            'updated_at' => $this->faker->dateTime($max = 'now'),
        ];
    }
}
