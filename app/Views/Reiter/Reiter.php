<div class="col-8">
        <table class="table mb-5 ">
            <thead>
            <tr class="bg-light">
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-7">Beschreibung</th>
                <th scope="col" class="col-2 text-end"></th>
                <th scope="col" class="col-2 text-end"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($allreiter as $item): ?>
                <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['beschreibung']?></td>
                <td>
                    <form action="Reiter" method="post">
                        <a>
                            <input type="hidden" value="<?=$item['id']?>" name="id" id="id">
                            <button class='btn' name="btnBearbeiten"><i class='bi bi-pencil-square text-primary'></i> </button>
                        </a>
                    </form>
                </td><td>

<!-- Button für das Modal -->
                        <button class="btn"
                                type="button"
                                id="deleteBtn"
                                data-toggle='modal'
                                data-target='#löschBestätigung'
                                data-name='<?= $item["name"] ?>'
                                data-id="<?=$item['id']?>"
                                data-delete-link='<?= base_url("Reiter/submit_edit") ?>'><i class='bi bi-trash3 text-primary'></i></button>



            <?php endforeach; ?>
            </tbody>
        </table>
    <!-- Das Modal -->
    </td>
    <div class="modal fade" id="löschBestätigung" tabindex="-1" aria-labelledby="löschBestätigungLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="löschBestätigungLabel">Reiter löschen?</h1>
                </div>
                <div class="modal-body">
                    <p>Soll der Reiter gelöscht werden?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Abbrechen</button>
                    <a id="deleteBtn" type="button" class="btn btn-primary">Bestätigen</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Java Script -->
    <script type="text/javascript" defer>
        const deleteModal = document.getElementById('löschBestätigung')
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const username = button.getAttribute('data-name');
            const del_link = button.getAttribute('data-delete-link');
            const modalText = deleteModal.querySelector('.modal-body p');
            const deleteBtn = deleteModal.querySelector('#deleteBtn');

            modalText.textContent = `Soll das Mitglied gelöscht werden?`;
            deleteBtn.setAttribute("href", del_link);
        });
    </script>
        <div class="h3 mt-5">
            <form action="Reiter/submit_edit" method="post">
            <?= (isset($reiter['id']))? 'Bearbeiten': 'Erstellen' ?>
        </div>
    <input type="hidden" id="id" name="id" value="<?=(isset($reiter['id'])? $reiter['id'] : '') ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bezeichnung des Reiters:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= (isset($reiter['name']))? $reiter['name'] : '' ?>" placeholder="Reiter">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beschreibung</label>
            <textarea placeholder="Beschreibung" class="form-control" id="beschreibung" name="beschreibung" rows="3"><?= (isset($reiter['beschreibung']))? $reiter['beschreibung'] : '' ?></textarea>
        </div>
        <div><button type="submit" name="btnSpeichern" id="btnSpeichern" class="btn btn-primary">Speichern</button>
            <button type="submit" name="btnReset" id="btnReset" class="btn btn-success">Reset</button>
        </div>
    </form>
    </div>
