@extends('layouts.app')
@section('title') Add Questions
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
        <section class="panel">
          <header class="panel-heading">
           Add Questions
         </header>
         <div class="panel-body">
           <form class="form-horizontal" id="" action="{{url('/question/store')}}" method="POST">
             {{ csrf_field() }}
             <input type="hidden" name="questionair_id" value="{{$questionair_id}}">
             <div id="questionadd">
             </div>

             <div class="form-group">
              <div class="col-md-6">
                <a onclick="add_qst_row(this)" id="addquestion" class="add_more btn btn-primary" >Add Questions</a>
                <button type="submit" class="btn btn-primary">Save</button> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

  $(document).ready(function()
  {

    $('#this_text').click();
    $('#question_option option:first').attr('selected', 'selected');

  });

  $('#this_text').on("click", function(){
    $('.show_text').show();
    $('.show_single').hide();
    $('.show_multiple').hide();
  });

  $('#this_single').on("click", function(){
    $('.show_text').hide();
    $('.show_single').show();
    $('.show_multiple').hide();
  });

  $('#this_multiple').on("click", function(){
    $('.show_text').hide();
    $('.show_single').hide();
    $('.show_multiple').show();
  });


  total_qst=0;
  rows =1;
  function add_qst_row(obj){
    question = '<select class="form-control que" id="question_option_#rows#">\
    <option id="this_text">Text</option>\
    <option  id="this_single">Multiple Choice (Single Option)</option>\
    <option id="this_multiple" >Multiple Choice (Multiple Option)</option>\
  </select>';
  question = question.replace(new RegExp('#rows#', 'g'), rows);


  question_type = '<div class="form-group que" id="question_type_#rows#"></div>';
  question_type = question_type.replace(new RegExp('#rows#', 'g'), rows); 

  html = '<div class="form-horizontal">\
  <div class="form-group">\
    <label for="name" class="col-md-2 control-label">Question type</label>\
    <div class="col-md-6">\
      '+question+'\
    </div>\
  </div>'+question_type+'\
</div>\
';

if(total_qst!=1)
  html+= "";
$('#questionadd').append(html);
rows++;
}

$('#addquestion').click();

$(document).on('change','.que', function(){

  var queID= $(this).attr('id').split('_');
  var selected = $(this).find(":selected").text();
  var row =1
  switch (selected){
    case 'Text':
    $('#question_type_'+queID[2]).html('<div class="col-md-12"><div class="form-group">\
      <label for="Description" class="col-md-2 control-label">Question</label>\
      <div class="col-md-6">\
        <input type="text" class="form-control" name="row['+queID[2]+'][question]" placeholder="Enter Question" required="">\
      </div>\
      <div class="col-md-2">\
        <label class="que_check" onclick="deleteQuestion(this)" id="delQues"> Delete Question </label>\
      </div>\
    </div>\
    <div class="form-group">\
      <label for="Description" class="col-md-2 control-label">Answer</label>\
      <div class="col-md-6">\
        <input type="text" class="form-control" name="row['+queID[2]+'][answer]" placeholder="Answer" required="">\
      </div>\
    </div>\
  </div>\
  ');
    break;
    case 'Multiple Choice (Single Option)':
    $('#question_type_'+queID[2]).html('<div class="col-md-12><div class="form-group">\
      <label for="Description" class="col-md-2 control-label">Question</label>\
      <div class="col-md-6">\
        <input type="text" class="form-control" name="row['+queID[2]+'][question]" placeholder="Enter Question" required="">\
      </div>\
      <div class="col-md-2">\
        <label class="que_check" onclick="deleteQuestion(this)" id="delQues"> Delete Question</label>\
      </div>\
    </div>\
    <div class="col-md-12"><div class="form-group">\
      <label for="Description" class="col-md-2 control-label">Choice 1</label>\
      <div class="col-md-6">\
        <input type="text" class="form-control" name="row['+queID[2]+'][choices][0]" placeholder="Enter Choice">\
      </div>\
      <div class="col-md-2">\
       <input type="checkbox" class="que_check" name="row['+queID[2]+'][checked][0]"> Correct?\
     </div>\
   </div>\
   <div class="col-md-12" id="addChoice">\
   </div>\
   <div class="form-group"><div class="col-md-2">\
     <a onclick="remove_choice(this)" id="remove_choice"> Delete choice </a>\
     <a onclick="addChoice(this)" id="add_choice"> Add choice </a>\
   </div>\
 </div>\
</div>\
');
    break;
    case 'Multiple Choice (Multiple Option)':
    $('#question_type_'+queID[2]).html('<div class="col-md-12>\
      <div class="form-group">\
        <label for="Description" class="col-md-2 control-label">Question</label>\
        <div class="col-md-6">\
          <input type="text" class="form-control" name="row['+queID[2]+'][question]" placeholder="Enter Question" required="">\
        </div>\
        <div class="col-md-2">\
          <label class="que_check" onclick="deleteQuestion(this)" id="delQues"> Delete Question</label>\
        </div>\
      </div>\
      <div class="col-md-12"><div class="form-group">\
        <label for="Description" class="col-md-2 control-label">Choice 1</label>\
        <div class="col-md-6">\
          <input type="text" class="form-control" name="row['+queID[2]+'][choices][0]" placeholder="Enter Choice">\
        </div>\
        <div class="col-md-2">\
         <input type="checkbox" class="que_check" name="row['+queID[2]+'][checked][0]"> Correct?\
       </div>\
     </div>\
     <div class="col-md-12" id="addChoice">\
     </div>\
     <div class="form-group"><div class="col-md-2">\
       <a onclick="remove_choice(this)"> Delete choice </a>\
       <a onclick="addChoice(this)" id="add_choice"> Add choice </a>\
       \
     </div>\
   </div>\
 </div>\
 ');
    break;
  }
});

</script>


<script>
  function deleteQuestion(){
    $('#delQues').parent().parent().parent().parent().remove();
  }
  function remove_choice(){
    $('#remove_choice').parent().parent().last().remove();
  }
</script>

<script>

 var val = 1;

// var QueID = $(id).attr('id');

function addChoice(obj){
  var some =   $('.apend_choice').parent().parent().parent().parent().attr('id');
  console.log(some);

  html = '<div class="form-group">\
  <label for="Description" class="col-md-2 control-label">Choice</label>\
  <div class="col-md-6">\
    <input type="text" class="form-control apend_choice" name="row[1][choices]['+val+']" placeholder="Enter Choice">\
  </div>\
  <div class="col-md-2">\
   <input type="checkbox" class="que_check" name="row[1][checked]['+val+']"> Correct?\
 </div>';
 $('#addChoice').append(html);
 val++;

}
</script>



<script type="text/javascript">

  $('#submit_text').on("click", function(){

    $.ajax({
      url: "{{ url('questionairs/add') }}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
      data: $('#text_form').serialize(),
      dataType: 'html',
      type: "POST",

      success: function(responseData){  
        window.location.replace('{{url('/questionairs')}}')
      }
    });

  });

  $('#submit_single').on("click", function(){

    $.ajax({
      url: "{{ url('questionairs/add') }}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
      data: $('#single_form').serialize(),
      dataType: 'html',
      type: "POST",

      success: function(responseData){  
        window.location.replace('{{url('/questionairs')}}')
      }
    });

  });
</script>

@stop
