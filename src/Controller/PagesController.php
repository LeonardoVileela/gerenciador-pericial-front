<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['docs']);
    }

    public function home()
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        $response = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/requests/view-user/' . $this->Auth->user('id') . '.json');

        $requests = (array) $response;
        $requests = $requests['requests'];

        $this->set(compact('requests'));
    }

    function profile()
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }
    }

    function docs()
    {

    }

    public function requisition()
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }
        $year = $this->request->getQuery('year');

        $requests = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/requests/view-by-year/' . $year . '.json');

        $data = (array) $requests;
        $data = $data['requests'];

        $this->set(compact('data'));
    }
    public function report($id = null)
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        if ($id != null) {
            $id = intval($id);

            $response = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/reports/view/' . $id . '.json');

            if (!$response->error) {
                $data = (array) $response;
                $data = $data['reports'];

                $this->set(compact('data'));
            } else {
                $this->Flash->error('Não existe laudos para essa requisição');
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            }
        } else {
            $response = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/reports/view.json');

            $data = (array) $response;
            $data = $data['reports'];

            $this->set(compact('data'));
        }
    }

    public function viewUsers()
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-users.json');

        $this->set(compact('data'));
    }

    public function viewInactive()
    {

        if ($this->Auth->user('role_id') == 2) {

            $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-in-users.json');
            $this->set(compact('data'));
        } else {
            $this->Flash->error("Você não tem autorização para acessar esta página.");
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    public function viewUnUsers()
    {
        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        if ($this->Auth->user('role_id') == 2) {
            $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-un-users.json');
            $this->set(compact('data'));
        } else {
            $this->Flash->error("Você não tem autorização para acessar esta página.");
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }


    function analysis()
    {



        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }


        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/requests/analysis.json');
        $analysis = $data->analysis;
        $total_analysis = $data->total_analysis;


        $this->set(compact('analysis'));
        $this->set(compact('total_analysis'));
    }

    function statistics()
    {


        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        $year = $this->request->getQuery('year');
        $month_start =  $this->request->getQuery('month_start');
        $month_end = $this->request->getQuery('month_end');


        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/requests/user-report.json?month_start=' . $month_start . '&month_end=' . $month_end . '&year=' . $year);
        
        $data = (array) $data->analysis;
        if (!sizeof($data) == 0) {
            if (isset($data["Balística, Instrumentos e Outros"])){
                $balistica = (array) $data["Balística, Instrumentos e Outros"];
                $this->set("balistica", $balistica);
            }
            if (isset($data["Comunicação Interna"])){
                $comunicacao = (array) $data["Comunicação Interna"];
                $this->set("comunicacao", $comunicacao);
            }
            if (isset($data["Crimes Ambientais"])){
                $crimesAmbientais = (array) $data["Crimes Ambientais"];
                $this->set("crimesAmbientais", $crimesAmbientais);
            }
            if (isset($data["Crimes Contra a Vida"])){
                $crimesContraVida = (array) $data["Crimes Contra a Vida"];
                $this->set("crimesContraVida", $crimesContraVida);
            }
            if (isset($data["Crimes Contra o Patrimônio"])){
                $crimesContraPatrimonio = (array) $data["Crimes Contra o Patrimônio"];
                $this->set("crimesContraPatrimonio", $crimesContraPatrimonio);
            }
            if (isset($data["Outras Perícias"])){
                $outrasPericias = (array) $data["Outras Perícias"];
                $this->set("outrasPericias", $outrasPericias);
            }
            if (isset($data["Outros"])){
                $outros = (array) $data["Outros"];
                $this->set("outros", $outros);
            }
            if (isset($data["Trânsito"])){
                $transito = (array) $data["Trânsito"];
                $this->set("transito", $transito);
            }
            if (isset($data["Documentoscopia"])){
                $documentoscopia = (array) $data["Documentoscopia"];
                $this->set("documentoscopia", $documentoscopia);
            }
                    
            
            
        }
    }
   
}
