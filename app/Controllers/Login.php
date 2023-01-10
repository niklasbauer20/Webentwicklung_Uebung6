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
                $passwort = $this->MitgliederModel->login()['passwort'];
                //echo $passwort;
                //$hased=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                //if (password_verify( $_POST['pwd'], $hased )){
                //   echo 'true';
                //}
                //$userdata['passwort'] stimmt mit dem Passwort aus der Datenbank überein, lässt sich jedoch nicht durch
                //password_verify bestätigen. -> Datenbankfeld für passwort auf 100 Zeichen vergrößert!

                if (password_verify($_POST['pwd'], $passwort)) { //immer falsch. Warum? -> Datenbankfeld war zu klein!!!
                    $userdata = $this->MitgliederModel->login();
                    $this->session->set('loggedin', TRUE);
                    $this->session->set('id', $userdata['id']);
                    $this->session->set('username', $userdata['username']);
                    $this->session->set('e-mail', $userdata['e-mail']);
                    $this->session->set('projektid', '???');
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


    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url('Login'));
    }
}
