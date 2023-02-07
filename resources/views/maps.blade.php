@extends('layouts.main')


@section('title', 'Mapa de Clientes')

@section('content')

<div id="mapidCompleto"></div>


        
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin="">
        </script>
        <script>

var map = L.map('mapid').setView([-7.1924886,-34.8825031], 3);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-7.1924886,-34.8825031]).addTo(map)
    .bindPopup('Cliente 1.<br> ...')
    .openPopup();
</script>
@endsection