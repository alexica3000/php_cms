<div>
    <h1>My books</h1>
</div>

<div class="card-deck mb-3 text-center">

    <?php
        if (!isset($books)) {
            return;
        }

        foreach ($books as $book) {
    ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?=$book->title ?></h5>
                <p class="card-text">Author: <?=$book->author ?></p>
                <p class="card-text">Date: <?=$book->published_date ?></p>
                <a href="/books/<?=$book->id ?>" class="btn btn-primary">Details</a>
            </div>
        </div>

    <?php } ?>

</div>
