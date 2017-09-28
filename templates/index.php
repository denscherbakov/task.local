<!doctype html>
<html lang="ru">
<head>
    <?php include __DIR__ . '/blocks/head.php'; ?>
</head>
<body>
    <div class="container auth-block">

        <?php if ($_SESSION['auth_error']): ?>
            <p class="alert alert-danger auth-error">
                    <?= $_SESSION['auth_error']; ?>
            </p>
        <?php endif; ?>

        <?php include __DIR__ . '/blocks/login_form.php'; ?>
    </div>
</body>
</html>