@extends('layouts.main')

@section('title')
SEDJ
@stop

@section('logo')
<img src="/assets/img/logo_mainbar.png" alt="Sidep" style="margin-top:-5%">
@stop

@section('main-content')
<div class="superbox col-sm-10 col-sm-offset-1" id="panel-sistemas">

</div>
@stop

@section('script-content')
<script>
	_gen.panel($("#panel-sistemas"));
</script>
@stop
