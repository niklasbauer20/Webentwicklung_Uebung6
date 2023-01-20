<div class="col-8">
        <h2>Projekt Auswählen:</h2>

    <form action="Projekte" method="post">
        <div class="form-group">
        <select class="form-select" name="id" aria-label="Default select example">
            <option selected value="<?= (isset($_SESSION['projektid']))? $_SESSION['projektid'] : 0 ?>"><?=(isset($_SESSION['projektname']))? $_SESSION['projektname'] : '-bitte wählen-'  ?></option>

            <?php foreach($projecte as $item): ?>

                   <option value="<?= $item['id'] ?>"><?= $item['Name'] ?></option>;


            <?php endforeach; ?>
        </select>

        <button type="submit" name="btnAuswaehlen" id="btnAuswaehlen" class="btn btn-primary mt-4">Auswählen</button>
        <button type="submit" name="btnBearbeiten" id="btnBearbeiten" class="btn btn-primary mt-4">Bearbeiten</button>
        <button type="submit" name="btnLoeschen" id="btnLoeschen" class="btn btn-danger mt-4">Löschen</button>
        </div>
    </form>
        <div class="mt-4">
            <form action="Projekte/submit_edit" method="post">
                <h2>Projekt bearbeiten/erstellen:</h2>
                <input type="hidden" name="id" id="id" value="<?=(isset($project['id']))? $project['id'] : '' ?>">
            <div>Projektname:</div>
            <input type="text" name="Name" id="Name" value="<?=isset($project['Name']) ? $project['Name']: ''?>" class="form-control mt-1" placeholder="Projekt">

            <div class="mt-4">Projektbeschreibung:</div>
            <textarea name="Beschreibung" id="Beschreibung" class="form-control mt-1" placeholder="Beschreibung"><?=isset($project['Beschreibung']) ? $project['Beschreibung']: ''?></textarea>
            <button type="submit" name="btnSpeichern" id="btnSpeichern" class="btn btn-primary mt-2">Speichern</button>
            <button type="submit" name="btnReset" id="btnReset" class="btn btn-info mt-2 text-white">Reset</button>
            </form>
        </div>


    </div>