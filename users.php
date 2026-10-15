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

        .avatar-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            background: #e2e8f0;
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
        View and manage registered staff accounts.
    </p>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Staff List</h5>

                <a href="<?= site_url('users/new') ?>"
                   class="btn btn-primary">
                    + Add New User
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Avatar</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <?php
                                    $avatar = !empty($user['avatar'])
                                        ? base_url('uploads/avatars/' . rawurlencode($user['avatar']))
                                        : base_url('images/default-avatar.png');
                                ?>

                                <tr>
                                    <td>
                                        <img src="<?= esc($avatar, 'attr') ?>"
                                             alt="User Avatar"
                                             class="avatar-img"
                                             onerror="this.onerror=null;this.src='<?= esc(base_url('images/default-avatar.png'), 'attr') ?>';">
                                    </td>

                                    <td><?= esc($user['id']) ?></td>
                                    <td><?= esc($user['username']) ?></td>
                                    <td><?= esc($user['full_name']) ?></td>

                                    <td>
                                        <a href="<?= site_url('users/edit/' . $user['id']) ?>"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No users found.
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
