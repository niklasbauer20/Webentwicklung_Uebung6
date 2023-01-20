<div class="col-2"></div>
<div class="col-8">
<div class="container pt-2">
    <form action="Login" method="post">
        <div class="form-group m-2 p-1">
            <label for="email">Email-Adresse:</label>
            <input class="form-control <?= (isset($error['email']))? 'is-invalid' : '' ?>" placeholder="Email-Adresse eingeben" type="email" class="form-control" id="email" name="email">
            <div class="invalid-feedback">
                <?= (isset($error['email'])) ? $error['email']: ''?>
            </div>
        </div>

        <div class="form-group m-2 p-1">
            <label for="pwd">Passwort</label>
            <input placeholder="Passwort"  class="form-control <?= (isset($error['pwd']))? 'is-invalid' : '' ?>" type="password" class="form-control" id="pwd" name="pwd">
            <div class="invalid-feedback">
                <?= (isset($error['pwd'])) ? $error['pwd']: ''?>
            </div>
        </div>

        <div class="form-group m-2 p-1">
            <input type="checkbox"  class="form-check-input <?= (isset($error['agb']))? 'is-invalid' : '' ?>" name="agb" id="agb"><label class="ms-2"> AGBs und Datenschutzbedingungen akzeptieren</label>
            <div class="invalid-feedback">
                <?= (isset($error['agb'])) ? $error['agb']: ''?>
            </div>
        </div>

        <button type="submit" class="btn submit-button btn-primary mt-2 ms-2 p-1 ">Einloggen</button>

        <div class="ms-2 p-1">Noch nicht registiert? <a href="#">Registierung</a></div>

        <div class="m-2 p-1">Da der Login-Vorgang noch nicht realisiert wurde: <a href="Aktuelle_Projekte">Überspringen</a></div>


    </form>
</div>

</div>