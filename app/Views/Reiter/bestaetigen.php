<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="Reiter/submit_edit" method="post">
            <input type="hidden" name="id" id="id" value="<?=isset($reiter['id']) ? $reiter['id']: ''?>" >
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" disabled class="form-control" id="name" name="name" value="<?=isset($reiter['name']) ? $reiter['name']: ''?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Beschreibung:</label>
                <textarea class="form-control mt-1" disabled placeholder="Beschreibung"><?=isset($reiter['beschreibung']) ? $reiter['beschreibung']: ''?></textarea>
            </div>
            <div class="mt-3"><button type="submit" name="btnBestaetigen" class="btn btn-danger">Löschen</button>
                <button type="submit" name="btnReset" class="btn btn-success">Abbrechen</button>
            </div>
        </form>
    </div>
</div>
