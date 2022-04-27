<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisitions Controller
 *
 *
 * @method \App\Model\Entity\Requisition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequisitionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $vitimas = [];
            $veiculos = [];
            $aux = [];
            $data['data_documento'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_documento'])));
            if ($data['data_recebimento'] == "") {
                $data['data_recebimento'] = null;
            } else {
                $data['data_recebimento'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_recebimento'])));
            }
            if ($data['data_realizacao_pericia'] == "") {
                $data['data_realizacao_pericia'] = null;
            } else {
                $data['data_realizacao_pericia'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_realizacao_pericia'])));
            }




            foreach ($data['victim'] as $victim) {
                if ($victim != "") {
                    $infos = ['name' => $victim];
                    array_push($vitimas, $infos);
                }
            }

            $data['victim'] = $vitimas;



            for ($i = 0; $i < count($data['vehicles']); $i = $i + 4) {
                if ($data['vehicles'][$i] != "" ||  $data['vehicles'][$i + 1] != ""  || $data['vehicles'][$i + 2] != "" || $data['vehicles'][$i + 3] != "") {
                    $aux = ['marca' => $data['vehicles'][$i], 'cor' => $data['vehicles'][$i + 1], 'placa' => $data['vehicles'][$i + 2], 'tipo_veiculo' => $data['vehicles'][$i + 3]];
                    array_push($veiculos, $aux);

                    $aux = [];
                }
            }

            $data['vehicles'] = $veiculos;


            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . '/requests/add.json', $data, $this->Auth->user('token'));

          
            if (!isset($response->error)) {

                $this->Flash->success("A requisição foi salva com sucesso.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            } else {
                $this->Flash->error("Ocorreu um erro durante o cadastro. Por favor, tente novamente.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            }
        }
    }



    function sendDocument()
    {

        $document_ext = pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION);


        if (in_array($document_ext, ['png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF', 'pdf', 'doc', 'docx', 'csv', 'txt', 'pptx', 'ppt',  'xlsx', 'xls', 'odt', 'rtf', 'html'])) {
            $name = uniqid() . rand(10, 99) . '.' . $document_ext;
            $id = $this->request->getData('id');


            $this->Upload->uploadFile('documents', $name, $this->request->data['document']);


            $file = ['name' => $name, 'id' => $id, 'title' => $this->request->data['document']['name']];

            $response = $this->post_file("http://localhost/p05-ger-pericial-back" . '/requests/upload-document.json', 'd', $file, $this->Auth->user('token'));
           
            if ($response == null) {
                if (file_exists(WWW_ROOT . 'files' . DS . 'documents' . DS . $name))
                    unlink(WWW_ROOT . 'files' . DS . 'documents' . DS . $name);

                $this->Flash->error("Não conseguimos subir seu documento, entre em contato com os administradores.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            }
            if ($response->success == true) {
                if (file_exists(WWW_ROOT . 'files' . DS . 'documents' . DS . $name))
                    unlink(WWW_ROOT . 'files' . DS . 'documents' . DS . $name);
                $this->Flash->success("O documento subiu com sucesso pro servidor");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            } else {
                if (file_exists(WWW_ROOT . 'files' . DS . 'documents' . DS . $name))
                    unlink(WWW_ROOT . 'files' . DS . 'documents' . DS . $name);
                $this->Flash->error("O documento é muito pesado para upar no sistema. (Máximo de 100MB)");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            }
        } else {
            $this->Flash->error("A extensão de arquivo não é válida.");
            return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
        }
    }

    public function addRequisition()
    {
        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-users.json');

        $this->set(compact('data'));
    }

    public function editRequisition($id = null)
    {
        $response = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/requests/view-one/' . $id . '.json');

        $data = (array) $response;


        if ($data["request"]->data_realizacao_pericia != null)
            $data["request"]->data_realizacao_pericia = date("d/m/Y", strtotime(str_replace('-', '/', $data["request"]->data_realizacao_pericia)));
        if ($data["request"]->data_recebimento != null)
            $data["request"]->data_recebimento = date("d/m/Y", strtotime(str_replace('-', '/', $data["request"]->data_recebimento)));

        $data["request"]->data_documento = date("d/m/Y", strtotime(str_replace('-', '/', $data["request"]->data_documento)));

        $request = $data['request'];
        $this->set(compact('request'));

        $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/users/view-users.json');

        $this->set(compact('data'));
    }

    public function edit()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $vitimas = [];
            $vehicles = [];

            if (isset($data['victims'])) {
                foreach ($data['victims'] as $key => $victim) {
                    if ($victim != "") {
                        if (!isset($data['victim_id'])) {
                            $infos = ['name' => $victim];
                            array_push($vitimas, $infos);
                        } else if (!isset($data['victim_id'][$key])) {
                            $infos = ['name' => $victim];
                            array_push($vitimas, $infos);
                        } else {
                            $infos = ['name' => $victim, 'id' => $data['victim_id'][$key]];
                            array_push($vitimas, $infos);
                        }
                    }
                }

                $data['victims'] = $vitimas;
            } else {
                $data['victims'] = [];
            }

            if (isset($data['marca'])) {
                foreach ($data['marca'] as $key => $marca) {
                    if ($marca != "" || $data['cor'][$key] != "" || $data['placa'][$key] != "" || $data['tipo_veiculo'][$key] != "") {
                        if (!isset($data['vehicle_id'])) {
                            $infos = ['marca' => $marca, 'cor' => $data['cor'][$key], 'placa' =>  $data['placa'][$key], 'tipo_veiculo' => $data['tipo_veiculo'][$key]];
                            array_push($vehicles, $infos);
                        } else if (!isset($data['vehicle_id'][$key])) {
                            $infos = ['marca' => $marca, 'cor' => $data['cor'][$key], 'placa' =>  $data['placa'][$key], 'tipo_veiculo' => $data['tipo_veiculo'][$key]];
                            array_push($vehicles, $infos);
                        } else {
                            $infos = ['marca' => $marca, 'cor' => $data['cor'][$key], 'placa' =>  $data['placa'][$key], 'tipo_veiculo' => $data['tipo_veiculo'][$key], 'id' => $data['vehicle_id'][$key]];
                            array_push($vehicles, $infos);
                        }
                    }
                }
                $data['vehicles'] = $vehicles;
            } else {
                $data['vehicles'] = [];
            }

            $data['data_documento'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_documento'])));
            $data['data_recebimento'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_recebimento'])));
            $data['data_realizacao_pericia'] = date("Y-m-d", strtotime(str_replace('/', '-', $data['data_realizacao_pericia'])));

            $response = $this->put_request("http://localhost/p05-ger-pericial-back" . '/requests/edit.json', $data, $this->Auth->user('token'));

            if (!isset($response->error)) {

                $this->Flash->success("A requisição foi editada com sucesso");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            } else {
                $this->Flash->error("Ocorreu um erro durante a edição. Por favor, tente novamente.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'requisition']);
            }
        }
    }

    public function uploadDocument()
    {
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
