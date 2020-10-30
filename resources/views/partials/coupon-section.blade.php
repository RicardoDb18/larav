@if(session()->has('coupon'))

    <div class="ui small header">Ha utilizado el cupón a continuación.</div>

    <div class="ui large blue label">
        {{ session('coupon')['name'] }}
        <i class="delete icon" onclick="document.getElementById('remove-coupon').submit()"></i>

        <form action="{{ route('coupon.destroy') }}" id="remove-coupon" method="POST" style="display: none">
            @csrf @method('DELETE')
        </form>
    </div>

@else

    <div class="ui small header">Tienes un cupon de descuento?</div>

    <form class="ui form" action="{{ route('coupon.store') }}" method="POST">
        @csrf

        <div class="three fields">
            <div class="field">
                <input type="text" name="coupon" placeholder="Codigo promocional" required>
            </div>
            <div class="field">
                <button class="ui button" type="submit">Aplicar cupon</button>
            </div>
        </div>
    </form>

@endif
