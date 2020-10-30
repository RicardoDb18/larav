@extends('layouts.app')

@section('header')

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

<div class="ui container masthead">

    <div class="ui breadcrumb">
        <a href="{{ route('home') }}" class="section">Inicio</a>
        <i class="right angle icon divider"></i>
        <a class="active section">Checkout</a>
    </div>

</div>

<div class="ui divider"></div>

<div class="main ui container">

    <h1 class="ui header">¡Bien, hagamos el pago!</h1>

</div>


<div class="ui vertical segment product">

    <div class="ui container">

        @include('partials.alert-message')

        <div class="ui grid">

            <div class="eight wide column">

                <h3 class="ui header">Detalles de facturación</h3>

                <form class="ui form" id="payment-form">
                    <div class="field">
                        <label>Correo electronico</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>

                    <div class="field">
                        <label>Nombre</label>
                        <input type="text" name="name" placeholder="Ingrese nombre">
                    </div>

                    <div class="field">
                        <label>Direccion</label>
                        <input type="text" name="address" placeholder="Ingrese direccion">
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Ciudad</label>
                                <input type="text" name="city" placeholder="Ingrese ciudad">
                            </div>
                            <div class="field">
                                <label>Provincia</label>
                                <input type="text" name="province" placeholder="Ingrese provincia">
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Codigo postal</label>
                                <input type="text" name="postal_code" placeholder="Cod postal">
                            </div>
                            <div class="field">
                                <label>Nro de telefono</label>
                                <input type="text" name="phone_number" placeholder="Ingrese numero">
                            </div>
                        </div>
                    </div>

                    <h3 class="ui header">Detalles de pago</h3>

                    <div class="field">
                        <label>Titular de la tarjeta</label>
                        <input type="text" name="email" placeholder="Ingrese nombre">
                    </div>

                    <div class="field">
                        <label for="card-element">Tarjeta de credito o debito</label>

                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        
                    </div>

                    {{-- <div class="field">
                        <label>Correo electronico</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <label>Nro tarjeta de credito</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Fecha expiracion</label>
                                <input type="text" name="city" placeholder="Enter City">
                            </div>
                            <div class="field">
                                <label>CVV</label>
                                <input type="text" name="province" placeholder="Enter Province">
                            </div>
                        </div>
                    </div> --}}

                    <div class="inline field">
                        <div class="ui toggle checkbox">
                          <input type="checkbox" tabindex="0" class="hidden">
                          <label>
                            Apruebo los términos y condiciones antes del pago.</label>
                        </div>
                    </div>

                    <button class="ui fluid button" type="submit" href="{{ route('bill.show') }}">Completar orden</button>
                </form>

            </div>

            <div class="seven wide column right floated">

                @if(Cart::count())

                    <h3 class="ui header">Tus pedidos</h3>

                    <div class="ui hidden divider"></div>

                    <div class="ui divided items">

                        @foreach (Cart::content() as $item)

                            @include('partials.order-item')

                        @endforeach

                    </div>

                @endif

                <div class="ui divider"></div>

                <div class="ui grid">
                    <div class="row two columns">
                        <div class="column">
                            <div class="ui list">
                                <div class="item">Subtotal</div>

                                @if(session()->has('coupon'))
                                    <div class="item">Descuento ({{ $code }})</div>

                                    <div class="item">Nuevo Subtotal </div>
                                @endif

                                <div class="item">IGV</div>

                                <div class="item">
                                    <div class="header">Total</div>
                                </div>
                            </div>
    
                        </div>
                        
                        <div class="column right aligned">
                            <div class="ui list">
                                <div class="item">{{ $subtotal }}</div>

                                @if(session()->has('coupon'))
                                    <div class="item">{{ $discount }}</div>

                                    <div class="item">{{ $newSubtotal}}</div>
                                @endif

                                <div class="item">{{ $newTax }}</div>

                                <div class="item">
                                    <div class="header">{{ $newTotal }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
                <div class="ui divider"></div>

                @include('partials.coupon-section')

            </div>

        </div>

    </div>
</div>

@endsection

@section('footer')

    <script src="/js/stripe-checkout.js"></script>

@endsection
