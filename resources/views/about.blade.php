<x-app>
    <x-slot name="title">Contattaci </x-slot>
    
    
<div class="container my-5">
    <div class="row bg-halfmain pt-3 rounded">
        <div class="col-12 col-md-6">
            <figure>
                <img class="img-fluid d-block mx-auto rounded shadow" src="./media/ToninoBirra.png" alt="">
            </figure>
        </div>
        <div class="col-12 col-md-6">
            <figure>
                <h1 class="font-weight-bold text-light text-main">Facciamoci una birra!</h1>
                <hr class="bg-light">
                <ul class="list-unstyled">
                    <li class="lead mb-2 font-weight-bold text-light">via Della Birra, 42, Neverland, Molisn't</li>
                    <li class="lead mb-2 font-weight-bold text-light">Tel/Fax: 092 800 800 496</li>
                    <li class="lead mb-2 font-weight-bold text-light">email: <a class="text-mavvone font-weight-bold" href="mailto:toninoIndustries@ecomm.com">toninoIndustries@ecomm.com</a></li>
                    <li class="lead mb-2 font-weight-bold text-light">P.IVA: 1668924242876</li>
                </ul>
            </figure>
        </div>
    </div>
</div>

    {{-- FORM CONTATTACI --}}

<div class="container-fluid mx-0 py-5 px-0 my-5 d-lg-block d-none">
    <div class="row">
        <div class="d-flex width-custom-8 py-5 bg_dark text-white shadowZ pr-5 rounded mx-xl-auto">
            <div id="toninoBirra" class="col-12 col-md-5 px-0">
                <img class="rounded" src="./media/prova.png" width="400px" alt="">
            </div>
            <div class="w-75">
                <h1 class="font-weight-bold text-main text-uppercase"> Collabora con noi</h1>
                <p class="font-weight-bold text-light">Siamo sempre alla ricerca di nuovi MastriBirra, sentiti libero di proporti</p>
                <form action="{{route('send')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group px-0 col-md-6">
                            <label for="inputName">Nome e Cognome</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Mario Rossi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="mario.rossi@chenome.it">
                        </div>          
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Tel</label>
                        <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="+39 354 3613349176">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Indirizzo</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="via Nazionale, 7">
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="10">Compila il tuo messaggio</textarea>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Accetto termini e condizioni di servizio
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg text-light text-uppercase font-weight-bold btn-outline-custom my-2 my-sm-0">Sign in</button>
                </form>
            </div>    
            
        </div>    
    </div>
    
</div>

{{-- FOrm Smart --}}

<div class="container-fluid d-block d-lg-none my-5">
    <div class="row py-5 p-md-5 bg_dark">
        <div class="col-12">
            <h1 class="font-weight-bold text-main text-uppercase"> Collabora con noi</h1>
            <p class="font-weight-bold text-light">Siamo sempre alla ricerca di nuovi MastriBirra, sentiti libero di proporti</p>
            <form action="{{route('send')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group px-0 col-md-6 text-white">
                        <label for="inputName">Nome e Cognome</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Mario Rossi">
                    </div>
                    <div class="form-group col-md-6 text-white">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="mario.rossi@chenome.it">
                    </div>          
                </div>
                <div class="form-row">
                <div class="form-group col-md-6 text-white">
                    <label for="inputPhone">Tel</label>
                    <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="+39 354 3613349176">
                </div>
                <div class="form-group col-md-6 text-white">
                    <label for="inputAddress">Indirizzo</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="via Nazionale, 7">
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 text-white">
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10">Compila il tuo messaggio</textarea>
                    </div>   
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label text-white" for="gridCheck">
                            Accetto termini e condizioni di servizio
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg text-light text-uppercase font-weight-bold btn-outline-custom my-2 my-sm-0">Sign in</button>
            </form>
        </div>
    </div>
</div>






   
    
    
    
    
    
</x-app>