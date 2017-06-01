<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Input;
use App\CaseFile;
use App\Transactions;
use App\Properties;
use App\Clients;
use App\Definition;
use App\Correspondence;
use Session;
use Auth;


class CaseController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index()
	{
		$cases= CaseFile::orderBy('created_at', 'desc')->get();
		return view('cases.index', 	['cases'=> $cases]);	
	}

	public function create()	
	{
		$clients = Clients::pluck('client_name','client_id');
		$client_pte = Definition::where('type', '=', 3)->pluck('title','definition_id');
		$client_hdb = Definition::where('type', '=', 4)->pluck('title','definition_id');
		$client_other = Definition::where('type', '=', 5)->pluck('title','definition_id');
		$client_absd = Definition::where('type', '=', 6)->pluck('title','definition_id');
		$client_bank = Definition::where('type', '=', 7)->pluck('title','definition_id');
		$clients_data = Clients::all();
		return view('cases.create')
		->with('clients',$clients)
		->with('clients_data',$clients_data)
		->with('client_pte',$client_pte)
		->with('client_hdb',$client_hdb)
		->with('client_other',$client_other)
		->with('client_absd',$client_absd)
		->with('client_bank',$client_bank);
	}

	public function store(Request $request)
	{
		$case =  new CaseFile([
			'title' => $request->title,
			'property_address' => $request->property_address,
			]);	

		$case->save();


		$rows = $request->rows;

		foreach($rows as $key => $row) {

			$transaction = new Transactions([
				'client_id'=>$row['client_id'],
				]);
			$transaction->cases()->associate($case);


			$transaction->save();
		}
		$correspondence = new Correspondence([
			'customer_name'=>$request->customer_name,
			'customer_nric_passport_no'=>$request->customer_passport_no,
			'case_id'=>$request->case_id,
			'customer_email'=>$request->customer_email,
			'mailing_address'=>$request->mailing_address,
			'hdb'=>$request->hdb,
			'pte'=>$request->pte,
			'other'=>$request->other,
			'notes_first_call'=> $request->notes_first_call,
			'notes_date_time'=>$request->notes_date_time,
			'appointment_date'=>$request->appointment_date,
			'appointment_time'=>$request->appointment_time,
			'appointment_lawyer'=>$request->appointment_lawyer,
			]);
		$correspondence->cases()->associate($case);

		$correspondence->save();

		$property = new Properties([

			'option_date'=>$request->option_date,
			'purchase_date'=>$request->purchase_date,
			'due_date'=>$request->due_date,
			'case_id'=>$request->case_id,
			'absd_ssd'=>$request->absd,
			'bank'=>$request->bank,
			'bank_name'=>$request->bank_name,
			'bank_mobile'=>$request->bank_mobile,
			'agency'=>$request->agency,
			'agent_name'=>$request->agent_name,

			]);

		$property->cases()->associate($case);
		
		$property->save();


		return redirect('/cases');
	}

	public function view( $id, Request $request)
	{
		$case = CaseFile::find($id);
		return view('cases.view', ['case'=>$case]);

	}
	public function edit(Request $request, $id)
	{
		$case = CaseFile::find($id);
		$clients_data = Clients::pluck('client_name','client_id');
		$client_pte = Definition::where('type', '=', 3)->pluck('title','definition_id');
		$client_hdb = Definition::where('type', '=', 4)->pluck('title','definition_id');
		$client_other = Definition::where('type', '=', 5)->pluck('title','definition_id');
		$client_absd = Definition::where('type', '=', 6)->pluck('title','definition_id');
		$client_bank = Definition::where('type', '=', 7)->pluck('title','definition_id');
		return view('cases.edit', ['case'=>$case])
		->with('clients_data',$clients_data)
		->with('client_pte',$client_pte)
		->with('client_hdb',$client_hdb)
		->with('client_other',$client_other)
		->with('client_absd',$client_absd)
		->with('client_bank',$client_bank);
		
	}

	public function update(Request $request ,$id){


		$cases =CaseFile::find($id);
		$cases->title =  $request->title;
		$cases->property_address = $request->property_address;
		$cases->save();


		$rows = $request->rows;
		foreach($rows as $key => $row) {

			if(isset($row['transaction_id']) && $row['transaction_id']!="")
			{
				$transaction_id = $row['transaction_id'];
				$transaction = Transactions::find($transaction_id);
			//$transaction->name = $row['transaction_id'];
			}
			else{
				$transaction = new Transactions;
				$transaction->case_id =$id;
			}
			$transaction->name = $row['name'];
			$transaction->type = $row['type'];
			$transaction->nric_passport_no = $row['passport_no'];
			$transaction->mobile = $row['mobile'];
			$transaction->email = $row['email'];
			$transaction->role = $row['role'];
			$transaction->save();
		}


		$correspondence_id = $request->correspondence_id;
		$correspondence = Correspondence::find($correspondence_id);
		$correspondence->customer_name=$request->customer_name;
		$correspondence->customer_nric_passport_no=$request->customer_passport_no;
		$correspondence->customer_email=$request->customer_email;
		$correspondence->mailing_address=$request->mailing_address;
		$correspondence->hdb=$request->hdb;
		$correspondence->pte=$request->pte;
		$correspondence->other=$request->other;
		$correspondence->notes_first_call=$request->notes_first_call;
		$correspondence->notes_date_time=$request->notes_date_time;
		$correspondence->appointment_date=$request->appointment_date;
		$correspondence->appointment_time=$request->appointment_time;
		$correspondence->appointment_lawyer=$request->appointment_lawyer;

		$correspondence->save(); 


		$property_id = $request->property_id;
		$property= Properties::find($property_id);
		$property->option_date=$request->option_date;
		$property->purchase_date=$request->purchase_date;
		$property->due_date=$request->due_date;
		$property->absd_ssd=$request->absd;
		$property->bank=$request->bank;
		$property->bank_name=$request->bank_name;
		$property->bank_mobile=$request->bank_mobile;
		$property->agency=$request->agency;
		$property->agent_name=$request->agent_name;

		$property->save();

		return redirect('/cases');

	}

}
