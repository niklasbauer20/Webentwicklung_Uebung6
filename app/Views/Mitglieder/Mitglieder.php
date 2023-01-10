<div class="col-8">
    <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-4">E-Mail</th>
                <th scope="col" class="col-3">In Projekt</th>
                <th scope="col" class="col-1"></th>
                <th scope="col" class="col-1"></th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i=0;$i<count($mitglieder);$i++):?>
            <tr>
                <td> <?=$mitglieder[$i]['username'] ?> </td>
                <td> <?=$mitglieder[$i]['e-mail'] ?> </td>
                <td><input type="checkbox"> </td>
                <td>
                    <form action="Mitglieder" method="post">
                        <a>
                            <input type="hidden" value="<?=$mitglieder[$i]['id']?>" name="id" id="id">
                            <button class='btn' name="btnBearbeiten"><i class='bi bi-pencil-square text-primary'></i> </button>
                        </a>
                    </form>
                </td><td>
                    <form action="mitglieder/loeschenbestaetigen" method="post">
                        <a>
                            <input type="hidden" value="<?=$mitglieder[$i]['id']?>" name="id" id="id">
                            <button class='btn' name="btnLoeschen"><i class='bi bi-trash3 text-primary'></i></button>
                        </a>
                    </form>
                </td>
            </tr>
            <?php endfor;?>
            </tbody>
        </table>
        <div class="h3 mt-5">
            <?=isset($person['id']) ? 'Bearbeiten': 'Erstellen'?>
        </div>
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
        <?php if((isset($person['id'])) && !empty($_SESSION['id'])){
            if ($this->session->get('id')!=$person['id']){
            echo ('<div class="mb-3"><input type="checkbox" id="check">
            <label for="check">Dem Projekt zugeordnet</label>
        </div>
        <div><button type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" class="btn btn-success">Reset</button>
        </div>');
        }else{
                echo ('<div class="mb-3">
            <label for="passwort" class="form-label">Passwort:</label>
            <input type="password" class="form-control" id="passwort" name="passwort" >
        </div>
        <div class="mb-3"><input type="checkbox" id="check">
            <label for="check">Dem Projekt zugeordnet</label>
        </div>
        <div><button type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" class="btn btn-success">Reset</button>
        </div>
        ');
            }}else{
            echo ('<div class="mb-3">
            <label for="passwort" class="form-label">Passwort:</label>
            <input type="password" class="form-control" id="passwort" name="passwort" >
        </div>
        <div class="mb-3"><input type="checkbox" id="check">
            <label for="check">Dem Projekt zugeordnet</label>
        </div>
        <div><button type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" class="btn btn-success">Reset</button>
        </div>
        ');
        } ?>
    </form>
    </div>

