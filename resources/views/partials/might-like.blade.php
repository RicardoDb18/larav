<div class="ui main container">
    <h2 class="ui header">
        También te podría gustar esto..
    </h2>

    <div class="ui four doubling stackable cards">

        @foreach ($mightLike as $product)

            @include('partials.product')

        @endforeach

    </div>
</div>
