@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="headline">
            Your Cart
        </div>
    </div>
    @if(isset($msg))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert">{{$msg}}</div>
        </div>
    @endif
    <form method="POST" action="{{ url('/AddToTransaction') }}">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{--@foreach($cart as $i => $c)
                        <input type="hidden" name="cart_id" value="{{$c->id}}">
                        <tr>
                            <td><img src="{{asset('img/PokemonList')}}/{{$c->image}}" class="cart-img"></td>
                            <td>{{$c->pokemon_name}}<input type="hidden" name="name{{$i}}" value="{{$c->pokemon_name}}"></td>
                            <td>{{$c->qty}}<input type="hidden" name="qty{{$i}}" value="{{$c->qty}}"></td></td>
                            <td>{{$c->price}}<input type="hidden" name="price{{$i}}" value="{{$c->price}}"></td></td>
                            <td>{{$c->subtotal}}<input type="hidden" name="subtotal{{$i}}" value="{{$c->subtotal}}"></td></td>
                            <form method="POST" action="{{ url('/DeleteCart') }}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$c->id}}" name="id">
                                <td><input type="submit" value="Delete"></td>
                            </form>
                        </tr>
                    @endforeach--}}
                    @foreach($cart as $c)
                        <input type="hidden" name="cart_id" value="{{$c->id}}">
                        <tr>
                            <td><img src="{{asset('img/PokemonList')}}/{{$c->image}}" class="cart-img"></td>
                            <td>{{$c->pokemon_name}}<input type="hidden" name="name" value="{{$c->pokemon_name}}"></td>
                            <td>{{$c->qty}}<input type="hidden" name="qty" value="{{$c->qty}}"></td></td>
                            <td>{{$c->price}}<input type="hidden" name="price" value="{{$c->price}}"></td></td>
                            <td>{{$c->subtotal}}<input type="hidden" name="subtotal" value="{{$c->subtotal}}"></td></td>
                            <form method="POST" action="{{ url('/DeleteCart') }}">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$c->id}}" name="id">
                                <td><input type="submit" value="Delete"></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$cart->links()}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="submit" value="Complete the Payment" class="formText">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </form>
@endsection