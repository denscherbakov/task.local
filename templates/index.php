<!doctype html>
<html lang="ru">
<head>
    <?php include __DIR__ . '/blocks/head.php'; ?>
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/blocks/login_form.php'; ?>

        <?php if ($this->results['items'] !== null): ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Title</td>
                    <td>Link</td>
                </tr>

                <?php foreach ($this->results['items'] as $item): ?>
                    <tr>
                        <td><?php echo $item['title']; ?></td>
                        <td><a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['link']; ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>