<x-app>
    <x-slot name="title">{{$brewery->name}}</x-slot>

  <section id="about">
    <div class="container my-5">

      <div class="row">
        <div class="col-lg-6">
          <img src="{{$brewery->img}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 d-flex flex-column justify-contents-center">
          <div class="content pt-4 pt-lg-0">
            <h1 class="border-title font-weight-bold pl-3">{{$brewery->name}}</h1>
            <p class="">
                {!!$brewery->description!!}
            </p>      
          </div>
        </div>
      </div>

      <div class="row border pt-3 pb-4 pb-md-0 md-5 m-2 rounded bg_dark shadow">
        <div class="col-md-4 px-md-5">
          <p class="font-weight-bold lead text-white">Orario Apertura:<span class="font-weight-bold text-main"> 11:00</span></p>
          <p class="font-weight-bold lead text-white">Orario Chiusura:<span class="font-weight-bold text-main"> 22:00</span></p>
        </div>
        <div class="col-md-4 px-md-5">
          <p class="font-weight-bold lead text-white">Indirizzo:<span class="font-weight-bold text-main">{{$brewery->address}}</span></p>
          <p class="font-weight-bold lead text-white">Telefono: <span class="font-weight-bold text-main">892 566 186 9436</span></p>
        </div>
        <div class="col-md-4 pt-md-4 px-5">
          <a class="btn-lg btn-outline-custom text-main mx-auto font-weight-bold text-decoration-none" href="mailto: nicola.labbirra@bevilabbirra.ba">Contatta</a>
        </div>
    </div>
  </section>
  <section class="container px-0 px-md-3">
    <h2 class="font-weight-bold border-title h1 pl-3">Specialità della Birreria:</h2>
    <div class="row pl-5 mt-4">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item border-0" role="presentation">
          <a class="nav-link active border-0 h4 mb-0" id="beers-tab" data-toggle="tab" href="#beerschart" role="tab" aria-controls="beerschart" aria-selected="true">Birre</a>
        </li>
        <li class="nav-item border-0" role="presentation">
          <a class="nav-link h4 mb-0 border-0" id="menù-tab" data-toggle="tab" href="#menù" role="tab" aria-controls="menù" aria-selected="false">Menù</a>
        </li>
      </ul>
    </div>
    <div id="myTabContent" class="tab-content p-4 shadow">
      <div id="beerschart" class="col-12 tab-pane fade show active">
        <div class="row">
        @foreach ($brewery->beers as $beer)
          <div class="col-12 col-md-4 my-3" role="tabpanel" aria-labelledby="beers-tab">
              <div class="border rounded px-0 pb-3 shadow" style="height: 270px">
                <h5 class="font-weight-bold text-main p-3 mb-1 bg_dark rounded-top">{{$beer->name}}</h5>
                <p class="font-weight-bold text-dark border-title ml-3 lead mt-4 px-3">Produttore:<br>{{$beer->brewer ?? "n/d"}}</p>
                <p class="font-weight-bold text-dark border-title ml-3 px-3">Tipologia:<br>{{$beer->style ?? "n/d"}}</p>
                <p class="font-weight-bold lead text-right mb-0 px-3"><span class="rounded-pill bg-gold text-dark py-1 px-3">{{$beer->alcohol ?? "n/d"}}°</span></p>
              </div>
          </div>
        @endforeach
        </div>
      </div>
      <div id="menù" class="tab-pane fade" role="tabpanel" aria-labelledby="menù-tab">
        <h3 class="h2 bg_dark text-main d-inline p-2 rounded">Antipasti</h3>
        <ul class="mt-3 lead px-0 px-md-3">
          <li class="my-2 font-weight-bold">Patate fritte <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 3,50</span></li>      
          <li class="my-2 font-weight-bold">Mozzarelline fritte 10 pz. <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 4,00</span> </li>
          <li class="my-2 font-weight-bold">Verdure alla griglia <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 4,00</span> </li>      
          <li class="my-2 font-weight-bold">Olive all’Ascolana 10 pz. <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 4,00</span> </li>
        </ul>
        <hr>  
        <h3 class="h2 bg_dark text-main d-inline p-2 rounded">Hamburger</h3>
        <ul class="mt-3 lead px-0 px-md-3">      
          <li class="my-2 font-weight-bold">Hamburger di pesce 200 gr. con pane fatto in casa
            e verdure grigliate (rucola, pomodoro) <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 13,00</span> </li>   
          <li class="my-2 font-weight-bold">Hamburger di Chianina 200 gr. con pane fatto in casa
            e verdure pastellate (lattuga, pomodoro, pancetta croccante e formaggio cheddar) <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 12,00</span> </li>   
          <li class="my-2 font-weight-bold">Solo hamburger di Chianina e verdure grigliate <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 10,00</span> </li>   
          <li class="my-2 font-weight-bold">Tostone casereccio con pane fatto in casa e verdure pastellate
            (pastin speziato, cipolla caramellata, formaggio cheddar e uovo) <span class="bg-gold py-1 px-2 py-1 text-white font-weight-bold rounded-pill d-inline-block">€ 9,00</span> </li> 
        <ul>      
      </div>
    </div>
  </section>
  <div class="container p-0 mt-5">    
    <h2 class="h1 font-weight-bold border-title pl-3 my-2">Commenti</h2>
  </div>

  @auth    
  <form class="container bg_dark rounded pt-4 mt-3 px-4 shadow" action="{{route('breweries.comments', ['id'=>$brewery->id])}}" method="POST">
            @csrf
            <div class="form-group">
            <textarea name="comment" class="form-control mt-4" id="comment" rows="3" placeholder="Hai visitato questa birreria? Facci sapere cosa ne pensi"></textarea>
            <label for="comment"><span class="lead px-3 py-1 font-weight-bold text-light">Vota</span></label>
            <select name="rate" class="rounded mt-2" style="height: 30px; width: 70px" required>
              <option value="" disabled selected>-</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <button type="submit" class="btn btn-outline-custom mt-2 font-weight-bold lead float-right text-light">Invia</button>
        </div>
        <hr>
    </form>
  @endauth

    <div  class="container">
        <div class="row justify-content-center">
            @if (count($comments) > 0)
              @foreach ($comments as $comment)             
              <div rate="{{$comment->rate}}" identify="{{$comment->id}}" class=" col-11 prova col-md-8 mx-auto card my-3 p-0 rounded shadow"> 
                  <p class="bg_dark text-light rounded-top px-3 py-2">{{$comment->created_at->format('d/m/Y')}}
                    <span class="float-right">
                      @for ($i = 0; $i < 5; $i++)
                       <i id="s{{$i.$comment->id}}" class="fas fa-beer fa-2x px-1 py-1 rounded text-secondary  mx-1"></i>                          
                      @endfor
                    </span>
                  </p>
                  <p class="media-comment h4 px-3 font-italic"><span>"{{$comment->comments}}"</span></p>
                  <p class="text-uppercase text-right px-3 font-weight-bold"><span class="rounded-pill bg-gold py-2 px-3">{{$comment->user->name}}</span></p>                        
              </div>
              @endforeach
            @else 
                <h2 class="text-uppercase font-weight-bold my-5">Non ci sono commenti per questa birreria</h2>
            @endif
        </div>
    </div>

    @auth
      @if ($user->role == "admin")
        <div class="container">
          <h2>Associa Birre</h2>

          <div class="row">

              <div class="col-sm-4">
                <form action="{{route('breweries.beers.sync',['id'=>$brewery->id])}}" method="POST">
                  @csrf
                <ul id="beers">
                  @foreach ($brewery->beers as $beer)
                      <li>{{$beer->id}} - {{$beer->name}}
                        <input type="hidden" name="beer_ids[]" value="{{$beer->id}}">
                        <button type="button" onclick="attachRemoveBeer()" class="btn btn-danger remove_beer">Disassocia</button>
                      </li>
                  @endforeach
                </ul>
                <button type="submit" class="btn btn-success">Associa</button>
              </form>
            </div>

            <div class="col-sm-8">
              CERCA BIRRA&nbsp;&nbsp;<input onkeyup="add()" type="text" id="beersearch"><br>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Produttore</th>
                    <th>Stile</th>
                    <th>Grado Alcolico</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($beers as $beer)
                    <tr class="beer_row" index = "{{strtolower($beer->name)}}_{{strtolower($beer->brewer)}}_{{strtolower($beer->style)}}" style="display: none">
                      <th scope="row">#{{$beer->id}}</th>
                      <td>{{$beer->name}}</td>
                      <td>{{$beer->brewer}}</td>
                      <td>{{$beer->style}}</td>
                      <td>{{$beer->alcohol}}</td>
                      <td><button class="btn btn-success add_beer btn-sm" beer-id = "{{$beer->id}}" beer-name = "{{$beer->name}}">Aggiungi</button></td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
           </div>
          </div>

        </div>
      @endif
    @endauth

    <div id="mapid" class="breweryMap" style=" height: 400px;"
      img="{{Storage::url($brewery->img)}}"
      name="{!! html_entity_decode($brewery->name, ENT_QUOTES, 'UTF-8') !!} "
      description="{!!Str::words(strip_tags(html_entity_decode($brewery->description, ENT_QUOTES, 'UTF-8')),10,'...')!!}"
      lat="{{$brewery->lat}}"
      lon="{{$brewery->lon}}"
      link="{{route('breweries.show',['id'=>$brewery->id,'name'=>$brewery->name])}}"
      >
    </div>






