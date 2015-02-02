@extends("templates/master")
@section("head")
	<script>
	$(document).ready(function(){
		$('#lnkgallery').addClass('active');
	});
	</script>
@stop
@section("content")
	@include("includes/menu")

	<h2>Gallery</h2>

	@if(Session::has('message'))
	<div class="alert alert-success">
	   {{  Session::get('message') }}
	</div>
	@endif
	<form action="/gallery" method="post" enctype="multipart/form-data">
		
		<input type="file" name="file" class="form-control"		>
		<br/>

		<input type="submit" value="Upload"  class="btn btn-primary"/>
	</form>


	<div id="show" style="padding-top: 50px">
	@foreach($files as $key => $value)
		<img src="{{ Croppa::url($value->filename, 50, null) }}"  />
	@endforeach
	</div>
@stop
