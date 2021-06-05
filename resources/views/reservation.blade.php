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
                <h1 class="h4 text-gray-900 mb-4">Reserver votre Billet</h1>
              </div>
              <form class="user" method="POST" action="{{route('reservation.store')}} ">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user @error('nom') is-invalid @enderror" id="exampleFirstName" placeholder="votre nom et prénom">
                     @error('nom')
                      <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('prenom') is-invalid @enderror" id="exampleLastName" placeholder="contact" name="telephone">
                    @error('prenom')
                      <p class="valid-feedback">{{$message}}</p>
                     @enderror
                  </div>
                </div>
                <div class="form-group row">
                  
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="adresse mail" name="email">
                    @error('adresse_mail')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('passeport') is-ivalid @enderror" id="exampleInputEmail" placeholder="code passport" name="passeport">
                    @error('passeportl')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                  
                </div>
                  <hr>
                  <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <label for="">Destination</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="pays">
                        @foreach ($destinations as $destination)
                            <option value="{{$destination->id}}">{{$destination->pays}}</option>
                        @endforeach
                      
                      <option value="2">cheque</option>
                    
                    </select>
                  </div>
            
                </div>
                <hr>
                <div class="form-group row">
                  
                  <div class="col-sm-6">
                    <label for="">Date de depart</label>
                    <input type="date" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="date de depart" name="depare">
                    @error('depare')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="col-sm-6">
                    <label for="">Date d'arriver</label>
                    <input type="date" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="date d'arriver" name="arriver">
                    @error('arriver')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                  </div>

                  <hr>
                <div class="form-group row">
                  
                  <div class="col-sm-4">
                    <label for="">Avance payer</label>
                    <input type="number" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="Ex: 10000" name="avance">
                    @error('avance')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="col-sm-4">
                    <label for="">Mode de reglement</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="modereglement">
                      <option value="1">espece</option>
                      <option value="2">cheque</option>
                    
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <label for="">Date de reglement</label>
                    <input type="date" class="form-control form-control-user @error('adresse_mail') is-ivalid @enderror" id="exampleInputEmail" placeholder="date de reglement" name="datereglement">
                    @error('datereglement')
                      <p class="valid-feedback">{{$message}}</p>
                    @enderror
                  </div>
                  
                </div>
               
               
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Reservation
                </button>
                
              </form>
              <hr>
            
            
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection