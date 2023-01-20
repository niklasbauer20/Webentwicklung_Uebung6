
    <div class="col-8">
        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Aufgabenbezeichnung</th>
                <th scope="col" class="col-3">Beschreibung der Aufgabe</th>
                <th scope="col" class="col-2">Reiter</th>
                <th scope="col" class="col-2">Zuständig</th>
                <th scope="col" class="col-2"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($aufgaben as $item): ?>

                <tr>
                    <td><?=$item['name'] ?> </td>
                    <td><?= $item['beschreibung']?></td>
                    <td><?= $item['reiter'] ?></td>
                    <td><?= $item['zuständig'] ?></td>
                    <td><button class='btn'><i class='bi bi-pencil-square text-primary'></i> </button>
                       <button class='btn'><i class='bi bi-trash3 text-primary'></i></button> </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
        <div class="h3 mt-5">
            Bearbeiten/Erstellen:
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Aufgabenbezeichnung</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Aufgabe">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung der Aufgabe</label>
            <textarea placeholder="Beschreibung" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Erstellungsdatum</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="01.01.19">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">f&auml;llig bis:</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="01.01.19">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zugeh&ouml;riger Reiter:</label>
            <select class="form-select" name="reiterid" aria-label="Default select example">
                <option value="0" selected>--bitte wählen--</option>
                <?php foreach ($reiter as $item):?>
                    <option value="<?= $item['id']?>"><?= $item['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zust&auml;ndig:</label>
            <select class="form-select" name="mitarbeiterid" multiple>
                <?php foreach ($mitglieder as $item):?>
                <option class="bg-primary" value="<?= $item['id']?>"><?= $item['username']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div><button type="submit" name="btnSpeichern" id="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" id="btnReset" class="btn btn-success">Reset</button>
        </div>

    </div>

</div>

