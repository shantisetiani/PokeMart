@extends('layout')

@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="headline">
			Pokemon List
		</div>
		<form method="POST" class="navbar-form navbar-left" action="{{url('/SearchPokemon')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search by name or element" name="search">
			</div>
			<input type="submit" class="btn" value="Search">
		</form>
		@if(isset($msg))
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="alert">{{$msg}}</div>
			</div>
		@endif
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@foreach($pokemon as $p)
			<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
				<div class="frame">
					<img src="{{asset('img/PokemonList')}}/{{$p->image}}" class="pokemon-img">
				</div>
				{{$p->name}}
				@if(Auth::user()->role_id == 1)
					<form method="GET" action="{{url('/UpdatePokemon')}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->role_id}}">
						<input type="hidden" name="pokemon_id" value="{{$p->id}}">
						<input type="submit" class="formText" value="Update">
					</form>
					<form method="POST" action="{{url('/DeletePokemon')}}">
						{{csrf_field()}}
						<input type="hidden" name="pokemon_id" value="{{$p->id}}">
						<input type="submit" class="formText" value="Delete">
					</form>
				@else
					<form method="GET" action="{{url('/PokemonDetail')}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->role_id}}">
						<input type="hidden" name="pokemon_id" value="{{$p->id}}">
						<input type="submit" class="formText" value="Display">
					</form>
				@endif
			</div>
			@endforeach
		</div>
		{{$pokemon->appends(compact('search'))->links()}}

	<script>

	</script>
@endsection