@push('scripts')
  <script>
      let beersearch = document.querySelector('#beersearch')
      let beerrow = document.querySelectorAll('.beer_row')

      function add(){
      
        let value = beersearch.value;
        value = value.toLowerCase();
        let index = document.querySelectorAll('[index*="' + value + '"]')

        if(value.length <= 3){
          for(i = 0; i < beerrow.length; i++){
          beerrow[i].style.display = 'none';
          }
          return
        }
        
        for(i = 0; i < index.length; i++){
          index[i].style.display = 'table-row';
          }

      }

    function attachRemoveBeer(){

      let remove = document.querySelectorAll('.remove_beer')

      for (let i = 0; i < remove.length; i++) {

        let self = remove[i]

        self.addEventListener('click', function() {

          self.parentElement.remove()

        })

      }
    }
            
    let attach = document.querySelectorAll('.add_beer')
    for (let i = 0; i < attach.length; i++) {
      
      let self = attach[i]

      self.addEventListener('click',function(){
      let beer_id = self.getAttribute('beer-id')
      let beer_name = self.getAttribute('beer-name')
      let beers = document.querySelector('#beers')
      let li = document.createElement('li') 
      li.innerHTML =
      `${beer_id} - ${beer_name}
        <input type="hidden" name="beer_ids[]" value="${beer_id}">
        <button type="button" class="btn btn-danger remove_beer">Disassocia</button>
      `;
      beers.appendChild(li)

    attachRemoveBeer()  

    })
      
    }

    attachRemoveBeer()



    //Birrozzi
    let prova = document.querySelectorAll('.prova')
    prova.forEach(el => {
      let rate = el.getAttribute('rate')
      let identify = el.getAttribute('identify')
      el.addEventListener('load', rating())
      function rating(){
      for (let i = 0; i < rate; i++) {
        let s = document.querySelector(`#s${i+identify}`)
        s.classList.add('bg-gold', 'text_dark')
        s.classList.remove('bg-dark', 'text-secondary')
      }
    }

    })
   
  </script>
@endpush 
</x-app>