<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisitions Controller
 *
 *
 * @method \App\Model\Entity\Requisition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($data['delivery_date'] == "") {
                $data['delivery_date'] = null;
            } else {
                $data['delivery_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['delivery_date'])));
            }


            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . '/reports/add.json', $data, $this->Auth->user('token'));

            if (isset($response->code)) {
                $this->Flash->error("O laudo deve ter um usuário responsável");
                return $this->redirect(['controller' => 'Reports', 'action' => 'addReport', $data['request_id']]);
            }
            if (!isset($response->error)) {
                $this->Flash->success("O laudo foi salvo com sucesso");
                return $this->redirect(['controller' => 'Pages', 'action' => 'report']);
            } else {
                $this->Flash->error("Ocorreu um erro durante o cadastro. Por favor, tente novamente.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'report']);
            }
        }
    }

    public function addReport($id = null)
    {
        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-users.json');

        $this->set(compact('data'));
        $this->set('request_id', $id);
    }

    public function editReport($id = null)
    {
        $users = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-users.json');
        $this->set(compact('users'));

        $response = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/reports/view-one/' . $id . '.json');

        $data = (array) $response;
        $report = $data['report'];
        
      
        $report[0]->delivery_date = date("d-m-Y", strtotime(str_replace('/', '-', $report[0]->delivery_date)));
     

        $this->set(compact('report'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $data['id'] = intval($data['id']);
            $data['user_id'] = intval($data['user_id']);

            $data['delivery_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['delivery_date'])));

            $response = $this->put_request("http://localhost/p05-ger-pericial-back" . '/reports/edit.json', $data, $this->Auth->user('token'));
           
            if (!isset($response->error)) {
                $this->Flash->success("O laudo foi editado com sucesso");
                return $this->redirect(['controller' => 'Pages', 'action' => 'report']);
            } else {
                $this->Flash->error("Ocorreu um erro durante a edição. Por favor, tente novamente.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'report']);
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    }
}
