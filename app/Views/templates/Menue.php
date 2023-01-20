<div class="col-2 me-5">
    <div class="list-group">
        <a href="Logout" class="list-group-item text-primary">Logout</a>
        <a href="Projekte" class="list-group-item text-primary" >Projekte</a>
            <?= ($_SESSION['projektid']>0)? ' <a href="Aktuelle_Projekte" class="list-group-item text-primary">'.$_SESSION['projektname'].'</a>
            <a href="Reiter" class="list-group-item ms-5 text-primary" >Reiter</a>
            <a href="Aufgaben" class="list-group-item ms-5 text-primary">Aufgaben</a>
            <a href="Mitglieder" class="list-group-item ms-5 text-primary">Mitgleider</a>' : '' ?>

    </div>
</div>