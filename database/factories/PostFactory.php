<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    private function generatePlaceholdImage(string $sentence): string {
        $width = 640;   // fake()->numberBetween(600, 1200);
        $height = 480;  // fake()->numberBetween(400, 800);
        $backgroundColor = "EEE";
        $textColor = substr(fake()->hexColor(), 1);
        $font = 'lato';
        $wordsTableau = explode(' ', $sentence);  // Retourne un tableau de mots
        $firstWord = $wordsTableau[0];  // Premier mot seulement
        
        return "https://placehold.co/{$width}x{$height}/{$backgroundColor}/{$textColor}?font={$font}&text={$firstWord}";
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence;
        $content = fake()->paragraphs(asText: true);
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => Str::limit($content, 150),
            'content' => $content,
            'thumbnail' => $this->generatePlaceholdImage($title),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
