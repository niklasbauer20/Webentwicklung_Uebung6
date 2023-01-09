<div class="col-8">
        <?php
        $reiter= array(
                array(
                        'Name'=>'ToDo',
                        'Beschreibung'=>'Dinge die erledigt werden müssen.'
                ),
                array(
                        'Name'=>'Erledigt',
                        'Beschreibung'=>'Dinge die erledigt sind.'
                ),
                array(
                         'Name'=>'Verschoben',
                        'Beschreibung'=>'Dinge die später erledigt werden.'
                )
        );


        ?>
        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-7">Beschreibung</th>
                <th scope="col" class="col-2 text-end"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reiter as $Eintrag){
                echo ("<tr>");
                echo ("<td>".$Eintrag['Name']. "</td>");
                echo ("<td>".$Eintrag['Beschreibung']."</td>");
                echo ("<td><button class='btn'><i class='bi bi-pencil-square text-primary'></i> </button>
                           <button class='btn'><i class='bi bi-trash3 text-primary'></i></button> </td>");
                echo ("</tr>");
            }
            ?>
            </tbody>
        </table>
        <div class="h3 mt-5">
            Bearbeiten/Erstellen:
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Reiter">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung</label>
            <textarea placeholder="Beschreibung" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div><button type="submit" class="btn btn-primary">Speichern</button>
            <button type="submit" class="btn btn-success">Reset</button>
        </div>

    </div>