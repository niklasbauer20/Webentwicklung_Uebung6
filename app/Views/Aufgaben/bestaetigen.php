<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="Aufgaben/submit_edit" method="post">
            <input type="hidden" name="id" id="id" value="<?=isset($aufgabe['id']) ? $aufgabe['id']: ''?>" >
            <div class="form-group">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" disabled name="username" value="<?=isset($aufgabe['name']) ? $aufgabe['name']: ''?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">E-Mail-Adresse:</label>
                <input type="text" class="form-control" id="email" name="email" disabled value="<?=isset($aufgabe['beschreibung']) ? $aufgabe['beschreibung']: ''?>">
            </div>
            <div class="mt-3"><button type="submit" name="btnBestaetigen"  id="btnBestaetigen" class="btn btn-danger">Löschen</button>
                <button type="submit" name="btnReset" id="btnReset" class="btn btn-success">Abbrechen</button>
            </div>
        </form>
    </div>
</div>
