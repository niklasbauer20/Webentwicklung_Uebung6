<?php
namespace App\Models;
use CodeIgniter\Model;
use function Sodium\add;

class MitgliederModel extends Model
{
    public function login(){
        $this->personen= $this->db->table('mitglieder');
        $this->personen->select('*');
        $this->personen->where('mitglieder.e-mail', $_POST['email']);
        $result= $this->personen->get();

        return $result->getRowArray();
    }


 public function getData( $id = NULL){
    $this->personen=$this->db->table('mitglieder');
    $this->personen->select('*');

    if ($id!=NULL){
        $this->personen->where('id',$id);
        $result= $this->personen->get();
        return $result->getRowArray();
    }
    $this->personen->orderBy('username');
     $result= $this->personen->get();
     return $result->getResultArray();

 }
    public function getPersoninProjekt($id=NULL){
        $this->personen=$this->db->table('mitglieder');
        $this->personen->select('id');
        $this->personen->join('projekte_mitglieder', 'mitgliedid=mitglieder.id', 'left');
        $this->personen->where('projektid',$id);
        $result= $this->personen->get();

        return $result->getResultArray();
    }

    public function createmitglied() {
        $this->personen = $this->db->table('mitglieder');
        $this->personen->insert(array('username' => $_POST['username'],
            'e-mail' => $_POST['email'],
            'passwort' => password_hash($_POST['passwort'], PASSWORD_DEFAULT)));
        if (isset($_POST['check'])){
            $this->eintrag = $this->db->table('projekte_mitglieder');
            $this->eintrag->insert(array('projektid' => $_SESSION['projektid'],
                'mitgliedid' => $this->db->insertID()));
        }
    }

    public function updatemitglied() {

        $this->personen = $this->db->table('mitglieder');
        $this->personen->where('mitglieder.id', $_POST['id']);
        if (!isset($_POST['passwort'])){
            $this->personen->update(array('username' => $_POST['username'],
                'e-mail' => $_POST['email']));
        }else{
            if ($_POST['passwort']==''){
                $this->personen->update(array('username' => $_POST['username'],
                    'e-mail' => $_POST['email']));
            }else{ $this->personen->update(array('username' => $_POST['username'],
                'e-mail' => $_POST['email'],
                'passwort' => password_hash($_POST['passwort'], PASSWORD_DEFAULT)));}

        }
        if (isset($_POST['check'])){
            $this->eintrag = $this->db->table('projekte_mitglieder');
            $this->eintrag->insert(array('projektid' => $_SESSION['projektid'],
                'mitgliedid' => $_POST['id']));
        } else {
            $this->eintrag = $this->db->table('projekte_mitglieder');
            $this->eintrag->where('projektid' , $_SESSION['projektid'] );
            $this->eintrag->where( 'mitgliedid', $_POST['id']);
            $this->eintrag->delete();
        }

    }
    public function deletemitglied() {
        $this->aufgabenmitglieder = $this->db->table('aufgaben_mitglieder');
        $this->aufgabenmitglieder->where('mitgliedid', $_POST['id']);
        $this->aufgabenmitglieder->delete();

        $this->projektemitglieder = $this->db->table('projekte_mitglieder');
        $this->projektemitglieder->where('mitgliedid', $_POST['id']);
        $this->projektemitglieder->delete();

        $this->personen = $this->db->table('mitglieder');
        $this->personen->where('mitglieder.id', $_POST['id']);
        $this->personen->delete();

    }




}