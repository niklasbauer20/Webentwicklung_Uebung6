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
                $daten['alles'] = $this->MitgliederModel->login();

                if (password_verify($_POST['pwd'], $daten['alles']['passwort'])) {
                    $this->session->set('loggedin', TRUE);
                    $this->session->set('id', $_POST['id']);
                    return redirect()->to(base_url('Aktuelle_Projekte'));
                }
            }
        }
        $data['title'] = 'Login';
        echo view('templates/Header', $data);
        echo view('Login');
        echo view('templates/Footer');
    }
}
