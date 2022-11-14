<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdminCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'admin:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command creates an Admin';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$validator = Validator::make([
			'name'     => $name = $this->ask('name ?'),
			'email'    => $email = $this->ask('email ?'),
			'password' => $password = $this->secret('password ?'),
		], [
			'name'     => 'required|min:2',
			'email'    => 'required|email',
			'password' => 'required|min:7',
		]);

		if ($validator->fails())
		{
			$this->info('Admin not created:');
			foreach ($validator->errors()->all() as $error)
			{
				$this->error($error);
			}
			return;
		}

		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => bcrypt($password),
		]);
		$this->info("Admin Successfully created: name:{$name}, email:{$email}, passwod:{$password}");
	}
}
