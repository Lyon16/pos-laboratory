<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System - Customers</title>

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

        .table thead {
            background-color: #1e293b;
            color: white;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
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

    <h2 class="page-title mb-2">Customer Accounts</h2>
    <p class="text-muted mb-4">
        View and manage customer information.
    </p>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Customer List</h5>

                <a href="<?= site_url('customers/new') ?>"
                   class="btn btn-primary">
                    + Add New Customer
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($customers)): ?>
                            <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?= esc($customer['id']) ?></td>
                                <td><?= esc($customer['full_name']) ?></td>
                                <td><?= esc($customer['email']) ?></td>
                                <td><?= esc($customer['phone'] ?? '') ?></td>

                                <td>
                                    <a href="<?= site_url('customers/edit/' . $customer['id']) ?>"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No customers found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
