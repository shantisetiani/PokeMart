@extends('layout')

@section('content')
    <style>
        .content-box{
            overflow-y: scroll;
        }
    </style>
    @foreach($user as $u)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="headline">
            Update User
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <center>
            <img src="{{asset('img/UserPhoto')}}/{{$u->photo}}" class="photo">
        </center>
    </div>
    <form method="POST" action="{{ url('/UpdateUser') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="file" class="formText" name="photo" style="margin-bottom: 8px">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Email :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="hidden" name="id" value="{{$u->id}}">
                <input type="text" class="formText" name="email" value="{{$u->email}}">
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
                <label>Date of Birth :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="text" class="formText" name="dob" value="{{$u->date_of_birth}}">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center>
                <label>Address :</label>
            </center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="text" class="formText" name="address" value="{{$u->address}}">
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
        if("{{$u->gender}}" == "Male"){
            $('#rbtMale').prop( "checked", true );
        }else{
            $('#rbtFemale').prop( "checked", true );
        }
    </script>
    @endforeach
@endsection