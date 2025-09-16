<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <!-- jQuery + Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body class="bg-light">
<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">Polling App</span>
        <div class="d-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row min-vh-100">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar py-3">
            <div class="sidebar-header text-center text-white mb-4 fs-4 fw-bold">
                Dashboard
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Polls</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('polls.index')}}">Results</a>
                </li> --}}

            </ul>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

</body>
</html>
