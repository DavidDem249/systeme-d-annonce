@extends("../layouts.app")

@section('content')

	<div class="container">
			
		<div class="row justify-content-center">
			{{--<h1>{{ $posts->price }}</h1>--}}
			
				<div class="card mb-3" style="width: 100%;">
					
					<div class="card-body">
						<h4 class="card-title">{{ $annonce->title }}</h4>
						<h5 class="card-subtitle mb-2 text-muted">{{ $annonce->localisation }}</h5>

						<img src="{{ asset('storage'). '/' . $annonce->image }}" class="card-img-top">
						
						{{--<small>{{ Carbon\Carbon::parse($an->created_at)->diffForHumans() }}</small>
						<p class="card-text text-info">{{ $an->localisation }}</p> --}}

						<p class="card-text">{{ $annonce->description }}</p>
						<a href="{{ route('ad.view',$annonce->id) }}" class="card-link"> Voir l'annonce</a>
						<a href="{{ route('message.create',['auteur_id' => $annonce->user_id, 'ad_id' => $annonce->id ]) }}" class="card-link"> Contacter l'auteur</a>
						<br><small>Posté par <span style="background-color:purple;color: white;">{{ getAuteurNam($annonce->user_id) }}</span> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
					</div>
				</div>
			

		</div>

	</div>

@stop