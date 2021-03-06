<!DOCTYPE html>
<html>
<head>
    <title>Become Hero</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">PositronX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dataUsers') }}">User</a>
                    </li>
                    @endrole
                    {{-- <li class="nav-item">
                        <a href="{{ route('showData') }}" class="nav-link">Employee</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('dataHobbies') }}" class="nav-link">Hobby</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ManyToManyPegawai') }}" class="nav-link">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ManyToManyPegawai') }}" class="nav-link">DB Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>

            <div class="float-right">
                Welcome!
                <b>
                {{ auth()->user()->name }}
                @foreach(auth()->user()->getRoleNames() as $role)
                    ({{ $role }})
                @endforeach
                </b>
            </div>

            {{-- {{ dd($data) }} --}}
        </div>
    </nav>
    <div class="container">
            {{-- {{ Auth::user()->getRoleNames(); }} --}}
        @yield('content')
    </div>
</body>
</html>
