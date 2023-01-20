<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjektModel extends Model
{
    public function getData( $id = NULL){
        $this->project=$this->db->table('projekte');
        $this->project->select('*');

        if ($id!=NULL){
            $this->project->where('id',$id);
            $result= $this->project->get();
            return $result->getRowArray();
        }
        $this->project->orderBy('id');
        $result= $this->project->get();
        return $result->getResultArray();

    }

    public function createProject() {
        $this->project = $this->db->table('projekte');
        $this->project->insert(array('Name' => $_POST['Name'],
            'Beschreibung' => $_POST['Beschreibung'],
            'ersteller' => $_SESSION['id']));
    }

    public function updateProject() {

        $this->project = $this->db->table('projekte');
        $this->project->where('projekte.id', $_POST['id']);
            $this->project->update(array('Name' => $_POST['Name'],
                'Beschreibung' => $_POST['Beschreibung']));
    }

    public function deleteProject() {
        $this->project = $this->db->table('projekte');
        $this->project->where('projekte.id', $_POST['id']);
        $this->project->delete();
    }

}