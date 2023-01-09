
    <div class="col-8">

        <?php
        $Aufgaben = array(
                array(
                        'Aufgabenbezeichnung'=>'HTML Datei erstellen',
                        'Beschreibung der Aufgabe'=>'HTML Datei erstellen',
                        'Reiter'=>'TooDo',
                        'Zuständig'=>'Max Mustermann'
                ),array(
                        'Aufgabenbezeichnung'=>'CSS Datei erstellen',
                        'Beschreibung der Aufgabe'=>'CSS Datei erstellen',
                        'Reiter'=>'ToDo',
                        'Zuständig'=>'Max Mustermann'
                ),array(
                        'Aufgabenbezeichnung'=>'PC eingeschaltet',
                        'Beschreibung der Aufgabe'=>'PC einschalten',
                        'Reiter'=>'Erledigt',
                        'Zuständig'=>'Max Mustermann'
                ),array(
                        'Aufgabenbezeichnung'=>'Kaffee trinken',
                        'Beschreibung der Aufgabe'=>'Kaffee trinken',
                        'Reiter'=>'Erledigt',
                        'Zuständig'=>'Petra Müller'
                ),array(
                        'Aufgabenbezeichnung'=>'Für die Uni lernen',
                        'Beschreibung der Aufgabe'=>'Für die Uni lernen.',
                        'Reiter'=>'Verschoben',
                        'Zuständig'=>'Max Mustermann'
                )
        )
        ?>


        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Aufgabenbezeichnung</th>
                <th scope="col" class="col-3">Beschreibung der Aufgabe</th>
                <th scope="col" class="col-2">Reiter</th>
                <th scope="col" class="col-2">Zuständig</th>
                <th scope="col" class="col-2"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            while ($i<count($Aufgaben)) {
                echo '<tr>';
                echo '<td>' . $Aufgaben[$i]['Aufgabenbezeichnung'] . '</td>';
                echo '<td>' . $Aufgaben[$i]['Beschreibung der Aufgabe'] . '</td>';
                echo '<td>' . $Aufgaben[$i]['Reiter'] . '</td>';
                echo '<td>' . $Aufgaben[$i]['Zuständig'] . '</td>';
                echo("<td><button class='btn'><i class='bi bi-pencil-square text-primary'></i> </button>
                       <button class='btn'><i class='bi bi-trash3 text-primary'></i></button> </td>");
                echo '</tr>';
                $i++;
            }
            ?>

            </tbody>
        </table>
        <div class="h3 mt-5">
            Bearbeiten/Erstellen:
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Aufgabenbezeichnung</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Aufgabe">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung der Aufgabe</label>
            <textarea placeholder="Beschreibung" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Erstellungsdatum</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="01.01.19">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">f&auml;llig bis:</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="01.01.19">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zugeh&ouml;riger Reiter:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>ToDo</option>
                <option value="1">Erledigt</option>
                <option value="2">Verschoben</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Zust&auml;ndig:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Max Mustermann</option>
                <option value="1">Petra M&uuml;ller</option>
            </select>
        </div>
        <div><button type="submit" class="btn btn-primary">Speichern</button>
            <button type="submit" class="btn btn-success">Reset</button>
        </div>

    </div>

</div>

