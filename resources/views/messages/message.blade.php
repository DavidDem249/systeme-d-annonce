@extends('layouts.app')


@section('content')
	
	<div class="container">
		<h1>Contacter l'auteur de l'annonce</h1>
		<hr>

		<form action="{{ route('message.store') }}" method="POST">
			@csrf

			<div class="form-group">
				<label id="content">Votre Message</label>
				<textarea class="form-control" id='content' name="content" cols="30" rows="10"></textarea>
			</div>
			<input type="hidden" name="auteur_id" value="{{ $auteur_id }}">
			<input type="hidden" name="ad_id" value="{{ $ad_id }}">
			<input type="hidden" name="acheteur_id" value="{{ auth()->user()->id }}">
			<button type="submit" class="btn btn-success">Envoyer le message</button>
		</form>
	</div>

@endsection