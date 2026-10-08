
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System - Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #1e293b;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .page-title {
            font-weight: bold;
            color: #1e293b;
        }

        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('customers') ?>">
            POS Management System
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="<?= site_url('customers') ?>">
                Customers
            </a>
            <a class="nav-link active" href="<?= site_url('users') ?>">
                User Accounts
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h2 class="page-title mb-2">User Accounts</h2>
    <p class="text-muted mb-4">
        View registered staff and user accounts.
    </p>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <h5 class="mb-4">Staff List</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['id']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
