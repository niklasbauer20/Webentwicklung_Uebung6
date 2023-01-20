
    <div class="col">
        <div class="row">

            <?php foreach ($reiterundaufgaben as $item):?>
            <div class="col">
            <div class="card">
            <ul class="list-group">
                <p class="card-header"><?= $item['name'] ?></p>
                <div class="list-group-item"><?= $item['eintraege'] ?></div>
                </ul></div></div>
            <?php endforeach; ?>

        </div>
    </div>