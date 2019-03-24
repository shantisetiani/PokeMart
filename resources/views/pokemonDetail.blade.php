@extends('layout')

@section('content')
    <style>
        .content-box{
            overflow-y: scroll;
        }
    </style>
    @foreach($pokemon as $p)
    <form method="POST" action="{{ url('/AddToCart') }}">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="headline">
                {{$p->name}}
                <input type="hidden" name="name" value="{{$p->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <img src="{{asset('img/PokemonList')}}/{{$p->image}}" class="photo">
                <input type="hidden" name="image" value="{{$p->image}}">
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            Price : {{$p->price}}
            <input type="hidden" name="price" value="{{$p->price}}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            Element : {{$p->element}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            Gender : {{$p->gender}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 description">
            {{$p->description}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            Comments :
            <hr>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @foreach($comment as $c)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">{{$c->datetime}}</div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">{{$c->email}}</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">{{$c->comment}}</div>
        @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="center">Qty</div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <input type="number" class="formText" name="qty">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="submit" value="Add to Cart" class="formText">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </form>
    <form method="POST" action="{{ url('/Comment') }}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$p->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="text" class="formText" name="comment" placeholder="Comment" style="margin-bottom: 8px">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="submit" value="Insert Comment" class="formText">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </form>
    @endforeach
@endsection