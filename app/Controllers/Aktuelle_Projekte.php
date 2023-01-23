<?php

namespace App\Controllers;

use App\Models\Aktuelle_ProjekteModel;

class Aktuelle_Projekte extends BaseController
{
    public function __construct()
    {

        $this->Aktuelle_Projekte = new Aktuelle_ProjekteModel();

    }
    public function index()
    {
        $data['aufgaben']= $this->Aktuelle_Projekte->getData();
        $data['reiter'] = $this->Aktuelle_Projekte->getReiter();
        $data['title']='Aktuelle Projekte';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Aktuelle_Projekte/Aktuelle_Projekte');
        echo view ('templates/Footer');
    }
}