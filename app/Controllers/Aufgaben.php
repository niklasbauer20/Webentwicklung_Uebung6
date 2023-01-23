<?php

namespace App\Controllers;

use App\Models\AufgabenModel;

class Aufgaben extends BaseController
{

    public function __construct()
    {

        $this->AufgabenModel = new AufgabenModel();

    }
    public function index(){
        if (isset($_POST['btnBearbeiten'])){
            $data['aufgabe']=$this->AufgabenModel->getData($_POST['id']);
            $data['aufgabenmitglieder']=$this->AufgabenModel->getAufagabenMitglieder($_POST['id']);
        }
        if (isset($_POST['btnLoeschen'])){
            $data['aufgabe']=$this->AufgabenModel->getData($_POST['id']);
            $data['title']='Aufgabe löschen?';
            echo view('templates/Header',$data);
            echo view('Aufgaben/bestaetigen', $data);
            return view('templates/footer');
        }
        $data['aufgaben']= $this->AufgabenModel->getData();
        $data['reiter']= $this->AufgabenModel->getReiter();
        $data['mitglieder']= $this->AufgabenModel->getMitglieder();


        $data['title']='Aufgaben';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Aufgaben/Aufgaben', $data);
        echo view ('templates/Footer');
    }


    public function submit_edit(){
        if (isset($_POST['btnSpeichern'])){
            if (isset($_POST['id'])&&$_POST['id'] != ''){
                $this->AufgabenModel->updateAufgabe();
            }
            else{
                $this->AufgabenModel->createAufgabe();
            }
            return redirect()->to(base_url('Aufgaben'));

        }
        if (isset($_POST['btnBestaetigen'])){
            $this->AufgabenModel->deleteAufgabe();
            return redirect()->to(base_url('Aufgaben'));
        }
        if (isset($_POST['btnReset'])){
            return redirect()->to(base_url('Aufgaben'));
        }
    }


}