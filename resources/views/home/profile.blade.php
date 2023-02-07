@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
	<form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
		@csrf
		<div class="card">
			<div class="card-body text-center d-flex justify-content-center align-items-center flex-column">
				<select class="form-select" name="font">
					<option value="{{session('font', 'Arial')}}" selected>Elegir fuente</option>
					<option value="helvetica, sans-serif">Helvetica</option>
					<option value="arial, sans-serif">Arial</option>
					<option value="arial black, sans-serif">Arial Black</option>
					<option value="verdana, sans-serif">Verdana</option>
					<option value="'tahoma', sans-serif">Tahoma</option>
					<option value="trebuchet ms, sans-serif">Trebuchet MS</option>
					<option value="impact, sans-serif">Impact</option>
					<option value="gill sans, sans-serif">Gill Sans, sans-serif</option>
					<option value="times new roman, serif">Times New Roman</option>
					<option value="georgia, serif">Georgia</option>
					<option value="palatino, serif">Palatino</option>
					<option value="baskerville, serif">'Baskerville</option>
					<option value="courier, monospace">Courier</option>
					<option value="'Lucida Grande', monospace">Lucida Console</option>
					<option value="monaco, monospace">Monaco</option>
					<option value="bradley hand, cursive">Bradley Hand</option>
					<option value="brush script mt, cursive">Brush Script MT</option>
					<option value="luminari, fantasy">Luminari</option>
					<option value="comic sans ms, cursive">Comic Sans MS</option>
				</select>
			</div>
		</div><br>
		<div class="card">
			<div class="card-body text-center d-flex justify-content-center align-items-center flex-column">
				<p>Modificar Color del Encabezado</p>
				<input type="color" class="form-control form-control-color" name="headColor" value="{{session('headColor', '#1abc9c')}}">
			</div>
		</div><br>
		<button type="submit" class="btn btn-primary">Editar</button>
	</form>
@endsection