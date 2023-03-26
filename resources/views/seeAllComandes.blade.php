@extends('layouts.master')

@section('modal')
    
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar comanda</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Estas segur de que desitjar eliminar la comanda '<i><span class="comanda-name"></span></i>'?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
            <form class="form-delete" action="" method="POST">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-delete">Eliminar</button>
            </form>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('content')
    
    @if (!isset($dades) || count($dades) == 0)
        <h3 class="not-results">Sense resultats</h3>
    @else
        <table class="table table-stripped web-table">
            <thead>
                <th>Product</th>
                <th>Amount</th>
                <th>Address</th>
                <th>Price</th>
                <th>Price IVA</th>
                <th>User</th>
                <th></th>
            </thead>    

            <tbody>

                @forelse ($dades as $dada)

                    <tr>
                        <td>{{$dada->product}}</td>
                        <td>{{$dada->amount}}</td>
                        <td><address>{{$dada->address}}</address></td>
                        <td>{{$dada->price}}</td>
                        <td>{{$dada->priceIVA}}</td>
                        <td style="text-align: center">{{$dada->user->name}}<br/><a href="mailto:{{$dada->user->email}}">{{$dada->user->email}}</a></td>
                        <td class="button-actions-3">
                            <button type="button" class="btn btn-outline-success web-link" data-link="/comanda/{{$dada->id}}">Veure</button>
                            @if($username != null && $username->id == $dada->user->id)
                                <button type="button" class="btn btn-outline-warning web-link" data-link="/comanda/{{$dada->id}}/edit">Editar</button>
                                <button type="button" class="btn btn-outline-danger delete-web" data-comandaId="{{$dada->id}}" data-comandaName="{{$dada->id}}">Esborrar</button>
                            @endif
                        </td>
                    </tr>
                    
                @empty

                @endforelse

            </tbody>
        </table>

    @endif

@endsection

@section('script')
    
    <script src="{{asset('js/comandes.js')}}"></script>

@endsection