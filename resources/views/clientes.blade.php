@extends('layouts.main')


@section('title', 'Mapa de Clientes')

@section('content')
<div class="clientes">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin="">
    </script>
    
    <div id="mapid"></div>
    <script>
        var map = L.map('mapid').setView([-7.1924886,-34.8825031], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>


    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkLabel">Cadastrar novo cliente</h5>
        <button onclick="cadastrarFormulario()" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <form action="/salvar" method="post">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nome</label>
                    <input id="name" name="name" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Endereço</label>
                    <input id="endereco" name="endereco" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descrição</label>
                    <input id="description" name="description" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Latitude</label>
                    <input id="latitude" name="latitude" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Longitude</label>
                    <input id="longitude" name="longitude" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <input id="status" name="status" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" id="salvar" class="btn btn-primary">Cadastrar</button>   
            </form>
    </div>
    </div>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkEdit" aria-labelledby="offcanvasDarkLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkLabel">Editar cliente</h5>
        <button onclick="editarFormulario()" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <form id="form" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nome</label>
                    <input id="editname" name="name" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Endereço</label>
                    <input id="editendereco" name="endereco" type="text" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descrição</label>
                    <input id="editdescription" name="description" type="text" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Latitude</label>
                    <input id="editlatitude" name="latitude" type="text" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Longitude</label>
                    <input id="editlongitude" name="longitude" type="text" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <input id="editstatus" name="status" type="text" class="form-control" >
                </div>
                <input type="submit" id="salvar" class="btn btn-primary" value="Salvar">
            </form>
    </div>
    </div>
    <h1>Lista de Clientes</h1>
    <button onclick="cadastrarFormulario()" type="button" id="novoCliente" class="btn btn-light">Novo Cliente</button>
    </form>             
            
    
        
            <ul class="cliente" >
                    @foreach($clientes as $cliente)
                    <li>{{ $cliente -> name}}--
                        {{ $cliente -> description}}--
                        {{ $cliente -> endereco}}--            
                        {{ $cliente -> status}}
                            
                        <script>                                
                                var editar = function (i){
                                    document.getElementById('form').action = "/clientes/update/" + i.id
                                    document.getElementById('editname').value = i.name
                                    document.getElementById('editendereco').value = i.endereco
                                    document.getElementById('editdescription').value = i.description
                                    document.getElementById('editlatitude').value = i.latitude
                                    document.getElementById('editlongitude').value = i.longitude
                                    document.getElementById('editstatus').value = i.status

                                    editarFormulario()
                                }
                        </script>
                        <div class="botoes">
                                <a 
                                onclick="editar({{$cliente}})"
                                class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>
                                </a>
                                <form  action="/destroy/{{ $cliente->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                        </div>
                                

                            
                    </li>


                    <script>
                        L.marker([<?php echo $cliente -> latitude ?>,<?php echo $cliente -> longitude ?>]).addTo(map)
                        .bindPopup('Cliente <br> <?php echo $cliente -> name ?> ')
                        .openPopup();
                    </script>

                @endforeach

            </ul>
      
</div>
    


<script src="js/script.js"></script>

        
        
        
@endsection





















<!-- <div class="container">
    <form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input type="text" class="form-control" ia-describedby="emailHelp">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Status</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>   

</div>
      -->

  <!--   </form>
        <div class="clientes">

            <h1>Lista de Clientes</h1>

            <ul >
                @foreach($clientes as $cliente)
                    <li>{{ $cliente -> name}}--
                            {{ $cliente -> description}}--
                            {{ $cliente -> endereco}}--            
                            {{ $cliente -> status}}</li>
                    @endforeach

            </ul>
        </div>
    
    </form>
     -->

    
   


     
        

