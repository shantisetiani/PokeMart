@extends('layout')

@section('content')
    <style>
        .content-box{
            overflow-y: scroll;
        }
    </style>
    @foreach($pokemon as $p)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="headline">
            Update Pokemon
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <center>
            <img src="{{asset('img/PokemonList')}}/{{$p->image}}" class="photo">
        </center>
    </div>
    <form method="POST" action="{{ url('/UpdatePokemon') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="file" class="formText" name="image" style="margin-bottom: 8px">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Name :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="hidden" name="id" value="{{$p->id}}">
                <input type="text" class="formText" name="name" value="{{$p->name}}">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Element :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <select name="element" class="formText">
                    @foreach($element as $e)
                        <option value="{{$e->element}}">{{$e->element}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Gender :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 2%">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <input type="radio" name="gender" value="Male" id="rbtMale">Male
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <input type="radio" name="gender" value="Female" id="rbtFemale">Female
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Description :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <textarea class="formText" name="description">{{$p->description}}</textarea>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Price :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="text" class="formText" name="price" value="{{$p->price}}">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @foreach($errors->all() as $e)
                <div class="error" >{{ $e }}</div>
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="submit" value="Edit" class="formText">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </form>

    <script>
        if("{{$p->gender}}" == "Male"){
            $('#rbtMale').prop( "checked", true );
        }else{
            $('#rbtFemale').prop( "checked", true );
        }
    </script>
    @endforeach
@endsection