<x-app>
    <x-slot name="title">Le Birrerie</x-slot>
<div class="container-fluid">
  @if($query)
    <h1 class="font-weight-bold my-5 border-title pl-4">Visualizza risultati per la ricerca: <span class="text-capitalize text-light bg-gold px-3 py-1 rounded-pill">{{$query}}</span></h1>
  @else <h1 class="font-weight-bold my-5 border-title pl-4">Ecco le nostre birrerie</h1>     
  @endif
    <div class="row px-0 px-lg-5">
        @foreach ($breweries as $brewery)
          <div class="col-lg-4 col-md-6 col-12 my-5 breweryMap" 
              img="{{$brewery->img}}"
              name="{!! html_entity_decode($brewery->name, ENT_QUOTES, 'UTF-8') !!} "
              description="{!!Str::words(strip_tags(html_entity_decode($brewery->description, ENT_QUOTES, 'UTF-8')),10,'...')!!}"
              lat="{{$brewery->lat}}"
              lon="{{$brewery->lon}}"
              link="{{route('breweries.show',['id'=>$brewery->id,'name'=>$brewery->name])}}">
              <x-card 
              img="{{$brewery->img}}"
              name="{!! html_entity_decode($brewery->name, ENT_QUOTES, 'UTF-8') !!} "
              description="{!!Str::words(strip_tags(html_entity_decode($brewery->description, ENT_QUOTES, 'UTF-8')),10,'...')!!}"
              id="{{$brewery->id}}"
              isApproved="{{$brewery->is_approved}}"
              />
          </div>
        @endforeach
      </div>
      <div class="row justify-content-center mb-5">          
          {{$breweries->links()}}           
      </div>
</div>

    @if ($breweries)
    <div id="mapid" class="mb-0 pb-0" style=" height: 400px;">
      
    </div>
    @endif
</x-app>






