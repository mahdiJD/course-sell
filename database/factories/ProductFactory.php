<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lang = [
            'php',
            'js',
            'python',
            'java',
            'css',
            'html',
            'bash',
            'linux',
            'laravel',
            'wordpres',
        ];
        $description = self::randomSentence(rand(6,16));
        $bio = self::randomSentence(rand(2,5));
        $name = $lang[array_rand($lang)];
        $user = User::count();
        return [
            'name' => $name,
            'slug' => 'دوره اموزشی' . $name . rand(1,100),
            'description' => $description,
            'published_at' => date('m/d/y,h:m:sa'),
            'bio' => $bio,
            'file' => 'form-attachments/'.rand(1,13).'.jpg',
            'price' => rand(500,1_000_000),
            'user_id' => $user && rand(1,3) > 2 ? User::find(rand(1,$user)) : User::factory(),
        ];
    }
    public function randomSentence($lenth){
        $sentence = '';
        for($i = 0;$i< $lenth;$i++)
            $sentence .= fake()->sentence();
        return $sentence;
    }
}
