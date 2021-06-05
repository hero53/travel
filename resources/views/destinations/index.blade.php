@extends('layout.lavage')
@section('content')
    @if(session()->has('message'))
    <div class="alert {{ session()->get('type') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session()->get('message') }}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!!  $error !!}
        </div>
    @endforeach
@endif
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Destination</h1>
          
         
             <div class="row">

            <!-- Border Left Utilities -->
            

            <!-- Border Bottom Utilities -->
            <div class="col-lg-12">

              <div class="card mb-4 py-3 border-bottom-primary">
                <div class="card-body">
                 <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Ajouter une destination</button>
                </div>
              </div>             

            </div>

          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste des depenses</h6>
              
            </div>
            

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Pays</th>
                      <th>Ville</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tfoot>
                   
                    <tr>
                      <th>Pays</th>
                      <th>Ville</th>
                      <th>Supprimer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($destinations as $destination)
                         <tr>
                      <td>{{$destination->pays}}</td>
                      <td>{{$destination->ville}}</td>
                      <td>
                        <a href="{{route('destination.destroy', $destination->id)}} " class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        <!-- Modal creat -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Enregistre une destination
      <div class="modal-body">
        <form method="POST" action="{{route('destination.store')}} ">
          @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">Pays</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="pays">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Ville</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="ville">
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
         <button type="submit" class="btn btn-primary" >Enregistre</button>
      </div>
        </form>
    </div>

  </div>
</div>


<!-- Modal update-->
<div id="myModalUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal update-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modifier une destination
      <div class="modal-body">
        <form method="POST" action="{{route('destination.store')}} ">
          @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">Pays</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="pays">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Ville</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="ville">
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
         <button type="submit" class="btn btn-primary" >Enregistre</button>
      </div>
        </form>
    </div>

  </div>
</div>
 
@endsection
@push('script')
     <!-- Page level plugins -->
  <script src="{{asset('asset/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('asset/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

   <!-- Page level custom scripts -->
  <script src="{{asset('asset/js/demo/datatables-demo.js')}}"></script>
@endpush