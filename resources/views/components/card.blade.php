    <div class="card cardZ bg-dark text-white shadow flex-shrink-0 mx-auto">
        <img src="{{$img}}" class="card-img" alt="{{$name}}">
        <div class="card-img-overlay d-flex flex-column justify-content-end">
          <a href="{{route('breweries.show',[$id,\Str::slug($name)])}}" class="text-white text-decoration-none w-100">  
            <h5 class="card_textZ font-weight-bold bg_dark text-main d-inline-block py-2 px-3 rounded">{{$name}}</h5>
          </a>
          <p class="card_textZ text-light bg_dark d-inline-block py-2 px-3 rounded w-100">{{$description}}</p>
        @auth
          @if(Auth::user()->role == 'admin' && $isApproved == false)
          <form action="{{route('breweries.approve',$id)}}" method="POST">
            @csrf
            <button type="submit" class="btn bg-gold font-weight-bold">Approva</button>
          </form>
          @endif
        @endauth
        </div>
    </div>      
