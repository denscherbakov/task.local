<!doctype html>
<html lang="ru">
<head>
    <?php include __DIR__ . '/blocks/head.php'; ?>
</head>
<body>
<div class="container">
    <a href="/auth/logout/">Logout</a>

    <?php if (!empty($this->products)): ?>
        <table class="table table-bordered table-hover product-table">
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Рейтинг</th>
                <th>Комментарий</th>
            </tr>

            <?php foreach ($this->products as $product): ?>
                <tr>
                    <td><a href="/product/one/<?= $product->id; ?>"><?= $product->name; ?></a></td>
                    <td><?= $product->price; ?></td>
                    <td><?php include __DIR__ . '/blocks/ratings_form.php'; ?></td>
                    <td><?php include __DIR__ . '/blocks/comments_form.php'; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>