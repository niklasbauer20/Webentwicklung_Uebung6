<?php
$Cards=array(
        array(
                "ToDo",
                "HTML Datei erstellen (Max Mustermann)",
                "CSS Datei erstellen (Max Mustermann)"
        ),
        array(
            "Erledigt",
            "PC eingeschaltet (Petra Müller)",
            "Kaffee trinken (Petra Müller)",
        ),
        array(
                "Verschoben",
                "Für die Uni lernen"
        )
);


?>
    <div class="col">
        <div class="row">

            <?php
            foreach ($Cards as $card){
                echo ('<div class="col">');
                echo ('<div class="card">');
                echo ('<ul class="list-group">');
                $i=1;
                echo ('<p class="card-header">'.$card[0].':</p>');

                while (count($card)>$i) {
                    echo('<li class="list-group-item">' . $card[$i] . '</li>');
                    $i++;
                }
                echo ('</ul>');
                echo ('</div>');
                echo ('</div>');
            }


            ?>

        </div>
    </div>