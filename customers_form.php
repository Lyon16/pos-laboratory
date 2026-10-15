
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Customer Form - POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background:#f4f6f9;">

<nav class="navbar navbar-dark"
     style="background:#1e293b;">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('customers') ?>">
            POS Management System
        </a>
    </div>
</nav>

<div class="container py-5" style="max-width:700px;">

    <?php $editing = !empty($customer); ?>

    <h2 class="fw-bold mb-4">
        <?= $editing ? 'Edit Customer' : 'New Customer' ?>
    </h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form method="post"
                  action="<?= $editing
                      ? site_url('customers/update/' . $customer['id'])
                      : site_url('customers/create') ?>">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           maxlength="100"
                           value="<?= esc(old('full_name',
                               $customer['full_name'] ?? '')) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           maxlength="100"
                           value="<?= esc(old('email',
                               $customer['email'] ?? '')) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text"
                           name="phone"
                           class="form-control"
                           maxlength="20"
                           value="<?= esc(old('phone',
                               $customer['phone'] ?? '')) ?>">
                </div>

                <button type="submit" class="btn btn-primary">
                    <?= $editing ? 'Update Customer' : 'Save Customer' ?>
                </button>

                <a href="<?= site_url('customers') ?>"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
