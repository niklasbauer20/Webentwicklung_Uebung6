<?php

namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model
{

    public function getData( $id = NULL){
        $this->aufgaben=$this->db->table('aufgaben');
        $this->aufgaben->select('aufgaben.id as id, aufgaben.name As name, aufgaben.beschreibung As beschreibung, aufgaben.erstellungsdatum as erstellungsdatum, aufgaben.fälligkeitsdatum as fälligkeitsdatum , reiter.name As reiter, reiter.id as reiterid, group_concat("<li>", mitglieder.username, "</li>" SEPARATOR "") As zuständig') ;
        $this->aufgaben->join('reiter', 'aufgaben.reiter=reiter.id');
        $this->aufgaben->join('aufgaben_mitglieder', 'aufgaben_mitglieder.aufgabeid=aufgaben.id', 'left');
        $this->aufgaben->join('mitglieder', 'aufgaben_mitglieder.mitgliedid=mitglieder.id', 'left');


        if ($id!=NULL){
            $this->aufgaben->where('aufgaben.id',$id);
            $result= $this->aufgaben->get();
            return $result->getRowArray();
        }
        $this->aufgaben->orderBy('aufgaben.id');
        $this->aufgaben->groupBy('aufgaben.name');
        $result= $this->aufgaben->get();
        return $result->getResultArray();

    }

    public function getReiter(){
        $this->reiter=$this->db->table('reiter');
        $this->reiter->select('*');
        $result = $this -> reiter->get();
        return $result->getResultArray();
    }

    public function getMitglieder(){
        $this->mitglieder=$this->db->table('mitglieder');
        $this->mitglieder->select('*');
        $result = $this -> mitglieder->get();
        return $result->getResultArray();
    }

    public function getAufagabenMitglieder($id=NULL){
        $this->aufgabenmitglieder=$this->db->table('aufgaben_mitglieder');
        $this->aufgabenmitglieder->select('mitgliedid');
        $this->aufgabenmitglieder->where('aufgabeid', $id);
        $result = $this -> aufgabenmitglieder->get();
        return $result->getResultArray();
    }

    public function createAufgabe() {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum'=> $_POST['erstellungsdatum'],
            'fälligkeitsdatum'=>$_POST['fälligkeitsdatum'],
            'ersteller'=> $_SESSION ['id'],
            'reiter' => $_POST['reiter'],
            ));
        $currentid=$this->db->insertID();
        $this->aufgabenmitglieder=$this->db->table('aufgaben_mitglieder');
        foreach ($_POST['mitgliederids'] as $mitgliederid){
            $this->aufgabenmitglieder->insert(array('aufgabeid'=> $currentid,
                'mitgliedid'=> $mitgliederid));
        }
    }

    public function updateAufgabe() {

        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.id', $_POST['id']);
        if (isset($_POST['reiter'])){
            $this->aufgaben->update(array('name' => $_POST['name'],
                'beschreibung' => $_POST['beschreibung'],
                'erstellungsdatum'=> $_POST['erstellungsdatum'],
                'fälligkeitsdatum'=>$_POST['fälligkeitsdatum'],
                'ersteller'=> $_SESSION ['id'],
                'reiter' => $_POST['reiter']));
        } else{
            $this->aufgaben->update(array('name' => $_POST['name'],
                'beschreibung' => $_POST['beschreibung'],
                'erstellungsdatum'=> $_POST['erstellungsdatum'],
                'fälligkeitsdatum'=>$_POST['fälligkeitsdatum'],
                'ersteller'=> $_SESSION ['id'],
               ));
        }
        if (isset($_POST['mitgliederids'])){
            $this->aufgabenmitglieder=$this->db->table('aufgaben_mitglieder');
            foreach ($_POST['mitgliederids'] as $mitgliederid) {
                $this->aufgabenmitglieder->insert(array('aufgabeid' => $_POST['id'],
                    'mitgliedid' => $mitgliederid));
        }

        }
    }

    public function deleteAufgabe() {
        $this->aufgabenmitglieder= $this->db->table('aufgaben_mitglieder');
        $this->aufgabenmitglieder->where('aufgabeid', $_POST['id']);
        $this->aufgabenmitglieder->delete();

        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.id', $_POST['id']);
        $this->aufgaben->delete();
    }

}