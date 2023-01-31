<div class="row bg-light ms-2 me-2 mb-5 container-fluid ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: large" aria-current="page" href="Projekte"><b>Projekte</b></a>
                    </li>
                    <li class="nav-item dropdown" <?= (isset($_SESSION['projektname']))? '': 'hidden'?>>
                        <button class="btn dropdown-toggle" style="font-size: large" type="button" data-toggle="dropdown" aria-expanded="false"><b>
                        <?= (isset($_SESSION['projektname']))? $_SESSION['projektname']: ''  ?>
                            </b> </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Aktuelle_Projekte">Projektübersicht</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Reiter">Reiter</a></li>
                            <li><a class="dropdown-item" href="Aufgaben">Aufgaben</a></li>
                            <li><a class="dropdown-item" href="Mitglieder">Mitglieder</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <form action="Logout" >
            <button class="btn btn-outline-primary" type="submit">Logout</button>
        </form>


    </nav>
</div>
<div class="row">
    <div class="col-2">

    </div>
