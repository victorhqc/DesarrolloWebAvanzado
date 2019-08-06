<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('products')}}">Catálogo</a>
    <a class="navbar-brand" href="{{route('productAdd')}}">Agregar producto</a>
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
            <li>Hello World</li>
        </ul>
    </div>
    <div>
        <span class="navbar-text mr-3">
            Test
        </span>
        <span class="navbar-text">
            <a class="btn btn-outline-info" href="<?php echo url("/logout") ?>" role="button">
                Cerrar sesión
            </a>
        </span>
    </div>
</nav>
