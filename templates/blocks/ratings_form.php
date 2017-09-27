<div class="rating-form">
    <form method="post" action="/rating/add">
        <div class="form-group">
            <select name="rating">
                <?php
                foreach ($this->userActivities['ratings'] as $rating): ?>
                    <?php if($rating->product_id == $product->id): ?>
                        <option value="1" <?php if($rating->rate == 1) echo 'selected'; ?>>1</option>
                        <option value="2" <?php if($rating->rate == 2) echo 'selected'; ?>>2</option>
                        <option value="3" <?php if($rating->rate == 3) echo 'selected'; ?>>3</option>
                        <option value="4" <?php if($rating->rate == 4) echo 'selected'; ?>>4</option>
                        <option value="5" <?php if($rating->rate == 5) echo 'selected'; ?>>5</option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="product" value="<?= $product->id; ?>">

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Rate</button>
        </div>
    </form>
</div>