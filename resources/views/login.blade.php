<!DOCTYPE html>
<html>
<head>
    <title>Login & Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="loginTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="mahasiswa-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa" type="button" role="tab">Mahasiswa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Registrasi</button>
            </li>
        </ul>

        <div class="tab-content p-4 border border-top-0 bg-white" id="loginTabsContent">

            <!-- Login Mahasiswa -->
            <div class="tab-pane fade" id="mahasiswa" role="tabpanel">
                <h4>Login Mahasiswa</h4>
                <form action="{{ route('mahasiswa.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>

            <!-- Registrasi Mahasiswa -->
            <div class="tab-pane fade" id="register" role="tabpanel">
                <h4>Registrasi Mahasiswa</h4>
                <form action="{{ route('mahasiswa.register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-success">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (biar tab bisa jalan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
