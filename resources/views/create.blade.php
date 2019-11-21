@extends('layouts.app')


@section('content')

	<div class="container">
		<h1>Déposer une nouvelle annonce</h1>
		<hr>


		<form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">

			@csrf

		    <div class="form-group">
			    <label for="title">Titre de l'annonce</label>
			    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" aria-describedby="title" value="{{ old('title') }}" name="title">

			    @if($errors->has('title'))
			    	<span class="invalid-feedback">{{ $errors->first('title') }}</span>
			    @endif

		    </div>

		    <div class="form-group">
		    	<label for='description'>Description de l'annonce</label>
		    	<textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="10" id="description" cols="30">{{ old('description') }}</textarea>

		    	@if($errors->has('description'))
		    		<span class="invalid-feedback">{{ $errors->first('description') }}</span>
		    	@endif
		    </div>
		    <div class="form-group">
			    <label for="localisation">Localisation de l'annonce</label>
			    <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid': '' }}" id="localisation" value="{{ old('localisation') }}"name="localisation">

			    @if($errors->has('localisation'))
		    		<span class="invalid-feedback">{{ $errors->first('localisation') }}</span>
		    	@endif
		    </div>
		  	<div class="form-group">
			    <label for="price">Prix de l'annonce</label>
			    <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid': '' }}" id="price" value="{{ old('price') }}" name="price">

			    @if($errors->has('price'))
		    		<span class="invalid-feedback">{{ $errors->first('price') }}</span>
		    	@endif

		    </div>

		    <div class="form-group">
			    <label for="image">Image(facultatif)</label>
			    <input type="file" class="form-control input-lg {{ $errors->has('image') ? 'is-invalid': '' }}" id="image" value="{{ old('image') }}" name="image">

			    @if($errors->has('image'))
		    		<span class="invalid-feedback">{{ $errors->first('image') }}</span>
		    	@endif

		    </div>


		    @guest

		    	<h1>Vos informations </h1>

		    	<div class="form-group">
				    <label for="name">Votre Nom</label>
				    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" value="{{ old('name') }}" name="name">

				    @if($errors->has('name'))
				    	<span class="invalid-feedback">{{ $errors->first('name') }}</span>
				    @endif
		    	</div>

		    	<div class="form-group">
				    <label for="email">Votre email</label>
				    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email') }}" name="email">

				    @if($errors->has('email'))
				    	<span class="invalid-feedback">{{ $errors->first('email') }}</span>
				    @endif
		    	</div>

		    	<div class="form-group">
				    <label for="password">Mot de passe</label>
				    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" value="{{ old('password') }}" name="password">

				    @if($errors->has('password'))
				    	<span class="invalid-feedback">{{ $errors->first('password') }}</span>
				    @endif
		    	</div>

		    	<div class="form-group">
				    <label for="password_confirmation">Confirmation mot de passe</label>
				    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation">

				    @if($errors->has('password_confirmation'))
				    	<span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
				    @endif
		    	</div>


		    @endguest

		  	<button type="submit" class="btn btn-primary">Soumettre l'annonce</button>
		</form>
	</div>

@endsection