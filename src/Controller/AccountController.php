<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Client\Response;

/**
 * Account Controller
 *
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['changePass', 'lostAccount', 'confirmAccount']);


    }

    public function changePass()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/account/change-pass.json", $data);


            if ($response->error == false) {
                $this->Flash->success("Sua senha foi alterada com sucesso.");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error("Sua senha foi não pode ser alterada. Contate algum administrador.");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }
    }
    public function lostAccount()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/account/lost-account.json", $data);

            if (!$response->error) {
                $this->Flash->success("E-mail enviado com sucesso. Verifique sua caixa de entrada.");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error('Email não enviado. Contate algum administrador.');
                return $this->redirect(['controller' => 'Users', 'action' => 'forgetPassword']);
            }
        }
    }

    public function confirmAccount($token = null)
    {

        $data = explode('.', $token);
        $user_id = $data[0];
        $email_code = $data[1];

        $data = ['id' => $user_id, 'tokenCode' => $email_code];
       

        $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/account/confirm-account.json", $data);

        if (!isset($response->error)) {
            $this->Flash->success(__('E-mail confirmado com sucesso!'));
            return $this->redirect(['controller' => '/']);
        } else {
            $this->Flash->error(__('Link Inválido!'));
            return $this->redirect(['controller' => '/']);
        }
    }

    public function resendEmail()
    {
       
            $response = $this->get_request( $this->Auth->user("token"),"http://localhost/p05-ger-pericial-back" . "/account/resend-email.json" );

            if ($response->error == true) {
                $this->Flash->error("Aconteceu um erro durante o envio. Por favor, entre em contato com os administradores");
                return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
            } else{
                $this->Flash->success("E-mail enviado com sucesso. Verifique sua caixa de entrada.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
            }

        
    }

}
