<x-app>
    <x-slot name="title">Lavora con Noi</x-slot>

    


{{-- Creo un form semplice senza action, method, csrf ne nulla --}}
    <form class="container">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" >          
        </div>
        <div class="form-group">
          <label for="surname">Cognome</label>
          <input type="text" class="form-control" id="surname">
        </div>
        <div class="form-group">
            <label for="telephone">Telefono</label>
            <input type="tel" class="form-control" id="telephone">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="age">età</label>
            <input type="number" class="form-control" id="age">
        </div>
        <div class="form-group">
            <label for="cv">CV</label>
            <input type="file" class="form-control" id="cv" accept=".pdf">
        </div>
        {{-- aggiungo un evento onclick che triggheri la funzione send in script.js --}}
        <button onclick="send()" type="button" class="btn btn-primary">Invia</button>
      </form>


      


</x-app>