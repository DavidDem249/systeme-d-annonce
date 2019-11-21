@extends('layouts.app')

@section('content')

	<div class="container">
		<!-- <h1>Les différentes annonces</h1>
		<hr> -->
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form method="POST" action="{{ route('ad.search') }}" onsubmit="search(event)" id="searchForm">
					@csrf
					<div class="row">
						<div class="col-md-9 col-xs-12">
							<div class="form-group">
								<input type="text" name="" class="form-control" id="words">
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<button type="submit" class="btn btn-primary form-control">Rechercher</button>
						</div>
					</div>
				</form>
				<div id="result">
					@foreach($annonce as $an)

						<div class="card mb-3" style="width: 100%;">
							<!-- <img src="https://via.placeholder.com/350x100" class="card-img-top" alt="Card image cap"> -->
							
							<div class="card-body">
								<h4 class="card-title">{{ $an->title }}</h4>
								<h5 class="card-subtitle mb-2 text-muted">{{ $an->localisation }}</h5>

								<img src="{{ asset('storage'). '/' . $an->image }}" class="card-img-top">
								<!-- <small>{{ Carbon\Carbon::parse($an->created_at)->diffForHumans() }}</small>
								<p class="card-text text-info">{{ $an->localisation }}</p> -->
								<p class="card-text">{{ $an->description }}</p>
								<a href="{{ route('ad.view',['ad_id' => $an->id]) }}" class="card-link"> Voir l'annonce</a>
								<a href="{{ route('message.create',['auteur_id' => $an->user_id, 'ad_id' => $an->id ]) }}" class="card-link"> Contacter l'auteur</a>
								<br><small>Posté par <span style="background-color:purple;color: white;">{{ getAuteurNam($an->user_id) }}</span> {{ Carbon\Carbon::parse($an->created_at)->diffForHumans() }}</small>
							</div>
						</div>
					@endforeach
				</div>

				{{ $annonce->links() }}
			</div>
		</div>
	</div>

@endsection

@section('extra-js')

	<script type="text/javascript">
		function search(event){
			event.preventDefault()

			const words = document.querySelector('#words').value;
			const url = document.querySelector('#searchForm').getAttribute('action');
			//console.log(words);
			

			axios.post(`${url}`, {
			    words: words,
			  })
			  .then(function (response) {
			       const ads = response.data.ads;
				   let result = document.querySelector('#result');
				   

				   result.innerHTML = "";

				   for(let i=0; i<ads.length; i++){

				       let card = document.createElement('div')
				       let cardBody = document.createElement('div')
				       cardBody.classList.add('card-body')
				       card.classList.add('card', 'mb-3')

				       let title = document.createElement('h4')
				       title.classList.add('card-title')
				       title.innerHTML = ads[i].title

				       let description = document.createElement('p')
				       description.classList.add('card-text')
				       description.innerHTML = ads[i].description

				       let localisation = document.createElement('h6')
				       localisation.classList.add('card-subtitle','mb-2','text-muted')
				       localisation.innerHTML = ads[i].localisation 

				       let link1 = document.createElement('a')
				       link1.classList.add('card-link')
				       link1.innerHTML = "<a href='#' class='card-link'> Voir l'annonce</a>"

				       let link2 = document.createElement('a')
				       link2.classList.add('card-link')
				       link2.innerHTML = "<a href='#' class='card-link'>Contacter l'auteur</a>"

				       // let date = document.createElement('small')
				       // date.classList.add('')
				       // date.innerHTML = "<br>"+ads[i].created_at

				       cardBody.appendChild(title)
				       cardBody.appendChild(localisation)
				       cardBody.appendChild(description)
				       cardBody.appendChild(link1)
				       cardBody.appendChild(link2)
				       //cardBody.appendChild(date)

				       card.appendChild(cardBody)
				       result.appendChild(card)

				   }
			    })
			  .catch(function (error) {
			    console.log(error);
			});
		}
	</script>

@endsection