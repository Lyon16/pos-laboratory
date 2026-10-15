<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Form - POS System</title>

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

        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
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

<div class="container py-5" style="max-width:750px;">

    <?php $editing = !empty($user); ?>

    <h2 class="page-title mb-4">
        <?= $editing ? 'Edit User Account' : 'New User Account' ?>
    </h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form method="post"
                  enctype="multipart/form-data"
                  action="<?= $editing
                      ? site_url('users/update/' . $user['id'])
                      : site_url('users/create') ?>">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           maxlength="50"
                           value="<?= esc(old('username', $user['username'] ?? '')) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           maxlength="100"
                           value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>"
                           required>
                </div>

                <?php if ($editing): ?>

                    <div class="mb-3">
                        <label class="form-label">Profile Picture</label>

                        <?php if (!empty($user['avatar'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>"
                                     class="avatar-preview"
                                     alt="Current avatar">
                            </div>
                        <?php endif; ?>

                        <input type="file"
                               name="avatar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,image/jpeg,image/png">

                        <small class="text-muted">
                            JPG or PNG only. Maximum file size: 2MB.
                        </small>
                    </div>

                <?php endif; ?>

                <button type="submit" class="btn btn-primary">
                    <?= $editing ? 'Update User' : 'Save User' ?>
                </button>

                <a href="<?= site_url('users') ?>"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
