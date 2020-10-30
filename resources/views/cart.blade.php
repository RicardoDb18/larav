@extends('layouts.app')

@section('content')

<div class="ui container masthead">

    <div class="ui breadcrumb">
        <a href="{{ route('home') }}" class="section">Inicio</a>
        <i class="right angle icon divider"></i>
        <a class="active section">Carrito</a>
    </div>

</div>

<div class="ui divider"></div>

<div class="ui vertical segment product">
    <div class="ui grid container">

        <div class="twelve wide column">

            @include('partials.alert-message')

            @if(Cart::count())

                <h1 class="ui header">{{ Cart::count() }} item(s) en tu carrito</h1>
                <p class="lead">Tienes algo en tu carrito</p>

                <div class="ui hidden divider"></div>

                <div class="ui divided items">

                    @foreach (Cart::content() as $item)

                        @include('partials.cart-item')

                    @endforeach

                </div>

                @include('partials.coupon-section')
                
                <div class="ui divider"></div>
    
                <div class="ui grid">
                    <div class="two column row">
                        <div class="column">       
                            El envío es gratuito porque nuestra empresa es increíble.  :)
                        </div>
                        <div class="column right aligned">
                            <table class="ui cart-amount">
                                <tbody>
                                    <tr>
                                        <td>Subtotal:</td>
                                        <td>{{ $subtotal }}</td>
                                    </tr>

                                    @if(session()->has('coupon'))
                                        <tr>
                                            <td>Descuento ({{ $code }}):</td>
                                            <td>{{ $discount }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nuevo Subtotal:</td>
                                            <td>{{ $newSubtotal }}</td>
                                        </tr>
                                    @endif
    
                                    <tr>
                                        <td>Tax ({{ $tax }}):</td>
                                        <td>{{ $newTax }}</td>
                                    </tr>

                                    <tr>
                                        <td><h4 class="ui header">Total:</h2></td>
                                        <td><h4 class="ui header">{{ $newTotal }}</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="ui divider"></div>
    
                <div>
                    <a href="{{ route('shop.index') }}" class="ui button">
                        <i class="shopping cart icon"></i> Seguir comprando
                    </a>
                    <a href="{{ route('checkout.index') }}" class="ui right floated primary button">
                        <i class="cc visa icon"></i> Proceder a pagar
                    </a>
                </div>

            @else

                <h1 class="ui header">No hay comidas en tu bandeja!</h1>
                <p class="lead">Intente explorar y agregue comidas</p>

                <a class="ui button" href="{{ route('shop.index') }}">
                    <i class="shopping cart icon"></i>
                    Seguir comprando
                </a>

            @endif

            <div class="ui divider"></div>

            @if(Cart::instance('saveForLater')->count())

                <h1 class="ui header">
                    {{ Cart::instance('saveForLater')->count() }} item(s) saved for later
                </h1>
                <p class="lead">Tienes algo en tu carrito</p>

                <div class="ui hidden divider"></div>

                <div class="ui divided items">

                    @foreach (Cart::instance('saveForLater')->content() as $item)

                        @include('partials.saved-for-later-item')

                    @endforeach

                </div>

            @else

                <h1 class="ui header">No hay comidas guardadas!</h1>
                <p class="lead">Intente buscar algo...</p>

            @endif

        </div>

    </div>
</div>

<div class="divider"></div>

@include('partials.might-like')


@endsection
