@extends( 'pages.layout.app' )
@section('TitlePage')
  Home | Orario treni    
@endsection
@section('PageContent')
<body>
    <main>
        <div class="container">
            <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Tratta</th>
                      <th scope="col">Partenza</th>
                      <th scope="col">Arrivo</th>
                      <th scope="col">Codice Treno</th>
                      <th scope="col">Azienda</th>
                      <th scope="col">N. Carrozze</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($trains as $item)                     
                              <tr class="@if($item->cancellato) table-danger @elseif(!$item->cancellato && !$item->in_orario) table-warning  @endif ">
                                <th scope="row">{{$item->stazione_partenza}}-{{$item->stazione_arrivo}} @if($item->cancellato)<span class="text-danger">  CANCELLATO </span> @elseif(!$item->cancellato && !$item->in_orario) <span class="text-warning">  IN RITARDO </span> @endif</th>
                                <td>{{$item->orario_partenza}}</td>
                                <td>{{$item->orario_arrivo}}</td>
                                <td class="text-uppercase">{{$item->codice_treno}}</td>
                                <td>{{$item->azienda}}</td>
                                <td>{{$item->numero_carrozze}}</td>
                              </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
@endsection

