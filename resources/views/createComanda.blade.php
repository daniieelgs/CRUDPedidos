@extends('layouts.master')

@section('content')
        
    <div class="card text-center formCardCenter">
        <div class="card-header">
            Crear comanda
        </div>
        <div class="card-body">

            
            <form class="row g-3 needs-own-validation" novalidate id="form" action="/comanda" method="POST">
                
                @csrf

                <div class="col-12 form-floating">
                    <input type="text" class="form-control @error('product') is-invalid @enderror" id="product" name="product" placeholder=" " value="{{old('product')}}" required>
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
                    <input type="number" class="form-control regex-check @error('amount') is-invalid @enderror" data-regex="[0-9]+" id="amount" name="amount" placeholder=" " value="{{old('amount')}}">
                    <label for="amount">Amount</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>

                <div class="col-12 form-floating">
                    <input class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder=" " value="{{ old('address') }}" required>
                    <label for="description">Address</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>

                <div class="col-12 form-floating">
                    <input type="number" class="form-control regex-check @error('price') is-invalid @enderror" data-regex="[0-9]+" id="price" name="price" placeholder=" " value="{{old('price')}}">
                    <label for="price">Price</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>
                
                <div class="col-12 form-floating">
                    <input type="number" class="form-control regex-check @error('priceIVA') is-invalid @enderror" data-regex="[0-9]+" id="priceIVA" name="priceIVA" placeholder=" " value="{{old('priceIVA')}}">
                    <label for="priceIVA">PriceIVA</label>
                    <div class="invalid-feedback">
                        Camp obligatori.
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Crear</button>
                </div>
            </form>      
            
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/validateForm.js')}}"></script>
@endsection