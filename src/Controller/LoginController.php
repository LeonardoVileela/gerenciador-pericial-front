<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LoginController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
    }

    public function login()
    {

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $response = $this->post_request( "http://localhost/p05-ger-pericial-back" . "/login/login.json", $data);

            if(!$response->user)
            {
                $this->Flash->error('Email ou senha incorreta!');
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            else{
                $userEncoded = $response->user;
                $userDecoded = json_decode(json_encode($userEncoded), true);
                $this->Auth->setUser($userDecoded);

                $this->Flash->success('Login Realizado.');
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('Logout realizado com sucesso!');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
