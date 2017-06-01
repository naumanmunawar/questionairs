<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addQuestion extends Model
{
	protected $table = 'add_questions';

	protected $fillable = [
	'questionair_id',
	'question',
	'answer',
	'choices',
	];


}
