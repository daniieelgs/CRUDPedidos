@extends('layouts.master')

@section('content')
        
    <div class="card text-center formCardCenter">
        <div class="card-header">
            Editar Comanda
        </div>
        <div class="card-body">

            
            <form class="row g-3 needs-own-validation" novalidate id="form" action="/comanda/{{$dada->id}}" method="POST">
                
                @csrf

                @method('PUT')

                <div class="col-12 form-floating">
                    <input type="text" class="form-control @error('product') is-invalid @enderror" id="product" name="product" placeholder=" " data-oldvalue = "{{old('product')}}" value="{{$dada->product}}" required>
                    <label for="product">Product</label>
                    <div class="invalid-feedback">
                        
                        @if($errors->has('product'))
                            {{$errors->first('product')}}
                        @else
                            Camp obligatori.
                        @endif  
                    </div>
                </div>
                <div class="col-12 form-floating">
                    <input type="number" class="form-control regex-check @error('amount') is-invalid @enderror" data-regex="[0-9]+" id="amount" name="amount" placeholder=" " data-oldvalue="{{old('amount')}}" value="{{$dada->amount}}">
                    <label for="amount">Amount</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>

                <div class="col-12 form-floating">
                    <input class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder=" " data-oldvalue="{{ old('address') }}" value="{{$dada->address}}" required>
                    <label for="description">Address</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>

                <div class="col-12 form-floating">
                    <input type="number" class="form-control regex-check @error('price') is-invalid @enderror" data-regex="[0-9]+" id="price" name="price" placeholder=" " data-oldvalue="{{old('price')}}" value="{{$dada->price}}">
                    <label for="price">Price</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>
                
                <div class="col-12 form-floating">
                    <input type="number" class="form-control regex-check @error('priceIVA') is-invalid @enderror" data-regex="[0-9]+" id="priceIVA" name="priceIVA" placeholder=" " data-oldvalue="{{old('priceIVA')}}" value="{{$dada->priceIVA}}">
                    <label for="priceIVA">PriceIVA</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Actualitzar</button>
                </div>
            </form>      
            
        </div>
    </div>
@endsection

@section('script')

    <script src="{{asset('js/validateForm.js')}}"></script>
    <script type="text/javascript" src="https://chir.ag/projects/ntc/ntc.js"></script>
@endsection