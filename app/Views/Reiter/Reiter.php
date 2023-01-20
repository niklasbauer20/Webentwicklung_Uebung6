<div class="col-8">
        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-7">Beschreibung</th>
                <th scope="col" class="col-2 text-end"></th>
                <th scope="col" class="col-2 text-end"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($allreiter as $item): ?>
                <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['beschreibung']?></td>
                <td>
                    <form action="Reiter" method="post">
                        <a>
                            <input type="hidden" value="<?=$item['id']?>" name="id" id="id">
                            <button class='btn' name="btnBearbeiten"><i class='bi bi-pencil-square text-primary'></i> </button>
                        </a>
                    </form>
                </td><td>
                        <form action="Reiter/loeschenbestaetigen" method="post">
                            <a>
                                <input type="hidden" value="<?=$item['id']?>" name="id" id="id">
                                <button class='btn' name="btnLoeschen"><i class='bi bi-trash3 text-primary'></i></button>
                            </a>
                        </form>
                </td>

            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="h3 mt-5">
            <form action="Reiter/submit_edit" method="post">
            <?= (isset($reiter['id']))? 'Bearbeiten': 'Erstellen' ?>
        </div>
    <input type="hidden" id="id" name="id" value="<?=(isset($reiter['id'])? $reiter['id'] : '') ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= (isset($reiter['name']))? $reiter['name'] : '' ?>" placeholder="Reiter">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung</label>
            <textarea placeholder="Beschreibung" class="form-control" id="beschreibung" name="beschreibung" rows="3"><?= (isset($reiter['beschreibung']))? $reiter['beschreibung'] : '' ?></textarea>
        </div>
        <div><button type="submit" name="btnSpeichern" id="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" id="btnReset" class="btn btn-success">Reset</button>
        </div>
    </form>
    </div>