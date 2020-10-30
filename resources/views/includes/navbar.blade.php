
<!-- Following Menu -->
<div class="ui top fixed large menu">
    <div class="ui container">
        <a href="{{ route('home') }}">
            <img src="/images/logo.png"  style="width:130px;">
        </a>
        <a class="item">Restaurantes</a>
        <a class="item" href="{{ route('shop.index') }}">Comidas</a>
        <a class="item">Blog</a>

        <div class="right menu">
            <div class="item">
                <div class="ui transparent icon input">
                  <i class="search icon"></i>
                  <input type="text" placeholder="Que te apetece?">
                </div>
            </div>

            <div class="item">
                <a class="ui button" href="{{ route('cart.index') }}">
                    <i class="shopping cart icon"></i>
                    @if(Cart::instance('default')->count())
                        <div class="floating ui red circular label">
                            {{ Cart::instance('default')->count() }}
                        </div>
                    @endif
                </a>
            </div>
               <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <a class="item" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>                          
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
    </div>
</div>

</html>

