
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System - Customers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f4f6f9;">

<nav class="navbar navbar-dark navbar-expand-lg"
     style="background-color: #1e293b;">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('customers') ?>">
            POS Management System
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="<?= site_url('customers') ?>">
                Customers
            </a>
            <a class="nav-link" href="<?= site_url('users') ?>">
                User Accounts
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h2 class="fw-bold">Customer Accounts</h2>
    <p class="text-muted">Customer information stored in MySQL.</p>

    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body p-4">

            <h5 class="mb-3">Customer List</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= esc($customer['id']) ?></td>
                            <td><?= esc($customer['full_name']) ?></td>
                            <td><?= esc($customer['email']) ?></td>
                            <td><?= esc($customer['phone'] ?? '') ?></td>
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
