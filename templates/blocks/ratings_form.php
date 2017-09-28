<div class="rating-form">
    <form method="post" action="/rating/add">
        <div class="form-group">
            <select name="rating">
                <?php if (!empty($product->ratings)): ?>
                    <option value="1" <?php if($product->ratings->rate == 1) echo 'selected'; ?>>1</option>
                    <option value="2" <?php if($product->ratings->rate == 2) echo 'selected'; ?>>2</option>
                    <option value="3" <?php if($product->ratings->rate == 3) echo 'selected'; ?>>3</option>
                    <option value="4" <?php if($product->ratings->rate == 4) echo 'selected'; ?>>4</option>
                    <option value="5" <?php if($product->ratings->rate == 5) echo 'selected'; ?>>5</option>
                <?php else: ?>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php endif; ?>
            </select>
        </div>

        <input type="hidden" name="product" value="<?= $product->id; ?>">

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Rate</button>
        </div>
    </form>
</div>