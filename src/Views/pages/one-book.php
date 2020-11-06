<div>
    <h1>Description</h1>
</div>

<div class="card-deck mb-3 text-center">
    <?php
        if (!isset($book)) {
            return;
        }
    ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?=$book->title ?></h5>
                <p class="card-text">Author: <?=$book->author ?></p>
                <p class="card-text">Date: <?=$book->published_date ?></p>
                <p class="card-text">Price: <?=$book->price ?></p>
            </div>
        </div>
</div>
