<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Questionair;
use App\addQuestion ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;

class QuestionairController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$questionairs = Questionair::orderBy('created_at', 'desc')->get();
		return view('questionairs.index', ['questionairs'=>$questionairs]);
	}

	public function create(){
		return view('questionairs.create');
	}

	public function store(Request $request)
	{

		$duration_value = $request->duration;
		$duration = ""; 
		if(is_array($duration_value))
			$duration = implode('-' , $duration_value);
		$questionairs =  new Questionair([
			'user_id' => Auth::user()->id,
			'title' => $request->title,
			'duration' => $duration,
			'resumable' => $request->resumable,
			]);	

		$questionairs->save();

		return redirect('/questionairs');

	}

	public function edit($id)
	{
		$questionair = Questionair::find($id);
		return view('questionairs.edit', ['questionair'=>$questionair]);
	}

	public function update(Request $request, $id){

		$duration_value = $request->duration;
		$duration = ""; 
		if(is_array($duration_value))
			$duration = implode('-' , $duration_value);

		$questionair = Questionair::find($id);
		$questionair->title =  $request->title;
		$questionair->duration =  $duration;
		$questionair->resumable =  $request->resumable;
		$questionair->save();

		return redirect('/questionairs');
	}

	public function approve($id)
	{

		$categories = Category::find($id);
		$categories->status = Input::get('status');
		$categories->save();
		return redirect('/categories');

	}

	public function delete($id)
	{
		$questionair = Questionair::where('id', $id)->first()->delete();
		return redirect('/questionairs');
	}


	//add questionair

	public function add($id)
	{
		return view('questionairs.addmode', ['questionair_id' => $id]);

	}

	public function add_post(Request $request)
	{
		if($request->choices)
		{
			$choices_value = $request->choices;
			$choices = ""; 
			if(is_array($choices_value))
				$choices = implode('-' , $choices_value);
			$questions =  new addQuestion([

				'questionair_id' => $request->questionair_id,
				'question' => $request->question,
				'answer' => $request->answer,
				'choices' => $choices,

				]);	
		}

		else
		{
			$questions =  new addQuestion([

				'questionair_id' => $request->questionair_id,
				'question' => $request->question,
				'answer' => $request->answer,

				]);	
		}

		$questions->save();

		return ['status' => "string"];

	}

	public function storeQuestion(Request $request)
	{
		//return view('questionairs.addmode', ['questionair_id' => $id]);
		$rows=$request->row;
		foreach ($rows as  $row) {
			if(isset($row['question'])){
				$question = $row['question'];
			}
			else{
				$question = "";	
			}
			if(isset($row['answer'])){
				$answers = $row['answer'];
			}
			else{
				$answers = "";
			}
			if(isset($row['choices'])){
				$choice = $row['choices'];
				$choices = implode('-', $choice);
			}
			else{
				$choices = "";	
			}
			if(isset($row['checked'])){
				$check = $row['checked'];
				$checked = implode('-', $check);

			}
			else{
				$checked = "";
			}
			$questions =  new addQuestion([
				'questionair_id' => $request->questionair_id,
				'question' => $question,
				'answer' => $answers,	
				'choices' => $choices,	
				'checked' => $checked,	
				]);	
			$questions->save();

		}
		return redirect('questionairs');
	}

}
