<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="loginTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab">Admin</button>
            </li>
        </ul>

        <div class="tab-content p-4 border border-top-0 bg-white" id="loginTabsContent">
            <!-- Login Admin -->
            <div class="tab-pane fade show active" id="admin" role="tabpanel">
                <h4>Login Admin</h4>
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="username" name="username" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>