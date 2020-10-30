<div class="card">
    <a href="{{ $product->path() }}" class="image">
        <img src="/images/salchi.jpeg">
    </a>
    <div class="content">
        <a href="{{ $product->path() }}" class="header">{{ $product->name }}</a>
        <div class="meta">
            <span class="date">Salchipapa</span>
        </div>
        <div class="description">
            Las mejores pizzas las encuentras aqui.
        </div>
    </div>
    <div class="extra content">
        <span class="right floated">
            Precio {{ $product->present_price }}
        </span>
        <span>
            <i class="user icon"></i>
            35 Amigos
        </span>
    </div>
</div>
