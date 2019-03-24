@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="headline">
            Update Transaction
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Pokemon Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $trans)
                <tr>
                    <td>{{$trans->pokemon_name}}</td>
                    <td>{{$trans->price}}</td>
                    <td>{{$trans->qty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection