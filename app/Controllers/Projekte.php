<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjektModel;

class Projekte extends BaseController
{
    public function __construct()
    {

        $this->ProjektModel = new ProjektModel();

    }
    public function index(){
        if (isset($_POST['btnBearbeiten'])){
            $data['project']=$this->ProjektModel->getData($_POST['id']);
        }
        if (isset($_POST['btnAuswaehlen'])) {
            $_SESSION['projektid'] = $_POST['id'];
            $data['aktprojekt']=$this->ProjektModel->getData($_POST['id']);
            $_SESSION['projektname']=$data['aktprojekt']['Name'];
        }
        if (isset($_POST['btnLoeschen'])){
            $data['project']=$this->ProjektModel->getData($_POST['id']);
            $data['title']='Projekt löschen?';
            echo view('templates/Header',$data);
            echo view('Projekte/bestaetigen', $data);
            return view('templates/footer');
        }
        $data['projecte']= $this->ProjektModel->getData();

        $data['title']='Projekte';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Projekte/Projekte', $data);
        echo view ('templates/Footer');
    }


    public function submit_edit(){
        if (isset($_POST['btnSpeichern'])){
            if (isset($_POST['id'])&&$_POST['id'] != ''){
                $this->ProjektModel->updateProject();
            }
            else{
                $this->ProjektModel->createProject();
            }
            return redirect()->to(base_url('Projekte'));

        }
        if (isset($_POST['btnBestaetigen'])){
            $this->ProjektModel->deleteProject();
            if ($_POST['id']==$_SESSION['projektid']){
                $_SESSION['projektid']=0;
            }
            return redirect()->to(base_url('Projekte'));
        }
        if (isset($_POST['btnReset'])){
            return redirect()->to(base_url('Projekte'));
        }
    }
}