
    <div class="col-8">
        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Aufgabenbezeichnung</th>
                <th scope="col" class="col-3">Beschreibung der Aufgabe</th>
                <th scope="col" class="col-2">Reiter</th>
                <th scope="col" class="col-2">Zuständig</th>
                <th scope="col" class="col-1"></th>
                <th scope="col" class="col-1"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aufgaben as $item): ?>

                <tr>
                    <td><?=$item['name'] ?> </td>
                    <td><?= $item['beschreibung']?></td>
                    <td><?= $item['reiter'] ?></td>
                    <td><?= $item['zuständig'] ?></td>
                    <td><form action="Aufgaben" method="post">
                            <a>
                                <input type="hidden" value="<?=$item['id']?>" name="id" id="id">
                                <button class='btn' name="btnBearbeiten"><i class='bi bi-pencil-square text-primary'></i> </button>
                            </a>
                        </form>
                    </td><td>
                        <form action="Aufgaben" method="post">
                            <a>
                                <input type="hidden" value="<?=$item['id']?>" name="id" id="id">
                                <button class='btn' name="btnLoeschen"><i class='bi bi-trash3 text-primary'></i></button>
                            </a>
                        </form>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
        <div class="h3 mt-5">
            Bearbeiten/Erstellen:
        </div>
        <form action="Aufgaben/submit_edit" method="post">
            <input type="hidden" name="id" id="id" value="<?= (isset($aufgabe['id']))? $aufgabe['id'] : ''  ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Aufgabenbezeichnung</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Aufgabe" value="<?= (isset($aufgabe['name']))? $aufgabe['name'] : ''  ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung der Aufgabe</label>
            <textarea placeholder="Beschreibung" class="form-control" id="beschreibung" name="beschreibung" rows="3"><?= (isset($aufgabe['beschreibung']))? $aufgabe['beschreibung'] : ''  ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Erstellungsdatum</label>
            <input type="date" class="form-control" id="erstellungsdatum" name="erstellungsdatum" placeholder="01.01.2023" value="<?= (isset($aufgabe['erstellungsdatum']))? $aufgabe['erstellungsdatum'] : ''  ?>" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">f&auml;llig bis:</label>
            <input type="date" class="form-control" id="fälligkeitsdatum" name="fälligkeitsdatum" placeholder="31.12.2023" value="<?= (isset($aufgabe['fälligkeitsdatum']))? $aufgabe['fälligkeitsdatum'] : ''  ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zugeh&ouml;riger Reiter:</label>
            <select class="form-select" name="reiter" id="reiter" aria-label="Default select example">
                <option value="<?= (isset($aufgabe['reiter']))? $aufgabe['reiterid'] : '0'  ?>" disabled selected><?= (isset($aufgabe['reiter']))? $aufgabe['reiter'] : '-bitte wählen-'  ?></option>
                <?php foreach ($reiter as $item):?>
                    <option value="<?= $item['id']?>"><?= $item['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zust&auml;ndig:</label>
            <select class="form-select" name="mitgliederids[]" id="mitgliederids[]" multiple size="5">
                <?php foreach ($mitglieder as $item):?>
                <option

                    <?php  if (isset($aufgabenmitglieder))foreach ($aufgabenmitglieder as $item2):?>

                        <?=($item['id']==$item2['mitgliedid'])? 'class="bg-primary"' : '';?>


                    <?php endforeach  ?>
                    value="<?= $item['id']?>"><?= $item['username']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div><button type="submit" name="btnSpeichern" id="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" id="btnReset" class="btn btn-success">Reset</button>
        </div>

    </div>
    </form>
</div>

