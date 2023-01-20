<?php

namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model
{

    public function getData( $id = NULL){
        $this->aufgaben=$this->db->table('aufgaben');
        $this->aufgaben->select('aufgaben.name As name, aufgaben.beschreibung As beschreibung, reiter.name As reiter, group_concat("<li>", mitglieder.username, "</li>" SEPARATOR "") As zuständig') ;
        $this->aufgaben->join('reiter', 'aufgaben.reiter=reiter.id');
        $this->aufgaben->join('aufgaben_mitglieder', 'aufgaben_mitglieder.aufgabeid=aufgaben.id', 'left');
        $this->aufgaben->join('mitglieder', 'aufgaben_mitglieder.mitgliedid=mitglieder.id', 'left');


        if ($id!=NULL){
            $this->aufgaben->where('id',$id);
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
        $result = $this -> aufgaben->get();
        return $result->getResultArray();
    }

    public function getMitglieder(){
        $this->mitglieder=$this->db->table('mitglieder');
        $this->mitglieder->select('*');
        $result = $this -> mitglieder->get();
        return $result->getResultArray();
    }

    public function createAufgabe() {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function updateAufgabe() {

        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.id', $_POST['id']);
        $this->aufgaben->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function deleteAufgabe() {
        $this->aufgaben = $this->db->table('aufgaben');
        $this->aufgaben->where('aufgaben.id', $_POST['id']);
        $this->aufgaben->delete();
    }

}