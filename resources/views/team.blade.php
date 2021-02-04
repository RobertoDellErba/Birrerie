<x-app>
    <x-slot name="title">Il Team </x-slot>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center font-weight-bold border-title d-inline pl-3">I nostri esperti</h1>
            </div>
        </div>    
        <div class="row justify-content-center my-5">
            @foreach ($team as $member)
            <div class="col-12 col-md-5 col-lg-4 my-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{$member['img']}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$member['name']}}{{$member['surname']}}</h5>
                      <p class="card-text">{{$member['role']}}</p>                      
                    </div>
                  </div>
            </div>                
            @endforeach
        </div>
    </div>
</x-app>