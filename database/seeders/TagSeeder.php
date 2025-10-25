<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['Fantastique', 'Policier', 'Horreur', 'Drame', 'Comédie', 'Action', 'Aventure']);

        $tags->each(fn ($tag) => Tag::create([
            'name' => $tag,
            'slug' => Str::slug($tag),
        ]));
    }
}
