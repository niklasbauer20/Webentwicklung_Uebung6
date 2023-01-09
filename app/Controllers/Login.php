<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Login extends BaseController
{
    public function __construct()
    {

        $this->MitgliederModel = new MitgliederModel();

    }
    public function index()
    {
        if (isset($_POST['pwd']) && isset($_POST['email'])) {
            if ($this->MitgliederModel->login() != NULL) {
                $userdata = $this->MitgliederModel->login();
               // echo $userdata['passwort'];
               // echo $_POST['pwd'];
               // $hased=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
               // if (password_verify( $_POST['pwd'], $hased )){
               //     echo 'true';
               // }
                //$userdata['passwort'] stimmt mit dem Passwort aus der Datenbank überein, lässt sich jedoch nicht durch
                //password_verify bestätigen.

                if (password_verify($_POST['pwd'], $userdata['passwort'])) {
                    $this->session->set('loggedin', TRUE);
                    $this->session->set('id', $userdata['id']);
                    $this->session->set('username', $userdata['username']);
                    $this->session->set('e-mail', $userdata['e-mail']);
                    return redirect()->to(base_url('Aktuelle_Projekte'));
                }
                else{$data['title'] = 'Login (Passwort oder E-Mail falsch)';
                    echo view('templates/Header', $data);
                    echo view('Login');
                    return view('templates/Footer');}
            }
        }
        $data['title'] = 'Login';
        echo view('templates/Header', $data);
        echo view('Login');
        echo view('templates/Footer');
    }
}
