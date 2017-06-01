@extends('layouts.app')
@section('title') Edit Questionair
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
            Update Questionair
          </header>
          <div class="panel-body">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/questionairs/edit/'.$questionair->id) }}">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="name" class="col-md-2 control-label">Questionair Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" value="{{$questionair->title}}" class="form-control" name="title" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="Description" class="col-md-2 control-label">Duration</label>

                <?php
                $duration = $questionair->duration;
                $show_duration = explode('-', $duration);
                ?>

                <div class="col-md-4">
                  <input type="text" value="{{$show_duration['0']}}" class="form-control" name="duration[]" required="">
                </div>
                <div class="col-md-2">
                  <select class="form-control" name="duration[]">
                    @if($show_duration[1])
                    <option selected="selected">{{$show_duration['1']}}</option>
                    <option value="min">Minutes</option>
                    <option value="hr">Hours</option>
                    @else
                    <option value="min">Minutes</option>
                    <option value="hr">Hours</option>
                    @endif

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-2 control-label">Can Resume</label>

                <div class="col-md-2">
                  <label class="radio-inline">
                    @if($questionair->resumable == 'yes')
                    <input type="radio" checked="checked" value="yes" name="resumable">
                    @else
                    <input type="radio" value="yes" name="resumable">
                    @endif
                    Yes
                  </label>
                </div>

                <div class="col-md-2">
                  <label class="radio-inline">
                    @if($questionair->resumable == 'no')
                    <input type="radio" checked="checked" value="no" name="resumable">
                    @else
                    <input type="radio" value="no" name="resumable">
                    @endif
                    No
                  </label>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Save
                  </button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  </div>


  @endsection
