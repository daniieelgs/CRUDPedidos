@extends('layouts.master')

@section('css')


    <style>

        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        }

        @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
        }

        .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
        }

        .bi {
        vertical-align: -.125em;
        fill: currentColor;
        }

        .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
        }

        .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        }

        p.lead{
            display: flex;
            justify-content: center
        }
    </style>

    <link href="{{asset('css/cover.css')}}" rel="stylesheet">


@endsection

@section('content')
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    
        <main class="px-3">
        <h1>Activitat Crud Comandes Breeze.</h1>
        <p class="lead">Se’ns demana realitzar una estructura WEB Laravel que ens permeti recollir informació de comandes, guardant aquesta informació en una base de dades. L’aplicatiu tindrà una vista inicial, de presentació, una vista que mostrarà el llistat de les comandes i els seus usuaris, una vista que mostrarà les dades d’un registre d’una única comanda, una vista amb un formulari per poder afegir noves comandes, una vista amb un formulari per poder editar comandes existents </p>
        <p class="lead">
            <a href="/comanda" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Ver más</a>
        </p>
        </main>
    
        <footer class="mt-auto text-white-50">
        <p>Fet per <a href="https://instagram.com/daniieelgs" class="text-white">  Daniel Garcia</a>.</p>
        </footer>
    </div>


@endsection

