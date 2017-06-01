@extends('layouts.app')
@section('title') All Questionairs 
@stop
@section('sidebar')
@include('layouts.sidebar')
@endsection



@section('content')
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				@if (count($questionairs) > 0)
				<section class="panel">
					<header class="panel-heading">
						Questionairs Details
					</header>
					<div class="panel-body">
						<table class="table table-striped task-table">

							<!-- Table Headings -->
							<thead>
								<th>Name</th>                              
								<th>Numbers of Questions</th>                              
								<th>Duration</th>
								<th>Resumable</th>
								<th>Published</th>
								<th>Action</th>
								
							</thead>

							<!-- Table Body -->
							<tbody>
								@foreach ($questionairs as $question)
								<tr>
									<!-- inventory Detail -->
									<td class="table-text">
										<div>{{ $question->title }}</div>
									</td>

									<td class="table-text">
										@foreach($question->questions as $all_questions)

										{{$all_questions->id}}

										@endforeach
										|
										<a href="{{url('/questionairs/add/'.$question->id)}}">Add</a>
									</td>

									<td class="table-text">
										<div>{{ $question->duration }}</div>
									</td>

									<td class="table-text">
										<div>{{ $question->resumable }}</div>
									</td>

									@if ( $question->status  == 0)
									<td class="table-text">
										Yes
										<a href="{{ url('/questionairs/'.$question->id) }}?status=1" class="btn red_clr btn-sm"><i class="fa fa-times" title="hide"></i></a>
									</td>

									@else
									<td class="table-text">
										No
										<a href="{{ url('/questionairs/'.$question->id) }}?status=0"  class="btn green_clr btn-sm"><i class="fa fa-check" title="approve"></i></a>
									</td>
									@endif 

									<td class="table-text">
										<div>
											<a href="{{ url('/questionairs/edit/'.$question->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" title="Edit"></i> Edit</a>&nbsp;
											|
											<a href="{{ url('/questionairs/delete/'.$question->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" title="Delete"></i> Delete</a>&nbsp;
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				

				@else
				<section class="panel">
					<header class="panel-heading">
						Nothing to Show
					</header>
				</section>
				@endif
			</div>
		</section>
	</section>
</section>
@endsection

@section('script')

<script type="text/javascript">
	
	function delete_msg(obj){
		//alert(id);

		$('#delete_id').val($(obj).data('id'));
	}

</script>


@stop







