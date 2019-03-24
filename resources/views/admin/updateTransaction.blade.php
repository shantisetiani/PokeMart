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
                    <th>ID</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th colspan="3" class="center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $trans)
                <tr>
                    <td>{{$trans->id}}</td>
                    <td>{{$trans->email}}</td>
                    <td>{{$trans->datetime}}</td>
                    <td>{{$trans->status}}</td>
                    <form method="POST" action="{{ url('/Accept') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$trans->id}}">
                        <td><input type="submit" value="Accept"></td>
                    </form>
                    <form method="POST" action="{{ url('/Decline') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$trans->id}}">
                        <td><input type="submit" value="Decline"></td>
                    </form>
                    <form method="GET" action="{{ url('/DetailTransaction') }}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$trans->id}}">
                        <td><input type="submit" value="Detail"></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$transaction->links()}}
    </div>
@endsection