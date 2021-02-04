<div class="container-fluid">
    <div id="src" class="row">
        <div class="col-12 ">
           <h2 class="font_size text-center text-white mt-md-3">Per gli amanti della birra, dagli amanti della birra</h2>
          <div class="row justify-content-center">
            <form action="{{route('search')}}" method="GET" class="form-inline my-2 my-lg-0 justify-content-center searchStyle">
              <input class="form-control mr-sm-2 w-75 h-100" name="query" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-lg text-light text-uppercase font-weight-bold btn-outline-custom my-2 my-sm-0" type="submit">Cerca</button>
            </form>
          </div>
        </div>
    </div>
</div>