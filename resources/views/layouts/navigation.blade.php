<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Catálogo</a>
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
            <img src="{{ $email_img }}" alt="{{ $email }}" title="{{ $email }}" />
        </span>
        <span class="navbar-text">
            <a class="btn btn-outline-info" href="{{ $login_url }}" role="button">
                {{ $login_text }}
            </a>
        </span>
    </div>
</nav>
