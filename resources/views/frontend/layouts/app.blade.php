<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'LARAVEL' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @stack('css')
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('frontend.layouts.partials.navbar')

    <main class="flex-fill py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('frontend.layouts.partials.footer')

    <!-- Bootstrap & SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 JS (di bawah jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('js')
    @if(session('success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    @elseif(session('error'))
    <script>
        Swal.fire({
            position: "center",
            icon: "error",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    @endif

</body>

</html>