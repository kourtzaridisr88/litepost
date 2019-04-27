<aside class="sidebar">
    <a class="sidebar__brand" href="#"><span>Lite</span>post</a>
    <div class="sidebar__title">Navigation</div>
    <nav class="nav nav--horizontal nav--dark" role="navigation">
        <ul class="nav__navbar">
            <li class="nav__navbar-item nav__navbar-item--full-width">
                <a class="nav__navbar-link" href="{{ route('litepost.dashboard') }}"><i class="fab fa-dashcube"></i> Dashboard</a>
            </li>
            @foreach($globalPostTypes as $pt)
                <li class="nav__navbar-item nav__navbar-item--full-width">
                    <a class="nav__navbar-link" href="{{ route('litepost.posts', ['postType' => $pt->id]) }}"><i class="fab fa-dashcube"></i> {{ $pt->name_plural }}</a>
                </li>
            @endforeach
            <li class="nav__navbar-item nav__navbar-item--full-width">
                <a class="nav__navbar-link" href="{{ route('litepost.post-types') }}"><i class="fab fa-dashcube"></i> Post types</a>
            </li>
            <li class="nav__navbar-item nav__navbar-item--full-width">
                <a class="nav__navbar-link" href="{{ route('litepost.subscribers') }}"><i class="fab fa-dashcube"></i> Subscribers</a>
            </li>
        </ul>
    </nav><!-- ./sidenav -->
</aside>