<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Movie;
use App\Models\Quote;
use App\Models\User;
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
		User::factory(50)->create();
		Movie::factory(50)->create();
		$id = 1;
		while ($id < 101)
		{
			Quote::factory(5)->create([
				'movie_id' => $id,
			]);
			$id++;
		}
	}
}
