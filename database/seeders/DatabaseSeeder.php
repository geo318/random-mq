<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Quote::factory(50)->create();
		$movies = Movie::factory(50)->create();

		foreach ($movies as $movie)
		{
			Quote::factory(rand(1, 10))->create([
				'movie_id' => $movie->id,
			]);
		}
	}
}
