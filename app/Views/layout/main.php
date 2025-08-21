<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SaaS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">SaaS Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <?php if (session()->get('role_name') === 'super_admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>