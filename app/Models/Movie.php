<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use HasFactory;

	public function index()
	{
	}

	public function quotes()
	{
		return $this->hasMany(Quote::class);
	}
}