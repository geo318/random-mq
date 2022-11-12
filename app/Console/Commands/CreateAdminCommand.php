<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'admin:create {name} {email} {password}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command creates an Admin; command looks like this: php artisan admin:create {user} {email} {password}';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$name = $this->argument(key:'name');
		$email = $this->argument(key:'email');
		$password = $this->argument(key:'password');
		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => bcrypt($password),
		]);
		$this->info(string:"Admin Successfully created: name:{$name} , email:{$email} , passwod:{$password}");
	}
}