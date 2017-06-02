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

           <div class="form-horizontal">
            <div class="form-group">
              <label for="name" class="col-md-2 control-label">Question type</label>

              <div class="col-md-6">
                <select class="form-control" id="question_option">

                  <option id="this_text">Text</option>
                  <option  id="this_single">Multiple Choice (Single Option)</option>
                  <option id="this_multiple" >Multiple Choice (Multiple Option)</option>

                </select>
              </div>
            </div>
          </div>

          <div class="show_text">
            <form class="form-horizontal" id="text_form">
              <input type="hidden" name="questionair_id" value="{{$questionair_id}}">
              <div class="form-group">
                <label for="Description" class="col-md-2 control-label">Question</label>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="question" placeholder="Enter Question" required="">
                </div>

                <div class="col-md-2">
                  <label class="que_check"> Delete Question </label>
                </div>
              </div>

              <div class="form-group">
                <label for="Description" class="col-md-2 control-label">Answer</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="answer" placeholder="Enter Answer" required="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                  <a id="submit_text" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Save
                  </a>
                </div>
              </div>

            </form>
          </div>

          <div class="show_single">
           <form class="form-horizontal" id="single_form">
            <input type="hidden" name="questionair_id" value="{{$questionair_id}}">
            <div class="form-group">
              <label for="Description" class="col-md-2 control-label">Question</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="question" placeholder="Enter Question" required="">
              </div>

              <div class="col-md-2">
                <label class="que_check"> Delete Question </label>
              </div>

            </div>

            <div class="form-group">
              <label for="Description" class="col-md-2 control-label">Choice 1</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="choices[]" placeholder="Enter Choice">
              </div>
              <div class="col-md-2">
               <input type="checkbox" class="que_check" name="checked[]"> Correct?
             </div>

           </div>

           <div class="form-group">
            <label for="Description" class="col-md-2 control-label">Choice 2</label>

            <div class="col-md-6">
             <input type="text" class="form-control" name="choices[]" placeholder="Enter Choice">
           </div>
           <div class="col-md-2">
             <input type="checkbox" class="que_check" name="checked[]"> Correct?
           </div>

           <div class="col-md-2 que_check">
             <a onclick="remove_choice(this)"> Delete choice </a>
           </div>

         </div>

         <div class="mcqadd"></div>

         <div class="form-group">
          <div class="col-md-2">
          </div>
          <div class="col-md-6">
            <a onclick="add_mcq_row(this)" class="add_more">Add choice </a>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-2">
            <a id="submit_single" class="btn btn-primary">
              <i class="fa fa-btn fa-user"></i> Save
            </a>
          </div>
        </div>

      </form>
    </div>


    <div class="show_multiple">
     <form class="form-horizontal" id="multiple_form">
      <div class="form-group">
        <label for="Description" class="col-md-2 control-label">Question</label>

        <div class="col-md-6">
          <input type="text" class="form-control" name="question" placeholder="Enter Question" required="">
        </div>


        <div class="col-md-2">
          <label class="que_check"> Delete Question </label>
        </div>

      </div>

      <div class="form-group">
        <label for="Description" class="col-md-2 control-label">Choice 1</label>

        <div class="col-md-6">
         <input type="text" class="form-control" name="answer" placeholder="Enter Choice">
       </div>
       <div class="col-md-2">
         <input type="checkbox" class="que_check" name="checked[]"> Correct?
       </div>

     </div>


     <div class="form-group">
       <label for="Description" class="col-md-2 control-label">Choice 2</label>

       <div class="col-md-6">
         <input type="text" class="form-control" name="answer" placeholder="Enter Choice">
       </div>
       <div class="col-md-2">
         <input type="checkbox" class="que_check" name="checked[]"> Correct?
       </div>

       <div class="col-md-2 que_check">
         <a onclick="remove_choice(this)"> Delete choice </a>
       </div>

     </div>

     <div class="mcqadd"></div>
     <div class="form-group">
      <div class="col-md-6">
        <a onclick="add_mcq_row(this)" class="add_more">Add choice </a>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
        <a id="submit_multiple" class="btn btn-primary">
          <i class="fa fa-btn fa-user"></i> Save
        </a>
      </div>
    </div>

  </form>
</div>

<div id="questionadd">

</div>

<div class="form-group">
  <div class="col-md-6">
    <a onclick="add_qst_row(this)" class="add_more">Add Questions</a>
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
  function add_qst_row(obj){
    total_qst++;

    parentLotNo = '<input id="name" type="text" class="form-control" name="Lotrows[#rows#][parentLotNO]" value="">';
    parentLotNo = parentLotNo.replace(new RegExp('#rows#', 'g'), rows); 

    html = '<div class="form-horizontal">\
    <div class="form-group">\
      <label for="name" class="col-md-2 control-label">Question type</label>\
      <div class="col-md-6">\
        <select class="form-control" id="question_option">\
          <option id="this_text">Text</option>\
          <option  id="this_single">Multiple Choice (Single Option)</option>\
          <option id="this_multiple" >Multiple Choice (Multiple Option)</option>\
        </select>\
      </div>\
    </div>\
  </div>\
  ';
  if(total_qst!=1)
    html+= "";
  $('#questionadd').append(html);

}


total_mcqs=0;
var add_choice = 2;
function add_mcq_row(obj){
  total_mcqs++;
  add_choice++;
  html = '  <div class="form-group">\
  <label for="Description" class="col-md-2 control-label">Choice '+add_choice+'</label>\
  <div class="col-md-6">\
    <input type="text" class="form-control" name="choices[]" placeholder="Enter Choice">\
  </div>\
  <div class="col-md-2">\
   <input type="checkbox" class="que_check" name="checked[]"> Correct?\
 </div>\
 <div class="col-md-2 que_check">\
   <a onclick="remove_choice(this)"> Delete choice </a>\
 </div>\
</div>\
';
if(total_mcqs!=1)
  html+= "";
$('.mcqadd').append(html);

}



function remove_choice(obj){

  $(obj).parent().parent().remove(); 

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
