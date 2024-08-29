@extends('layouts.auth2')
@section('title', __('lang_v1.login'))

@section('content')
<?php error_reporting(0); ?>
<div class="panel panel-body login-form">
	@if(Session::has('flash_notification.message'))
	<script>
		toastr.{{Session::get('flash_notification.level')}}('{{ Session::get("flash_notification.message") }}','Response Status')
	</script>@endif @if (isset($msg))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ $msg }}</div>@endif @if (isset($error))
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ $error }}</div>@endif @if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>@endforeach</ul>
	</div>@endif
	<div class="text-center" style="padding-bottom: 6%; padding-top: 2%; background: #ffff;">
		<img src="{{ asset('img/pharmy-logo.png') }}" width="160px">
		<center><br> <span style="font-size: 10pt;color:#676767;">- + - pharmPOS - + -</span>
		</center>
		<span class="login_msg_data"></span> <span style="font-size: 8pt; color:#676767;">business unit</span>
		<center> <b> <input type="text" style="font-size: 10pt; color:#676767; width: 83%; border-radius: 25px;" value="   SOLVER PHARMACY UGANDA LTD" readonly> </b>
			
		</center>
	</div>{!! Form::open(array('url' => url('login'), 'method' => 'post', 'name' => 'form','class'=>'f-login-form')) !!}

	<div class="form-group has-feedback has-feedback-left">
		{!! Form::text('username', null, array('class' => 'form-control', 'id'=>'username', 'placeholder'=>'Username','required'=>'required','autocomplete'=>'off')) !!}
		<div class="form-control-feedback"> <i class="icon-user text-muted"></i>
		</div>
	</div>

	<div class="form-group has-feedback has-feedback-left">
		{!! Form::password('password', array('class' => 'form-control', 'id'=>'pass_login', 'placeholder'=>'Password','required'=>'required','autocomplete'=>'off')) !!}
		<div class="form-control-feedback"> <i class="icon-lock2 text-muted"></i>
		</div>
		<input type="hidden" name="remember" class="styled">
	</div>

	<div class="form-group">
		<button type="submit" id="login_btn" class="btn bg-blue-400 btn-block">Login <i class="icon-arrow-right14 position-right"></i>
		</button>

	</div> 
        
	<!-- <div><small><center>Powered by <a href="https://solvertech.co" target="_blank">solvertech</a></center></small></div> --->
    {!! Form::close() !!} 

@stop
