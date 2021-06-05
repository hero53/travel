@extends('layout.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Inscription!</h1>
              </div>
              <form class="user" method="POST" action="{{route('register.store')}} ">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user @error('nom') is-invalid @enderror" id="exampleFirstName" placeholder="First Name">
                     @error('nom')
                      <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('prenom') is-invalid @enderror" id="exampleLastName" placeholder="Last Name" name="surname">
                    @error('prenom')
                      <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="Email Address" name="email">
                  @error('adresse_mail')
                     <p class="valid-feedback">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="@error('mot_de_passe') is-invalid @enderror form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    @error('mot_de_passe')
                      <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="@error('confirmation_mot_de_passe') is-invalid @enderror form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_V">
                    @error('confirmation_mot_de_passe')
                     <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                </div>
               
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  S'inscrire
                </button>
                
              </form>
              <hr>
            
              <div class="text-center">
                Vous avez déjà un compte ? 
                <a class="small" href="{{route('login.connexion')}} ">Connectez-vous</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection