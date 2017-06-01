@extends('layouts.app')
@section('title') Case
@stop
@section('sidebar')
@include('layouts.sidebar')
@endsection


@section('content')
<section id="main-content">
    <div class="wrapper">
        {!! Form::open(['url'=>'/cases/create/','role'=>'form','class'=>'form-horizontal']) !!}
        <!-- page start-->
        <div class="row">
           <!--  <div class="col-lg-12">
               <section class="panel">
                   <header class="panel-heading">
                       Case Title :
                   </header>
               </section>
           </div> -->
       </div>
       <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Case Trasaction General Information 
                </header>
                <div  class="panel-body">

                    <div  id="question" >
                        <input type="hidden" name="case_id" value="">
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Case Title</label>
                            <div class="col-md-10">
                                <input id="name" type="title" class="form-control" name="title" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Property Address:</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="property_address" value="" required>
                            </div>
                        </div>
                        <div id="form-group">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="name" class="control-label">Name</label>
                                    {!! Form::select('rows[0][name]',$clients,'',['class'=>'form-control','id'=>'name_0','onchange'=>'client(this)']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label for="name" class="control-label">Type</label>
                                    {!! Form::select('rows[0][type]',App\CaseFile::$trans_type,'',['class'=>'form-control','id'=>'type_0']) !!}    
                                </div>

                                <div class="col-md-2">
                                    <label for="name" class="control-label">NRIC/Passport</label>
                                    <input id="type_0" type="text" class="form-control" name="rows[0][passport_no]" value="" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="name" class="control-label">Mobile</label>
                                    <input id="mobile_0" type="text" class="form-control" name="rows[0][mobile]" value="" required>
                                </div>


                                <div class="col-md-2">
                                    <label for="name" class="control-label">Email</label>
                                    <input id="email_0" type="text" class="form-control" name="rows[0][email]" value="" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="name" class="control-label">Assigned Role</label>
                                    {!! Form::select('rows[0][role]',App\CaseFile::$trans_role,'',['class'=>'form-control','id'=>'role_0']) !!}  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a id="addFiles" class="btn btn-primary  btn-style1">Add More</a>
                            <a id="removeField" class="btn btn-danger" type="button" onclick="remove_row(this)">Last Remove</a>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Correspondence Information -->
    <div class="row">
        <div class="col-md-8">
         <section class="panel">
            <header class="panel-heading">
                Correspondence Information:
            </header>
            <div  class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-3">Customer Name:</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="customer_name" value="" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-3">Customer NRIC/Passport:</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="customer_passport_no" value="" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-3">Customer Email:</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="customer_email" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-3">Mailing Address:</label>
                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control" name="mailing_address" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-3">Transaction type:</label>
                        <div class="col-md-3">
                            {!! Form::select('pte',App\CaseFile::$trans_type_pte,'',['class'=>'form-control']) !!}   
                        </div>
                        <div class="col-md-3">
                            {!! Form::select('hdb',App\CaseFile::$trans_type_hdb,'',['class'=>'form-control']) !!}    
                        </div>

                        <div class="col-md-3">
                            {!! Form::select('other',App\CaseFile::$trans_type_other,'',['class'=>'form-control']) !!} 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <!-- Internel Notes -->
        <div class="row">
            <div class="col-md-12">
             <section class="panel">
                <header class="panel-heading">
                    Internal Notes:
                </header>
                <div  class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label col-md-4">First Call</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="notes_first_call" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="name" class="control-label col-md-4">Date & Time:</label>
                            <div class="col-md-8">
                                <input id="datepicker" type="text" class="form-control" name="notes_date_time" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Appointment Content -->
        <div class="col-md-12">

           <section class="panel">
            <header class="panel-heading">
                Appointment Confirm Fix on:
            </header>
            <div  class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-4">Date:</label>
                        <div class="col-md-8">
                            <input id="appointment_date" type="text" class="form-control" name="appointment_date" value="" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-4">Time:</label>
                        <div class="col-md-8">
                            <input id="appointment_time" type="text" class="form-control" name="appointment_time" value="" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name" class="control-label col-md-4">Lawyer:</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="appointment_lawyer" value="" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>

<!-- Property Content -->
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Property Information:
        </header>
        <div  class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label col-md-2">Option Date:</label>
                    <div class="col-md-10">
                        <input id="option_date" type="text" class="form-control" name="option_date" value="" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label col-md-2">Purchase Price:</label>
                    <div class="col-md-10">
                        <input id="purchase_date" type="text" class="form-control" name="purchase_date" value="" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label col-md-2">S & P return/ Due Date:</label>
                    <div class="col-md-10">
                        <input id="due_date" type="text" class="form-control" name="due_date" value="" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label col-md-2" >ABSD/SSD:</label>
                    <div class="col-md-10">
                        {!! Form::select('absd',App\Properties::$prop_ABSD_SSD,'',['class'=>'form-control']) !!} 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">

                    <label for="name" class="control-label col-md-2">Bank:</label>
                    <div class="col-md-2">
                        {!! Form::select('bank',App\Properties::$prop_bank,'',['class'=>'form-control']) !!}
                    </div>

                    <div class="col-md-8">
                        <label for="name" class="control-label col-md-2 ">Bank Name:</label>
                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control" name="bank_name" value="" required>
                        </div>

                        <label for="name" class="control-label col-md-2">Bank Contact</label>
                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control" name="bank_mobile" value="" required>
                        </div>
                    </div>


                </div>
            </div>

            <div class="form-group">
             <div class="col-md-12">
                <label for="name" class="control-label col-md-2">Agency:</label>
                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="agency" value="" required>
                </div>

                <label for="name" class="control-label col-md-2">Agent Contact</label>
                <div class="col-md-4">
                    <input id="name" type="text" class="form-control" name="agent_name" value="" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12"> 
                {!! Form::submit('Submit',['class'=>'btn btn-success btn-style']) !!}
            </div>  
        </div>
    </section>
</div>
</div>
</form>

</section>



@stop

@section('script')

<script type="text/javascript">
    var rows=1;
    $(document).ready(function(){
        var scntDiv = $('#form-group');
        var i = $('#form-group').size() + 1;

        $('#addFiles').click(function() {

            name='{!! Form::select('rows[#rows#][name]',$clients,'',['class'=>'form-control','onchange'=>'client(this)','data-row'=>'#rows#']) !!}';  
            name = name.replace(new RegExp('#rows#', 'g'),rows);


            type ='{!! Form::select('rows[#rows#][type]',App\CaseFile::$trans_type,'',['class'=>'form-control','id'=>'type_#rows#']) !!} '


            type =type.replace(new RegExp('#rows#', 'g'),rows);             

            passport_no = '<input id="passport_#row#" type="text" class="form-control" name="rows[#rows#][passport_no]" value="" required>';

            passport_no =passport_no.replace(new RegExp('#rows#', 'g'),rows);

            mobile ='<input id="mobile_#row# type="text" class="form-control" name="rows[#rows#][mobile]" value="" required>';

            mobile=mobile.replace(new RegExp('#rows#', 'g'),rows);              


            email='<input id="email_#row# type="text" class="form-control" name="rows[#rows#][email]" value="" required>';
            email=email.replace(new RegExp('#rows#', 'g'),rows);


            role = '{!! Form::select('rows[#rows#][role]',App\CaseFile::$trans_role,'',['class'=>'form-control','id'=>'role_#rows#']) !!} '

            role=role.replace(new RegExp('#rows#', 'g'),rows);


            htmlstr = '<div class="form-group">\
            <div class="col-md-2">\
                '+name+'</div>\
                <div class="col-md-2">\
                    '+type+'    </div>\
                    <div class="col-md-2">\
                        '+passport_no+'</div>\
                        <div class="col-md-2">\
                            '+mobile+'</div>\
                            <div class="col-md-2">\
                                '+email+'</div>\
                                <div class="col-md-2">\
                                    '+role+'</div>\
                                </div>';
                                $('#form-group').append(htmlstr);
                                rows++
                                i++;
                                return false;
                            });

            //$('#addFiles').click();

        });

    function remove_row(obj){

        if($('#form-group').children().length>1){
            $('#form-group').children().last().remove(); 
        }
    }

</script>

<script> function get_form(obj)
    {  console.log('here');
    console.log($(obj).val());
    var value= $(obj).val();
    if(value==0)
        {   $("#hide_div").show(); 
}  
else{ 
    $("#hide_div").hide();
}
}


$(document).ready(function() { 
    $('#datepicker').datetimepicker({
        autoClose:true,
        format:'yyyy-mm-dd hh:ii'
    }); 
    $('#appointment_date').datepicker({
        autoClose:true,
        format:'yyyy-mm-dd'
    });
    $('#appointment_time').timepicker({
        autoClose:true,
        format:'yyyy-mm-dd'
    });
    $('#option_date').datepicker({
        autoClose:true,
        format:'yyyy-mm-dd'
    });
    $('#purchase_date').datepicker({
        autoClose:true,
        format:'yyyy-mm-dd'
    });
    $('#due_date').datepicker({
        autoClose:true,
        format:'yyyy-mm-dd'
    });    

});
</script>

<script type="text/javascript">
        function client(obj) {
            $.ajax({
                url: '/getclients/'+$(obj).val() ,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#name_'+$(obj).data('row')).val(data.client_name)
                    $('#type_'+$(obj).data('row')).val(data.identification_type)
                    $('#passport_'+$(obj).data('row')).val(data.identification_number)
                    $('#mobile_'+$(obj).data('row')).val(data.mobile)
                    $('#email_'+$(obj).data('row')).val(data.email)
                    $('#role_'+$(obj).data('row')).val(data.client_role)
                }

        });
    }


</script>
@stop