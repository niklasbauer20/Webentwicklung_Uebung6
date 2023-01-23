
    <div class="col">
        <div class="row">

            <?php foreach ($reiter as $item):?>
            <div class="col">
            <div class="card">
            <ul class="list-group">
                <p class="card-header"><?= $item['name'] ?></p>
                <?php foreach ($aufgaben as $item2): ?>
                <?=($item2['reiter']==$item['id'])? "<div class='list-group-item'><b>".$item2['name']."</b>".$item2['mitglieder']."</div>": '' ?>

                <?php endforeach; ?>
                </ul></div></div>
            <?php endforeach; ?>

        </div>
    </div>