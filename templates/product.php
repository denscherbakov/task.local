<!doctype html>
<html lang="ru">
<head>
    <?php include __DIR__ . '/blocks/head.php'; ?>
</head>
<body>
<div class="container">
    <?php if ($this->product): ?>
        <table class="table table-bordered table-hover product-table">
            <tr>
                <th>Название</th>
                <th>Цена</th>
            </tr>
            <tr>
                <td><?= $this->product->name; ?></td>
                <td><?= $this->product->price; ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <?php if ($this->userActivities['ratings']): ?>
        <h4>Отзывы</h4>
        <hr>
        <?php foreach ($this->userActivities['ratings'] as $rate): ?>
            <p><strong><?= $rate->user; ?></strong>:
                <span style="color: #3c763d">Оценка - <?= $rate->rate; ?>.</span>
                <?php foreach ($this->userActivities['comments'] as $comment): ?>
                    <?php if ($rate->user_id == $comment->user_id): ?>
                        <span style="color: #1b6d85">Комментарий - <?= $comment->comment; ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><strong>Суммарный рейтинг: <?= $this->userActivities['ratesSum'] ?></strong></p>
    <p><strong>Средний рейтинг: <?= $this->userActivities['ratesAvg'] ?></strong></p>

</div>
</body>
</html>