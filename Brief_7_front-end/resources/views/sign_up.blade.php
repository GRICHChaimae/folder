@extends('layout.masterLayout')

{{-- @section('style','./sass/sign_up.css') --}}


@section('title')
    {{ $sign_up }}
@endsection

@section('container')

<div class="d-flex">
    <img src="images/login.png" alt="" id="imgBody">
<div class="secondContainer">
<p id="logo">My Baby</p>
<div class="bgrForm">
<form action="{{ route('create') }}" method="post" class="formContainer">
    @csrf

    <div class="results">
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif

        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail')}}
            </div>
        @endif

    </div>
        <input type="text" name="prenom" placeholder="Prenom" class="mb-2" value="{{ old('prenom') }}">
        <span style="color : red" >@error('prenom') {{ $message }} @enderror</span>
        <input type="text" name="nom" placeholder="Nom" class="mb-2" value="{{ old('nom') }}">
        <span style="color : red">@error('nom') {{ $message }} @enderror</span>
        <input type="text" name="email" placeholder="Email" class="mb-2" value="{{ old('email') }}">
        <span style="color : red">@error('email') {{ $message }} @enderror</span>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="mb-2" value="{{ old('mot_de_passe') }}">
        <span style="color : red">@error('mot_de_passe') {{ $message }} @enderror</span>
        <!-- <input type="text" name="mot_de_passe" placeholder="Valider le mot de passe" class="mb-2"> -->
        <input type="submit" name="submit" id="submit" class="mb-2">
        <p>Avez-vous un copmt ? <a href="/"> Clicker-ici</a></p>
</form>
</div>
</div>
</div>

@endsection

<style lang="scss" >
@import url('http://fonts.cdnfonts.com/css/baby');

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 14px;
}

a{
    text-decoration: none;
    color: #70d1f7;
}

.container{
    display: flex;
}

img{
        width:50%;
        height: 100vh;
        object-fit: cover;
    }

#logo{
    font-family: 'Great Vibes', cursive;
    font-weight: 1000;
    font-size: 30px;
    padding: 20px;
}

.formContainer{
    display: flex;
    flex-direction: column;
    width: 80%;
    background-color: #FAC6E1;
    padding: 15px;
    margin-left: 10%;
}

.secondContainer{
    flex: 1;
}

::-webkit-input-placeholder {
  color: #70d1f7;
  font-weight: 300;
}

input{
    color: black;
    border: none;
    border-bottom: 2px solid #70D0F7;
    background-color: #E8F0FE;
    margin-bottom: 20px;
    padding: 10px;
    outline: none;
}

#submit{
    border: solid 2px #77D9F5;
    padding: 5px 15px;
    width: 80px;
    color: #70d1f7;
}

#submit:hover{
    color: #FAC6E1;
    background-color: #77D9F5;
    border: solid 2px #77D9F5;
    padding: 5px 15px;
}

.inpt{
    font-size: 13px;
    color: #70D0F7;
    display: flex;
    flex-direction: column;
}

label{
    margin-bottom: 10px;
}

@media (max-width:600px){
    #imgBody{
        display: none;
    }

    .bgrForm{
        background-image:url('images/login.png');
        background-position: center;
        background-size:cover;
        background-repeat: no-repeat;
        height:100vh;
        padding-top: 30px;
    }

    .formContainer{
        background-color: #fac6e1c7;
    }
}
</style>

