
<x-app>
    <x-slot name="title">Home </x-slot>
    
    <div id="homepage" class="container"></div>
    
    
    
    <section class=" container-fluid vh-50 my-5">
        <div class="row mt-5 px-5">
            <div class="col-12 pl-4 pt-2 mb-1 border-title">
                <h1 class="font-weight-bold text-uppercase "> Le ultime aggiunte! </h1>
                <p class="lead mt-3 font-weight-bold ">Scorri tra le ultime birrerie aggiunte al nostro catalogo virtuale</p>
            </div>
        </div>
        <div class="row my-2 py-2 flex-nowrap overflowScroll scrollbar-primary">
                @foreach ($breweries->take(5) as $brewery)
                    <x-card 
                    img="{{$brewery->img}}"
                    name="{!! html_entity_decode($brewery->name, ENT_QUOTES, 'UTF-8') !!} "
                    description="{!!Str::words(strip_tags(html_entity_decode($brewery->description, ENT_QUOTES, 'UTF-8')),10,'...')!!}"
                    id="{{$brewery->id}}"
                    isApproved="{{$brewery->is_approved}}"
                    />
                @endforeach    
        </div>
    </section>
    
    
    
    <section class="container-fluid my-md-0 py-md-0 min-vh-100 bg_form">
        <div class="row ">
            @if (session('notified'))
            <div class="col-12 alert alert-success">
                <p class="">{{session('notified')}}</p>
            </div>    
            @endif
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center font-weight-bold mt-5">Segnalaci la tua birreria preferita</h1>
            </div>
        </div>

        <div class="row justify-content-center" >
            <form action="{{route('breweries.store')}}" class=" col-12 col-md-8 bg_dark rounded shadow mt-5 mb-5 py-3 p-md-5 mx-auto" method="POST" enctype="multipart/form-data">
                @csrf            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="lead text-white" for="inputName">Nome Birreria</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Birreria dal Coach">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="lead text-white" for="inputPhone">Tel</label>
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="+39 354 3613349176">
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>            
                </div>
                <div class="input-group">                
                    <div class="custom-file">
                        <label class="custom-file-label text-dark" for="inputGroupFile03">Scegli un'immagine </label>                 
                        <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                    </div>                         
                </div>
                <div class="row my-0">
                    <div class="col-12 my-0">
                        @error('img')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row position-relative">
                    <div class="col-12">
                        <input type="text" class="form-control-file d-none" name="lat" id="lat" size=12 value="">
                        <input type="text" class="form-control-file d-none" name="lon" id="lon" size=12 value="">
                        <label class="mt-2 text-white lead" for="addr">Cerca indirizzo</label>
                        <div class="form-row" id="search">
                            <input type="text" class="form-control w-75 border-custom-rgt" name="addr" value="" id="addr" size="58" />
                            <button type="button" class="btn btn-outline-custom py-0 px-2 border-custom-lft text-white" onclick="addr_search();">Search</button>
                        </div>
                    </div>  
                    <div class="col-12 text-light" id="results"></div>
                    <br>
                    <div id="map"></div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-12">
                        <label for="description" class="text-white lead">Descrivici la tua Birreria preferita</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10"></textarea>  
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>   
                </div>            
                <button type="submit" class="btn btn-outline-custom text-white">Invia</button>
            </form>
        </div>
    </section>

 
    
    
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    
    <script>

        let results = document.querySelector('#results')
        
        function chooseAddr(lat1, lng1, address)
        {
            results.style.opacity='0'
            results.style.zIndex='-1'            
            addr = address
            lat = lat1.toFixed(8);
            lon = lng1.toFixed(8);
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
            document.getElementById('addr').value = addr;
        }
        
        function myFunction(arr)
        {
            console.log(arr)
            var out = "<br />";
            var i;
            results.style.opacity='1'
            results.style.zIndex='1'   
            
            if(arr.length > 0)
            {
                for(i = 0; i < arr.length; i++)
                {
                    out += `<div class='address pointer text-dark' title='Show Location and Coordinates' onclick='chooseAddr(${[arr[i].lat, arr[i].lon]}, "${arr[i].display_name}")'> ${arr[i].display_name} </div><hr>`;
                    console.log(typeof arr[i].display_name)
                }
                results.innerHTML = out;
            }
            else
            {
                results.innerHTML = "Sorry, no results...";
            }
        }
        
        function addr_search()
        {
            var inp = document.getElementById("addr");
            var xmlhttp = new XMLHttpRequest();
            var url = "https://nominatim.openstreetmap.org/search?format=json&limit=5&q=" + inp.value;
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var myArr = JSON.parse(this.responseText);
                    myFunction(myArr);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        
    </script>
    
    
</x-app>