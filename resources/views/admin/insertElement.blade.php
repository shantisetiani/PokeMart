@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if(isset($element))
            <div class="headline">
                Update Element
            </div>
        @else
            <div class="headline">
                Insert Element
            </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <center>
            <img src="{{asset('img/element.png')}}" class="element">
        </center>
    </div>
    @if(isset($msg))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert">{{$msg}}</div>
        </div>
    @endif
    @if(isset($element))
        <form method="POST" action="{{ url('/UpdateElement') }}">
            {{csrf_field()}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    @foreach($element as $e)
                        <input type="hidden" name="element_id" value="{{$e->id}}">
                        <input type="text" placeholder="Element name" class="formText" name="element" value="{{$e->element}}">
                    @endforeach
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="submit" value="Update Element" class="formText">
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
        </form>
    @else
        <form method="POST" action="{{ url('/InsertElement') }}">
            {{csrf_field()}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="text" placeholder="Element name" class="formText" name="element">
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="submit" value="Insert Element" class="formText">
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
        </form>
    @endif
@endsection