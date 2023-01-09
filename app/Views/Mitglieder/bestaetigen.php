<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
<form action="mitglieder/submit_edit" method="post">
    <input type="hidden" name="id" id="id" value="<?=isset($person['id']) ? $person['id']: ''?>" >
    <div class="form-group">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?=isset($person['username']) ? $person['username']: ''?>">
    </div>
    <div class="form-group">
        <label for="email" class="form-label">E-Mail-Adresse:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?=isset($person['e-mail']) ? $person['e-mail']: ''?>">
    </div>
    <div class="mt-3"><button type="submit" name="btnBestaetigen" class="btn btn-danger">Löschen</button>
        <button type="submit" name="btnReset" class="btn btn-success">Abbrechen</button>
    </div>
</form>
    </div>
</div>