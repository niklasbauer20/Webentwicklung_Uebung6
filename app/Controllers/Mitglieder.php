<?php

namespace App\Controllers;

use App\Models\MitgliederModel;

class Mitglieder extends BaseController
{
    public function __construct()
    {

        $this->MitgliederModel = new MitgliederModel();

    }
    public function index(){
        if (isset($_POST['btnBearbeiten'])){
            $data['person']=$this->MitgliederModel->getData($_POST['id']);
        }

        $data['mitglieder']= $this->MitgliederModel->getData();

        $data['title']='Mitglieder';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Mitglieder/Mitglieder', $data);
        echo view ('templates/Footer');
    }

    public function loeschenbestaetigen(){
        if (isset($_POST['btnLoeschen'])){
            $data['person']=$this->MitgliederModel->getData($_POST['id']);
        }
        $data['title']='Mitglied löschen?';
        echo view('templates/Header',$data);
        echo view('Mitglieder/bestaetigen', $data);
        echo view ('templates/Footer');
    }

    public function submit_edit(){
        if (isset($_POST['btnSpeichern'])){
            if (isset($_POST['id'])&&$_POST['id'] != ''){
                $this->MitgliederModel->updatemitglied();
            }
            else{
                $this->MitgliederModel->createmitglied();
            }
            return redirect()->to(base_url('Mitglieder'));

        }
        if (isset($_POST['btnBestaetigen'])){
            $this->MitgliederModel->deletemitglied();
            return redirect()->to(base_url('Mitglieder'));
        }
        if (isset($_POST['btnReset'])){
            return redirect()->to(base_url('Mitglieder'));
        }
    }
}