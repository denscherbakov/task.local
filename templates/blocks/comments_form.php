<div class="comment-form">
    <form method="post" action="/comment/add">
        <div class="form-group">
            <textarea name="comment" class="form-control" required><?= $product->comments->comment; ?></textarea>
        </div>

        <input type="hidden" name="product" value="<?= $product->id; ?>">

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Send</button>
        </div>
    </form>
</div>