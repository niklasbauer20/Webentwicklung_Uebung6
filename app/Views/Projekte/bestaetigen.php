<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="Projekte/submit_edit" method="post">
            <input type="hidden" name="id" id="id" value="<?=isset($project['id']) ? $project['id']: ''?>" >
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" disabled id="Name" name="Name" value="<?=isset($project['Name']) ? $project['Name']: ''?>">
            </div>
            <div class="form-group">
                <label class="form-label">Beschreibung</label>
                <textarea class="form-control mt-1" disabled placeholder="Beschreibung"><?=isset($project['Beschreibung']) ? $project['Beschreibung']: ''?></textarea>
            </div>
            <div class="mt-3"><button type="submit" name="btnBestaetigen" class="btn btn-danger">Löschen</button>
                <button type="submit" name="btnReset" class="btn btn-success">Abbrechen</button>
            </div>
        </form>
    </div>
</div>
