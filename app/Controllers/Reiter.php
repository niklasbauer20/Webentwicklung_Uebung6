<?php

namespace App\Controllers;

class Reiter extends BaseController
{
    public function index()
    {
        $data['title']='Reiter';
        echo view('templates/Header',$data);
        echo view ('templates/Menue');
        echo view('Reiter/Reiter');
        echo view ('templates/Footer');
    }
}
{

}