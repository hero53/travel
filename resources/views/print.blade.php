<style type="text/css">
    *{font-family : "cambria","calibri","arial","sans-serif"; font-size : 14px; }
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }
    
</style>
<span class="ee"></span>
<section>
    <div style=" display: inline-block;">
        <div>
            <img src="https://apps.adamlogistique.com/img/logosmall.png" alt="" style="width: 180px">
        </div>

    </div>

</section>
<section style="margin: 50px">

    <div>
        <h1 STYLE="text-align: center">Informatin de reservation</h1>
    </div>
</section>


<table style="border-collapse: inherit; border: none; margin: 10px">
    <tr>
        <td>
            <table style="border-collapse: inherit; border: none">
                <tr style="border: 1px #333 solid">
                    <td style="width:100%">
                        {{--                        <span>{{ ucfirst($facture->livraison->client->nom) }} {{ ucfirst($facture->livraison->client->prenoms) }}</span><br/>--}}
                        {{--                        <span>{{ ucfirst($facture->livraison->client->adresse) }}</span>--}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>
            <table>
                <tr>
                  <th style="border: solid 1px #333;">Nom</th>
                  <th style="border: solid 1px #333;">Mail</th>
                  <th style="border: solid 1px #333;">Contact</th>
                  <th style="border: solid 1px #333;">Destination</th>
                  <th style="border: solid 1px #333;">Passeport</th>                    
                  <th style="border: solid 1px #333;">Etat</th>              
                </tr>
                @foreach ($clients as $client)
                    <tr>
                      <td style="border: solid 1px #333;">{{$client->name}}</td>
                      <td style="border: solid 1px #333;">{{$client->email}}</td>
                      <td style="border: solid 1px #333;">{{$client->telephone}}</td>
                      <td style="border: solid 1px #333;">{{$client->destination->pays}}</td>
                      <td style="border: solid 1px #333;">{{$client->passeport}}</td>                
                       @if($client->etat == 0)             
                      <td style="border: solid 1px #333;"> <span>En attente de validation</span> </td>
                      @else
                     <td style="border: solid 1px #333;"> <span >Valider</span> </td>
                      @endif
                    </tr>
                    @endforeach

            </table>
        </td>
    </tr>

</table>
