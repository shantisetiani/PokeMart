@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="headline">
            Delete User
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <center>
            <img src="{{asset('img/logo.png')}}" class="element">
        </center>
    </div>
    @if(isset($msg))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert">{{$msg}}</div>
        </div>
    @endif
    <form method="POST" action="{{ url('/DeleteUser') }}">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <select name="id" class="formText">
                    @foreach($user as $u)
                        <option value="{{$u->id}}">{{$u->email}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="submit" value="Delete User" class="formText">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </form>
@endsection