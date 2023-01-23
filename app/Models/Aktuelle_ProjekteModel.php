<?php

namespace App\Models;

use CodeIgniter\Model;

class Aktuelle_ProjekteModel extends Model
{
    public function getData( ){
        $this->aufgaben=$this->db->table('aufgaben');
        $this->aufgaben->select('aufgaben.name as name, aufgaben.reiter as reiter, group_concat("<li>",  mitglieder.username, "</li>"  SEPARATOR "") as mitglieder');
        $this->aufgaben->join('aufgaben_mitglieder', 'aufgaben_mitglieder.aufgabeid=aufgaben.id', 'left');
        $this->aufgaben->join('mitglieder', 'aufgaben_mitglieder.mitgliedid=mitglieder.id', 'left');
        $this->aufgaben->orderBy('reiter');
        $this->aufgaben->groupBy('aufgaben.name');
        $result= $this->aufgaben->get();
        return $result->getResultArray();
    }

    public function getReiter(){
        $this->reiter=$this->db->table('reiter');
        $this->reiter->select('*');
        $this->reiter->orderBy('id');
        $result=$this->reiter->get();
        return $result->getResultArray();
    }

}