<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-white">
    <div class="d-flex align-items-center">
        <img src="{{asset('asset/img/tamansiswa.png')}}" class="rounded d-block mr-2" width="10%" height="10%">
        <div>
            <a class="navbar-brand mr-auto mr-lg-0 text-muted" href="#">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </div>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav ml-auto text-muted">
            <!-- Authentication Links -->

            @auth
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-muted"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>