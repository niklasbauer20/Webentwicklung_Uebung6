<?php

namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{
    public function getData( $id = NULL){
        $this->reiter=$this->db->table('reiter');
        $this->reiter->select('*');

        if ($id!=NULL){
            $this->reiter->where('id',$id);
            $result= $this->reiter->get();
            return $result->getRowArray();
        }
        $this->reiter->orderBy('id');
        $result= $this->reiter->get();
        return $result->getResultArray();

    }

    public function createReiter() {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function updateReiter() {

        $this->reiter = $this->db->table('reiter');
        $this->reiter->where('reiter.id', $_POST['id']);
            $this->reiter->update(array('name' => $_POST['name'],
                'beschreibung' => $_POST['beschreibung']));
    }

    public function deleteReiter() {
        $this->reiter = $this->db->table('reiter');
        $this->reiter->where('reiter.id', $_POST['id']);
        $this->reiter->delete();
    }


}