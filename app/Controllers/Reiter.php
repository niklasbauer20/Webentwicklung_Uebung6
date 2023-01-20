<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends BaseController
{
    public function __construct()
    {

        $this->ReiterModel = new ReiterModel();

    }
    public function index(){
        if (isset($_POST['btnBearbeiten'])){
            $data['reiter']=$this->ReiterModel->getData($_POST['id']);
        }

        $data['allreiter']= $this->ReiterModel->getData();

        $data['title']='Reiter';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Reiter/Reiter', $data);
        echo view ('templates/Footer');
    }

    public function loeschenbestaetigen(){
        if (isset($_POST['btnLoeschen'])){
            $data['reiter']=$this->ReiterModel->getData($_POST['id']);
        }
        $data['title']='Reiter löschen?';
        echo view('templates/Header',$data);
        echo view('Reiter/bestaetigen', $data);
        echo view ('templates/Footer');
    }

    public function submit_edit(){
        if (isset($_POST['btnSpeichern'])){
            if (isset($_POST['id'])&&$_POST['id'] != ''){
                $this->ReiterModel->updateReiter();
            }
            else{
                $this->ReiterModel->createReiter();
            }
            return redirect()->to(base_url('Reiter'));

        }
        if (isset($_POST['btnBestaetigen'])){
            $this->ReiterModel->deleteReiter();
            return redirect()->to(base_url('Reiter'));
        }
        if (isset($_POST['btnReset'])){
            return redirect()->to(base_url('Reiter'));
        }
    }
}

