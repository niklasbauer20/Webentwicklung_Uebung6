<?php

namespace App\Models;

use CodeIgniter\Model;

class Aktuelle_ProjekteModel extends Model
{
    public function getData( ){
        $this->aufgaben=$this->db->table('reiter');
        $this->aufgaben->select('reiter.name, group_concat("<li>", aufgaben.name," (", mitglieder.username,")", "</li>" SEPARATOR "") as eintraege') ;
        $this->aufgaben->join('aufgaben', 'aufgaben.reiter=reiter.id', 'left');
        $this->aufgaben->join('aufgaben_mitglieder', 'aufgaben_mitglieder.aufgabeid=aufgaben.id', 'left');
        $this->aufgaben->join('mitglieder', 'aufgaben_mitglieder.mitgliedid=mitglieder.id', 'left');
        $this->aufgaben->orderBy('reiter.id');
        $this->aufgaben->groupBy('reiter.id');
        $result= $this->aufgaben->get();
        return $result->getResultArray();
    }

}