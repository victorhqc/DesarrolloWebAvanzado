<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('products')}}">Catálogo</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" role="navigation">
            @foreach ($route_paths as $path)
                <li class="nav-item">
                    <a
                        class="nav-link {{ $path['is_active'] ? 'active' : '' }}"
                        href="{{ url($path['path_name']) }}">
                        {{ $path['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" role="navigation">
        </ul>
    </div>
    <div>
        <span class="navbar-text mr-3">
            {{ (!empty($name) ? 'Bienvenido: '.$name : '') }}
            <img src="{{ $email_img }}" alt="{{ $email }}" title="{{ $email }}" />
        </span>
        <span class="navbar-text">
            <a class="btn btn-outline-info" href="{{ $login_url }}" role="button">
                {{ $login_text }}
            </a>
        </span>
    </div>
</nav>
