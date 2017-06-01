<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionair extends Model
{
	protected $table = 'questionairs';

	protected $fillable = [
	'title',
	'user_id',
	'duration',
	'resumable',
	'status',
	];


	public function questions()
	{
		return $this->hasMany(addQuestion::class, 'questionair_id');
	}

}
