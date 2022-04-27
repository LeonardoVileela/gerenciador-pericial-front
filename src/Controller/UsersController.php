<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'register', 'forgetPassword', 'changePass']);
    }

    public function uploadFile()
    {

        if ($this->request->is('post')) {

            $id = $this->request->getData('id');
            $id = (int) $id;

            $picture_ext = pathinfo($this->request->data['profile_picture'][0]['name'], PATHINFO_EXTENSION);


            if (in_array($picture_ext, ['png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF'])) {
                $user['profile_picture'] = uniqid() . rand(10, 99) . '.' . $picture_ext;

                $data = ['id' => $id, 'profile_picture' => $user['profile_picture']];

                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/edit.json", $data, $this->Auth->user('token'));

                if ($response->user) {
                    $user = (array) $response->user;
                    $user['token'] = $this->Auth->user('token');
                    $this->Auth->setUser($user);


                    $this->Upload->uploadFile('pictures', $user['profile_picture'], $this->request->data['profile_picture'][0]);
                    $this->Flash->success("Imagem alterada com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
                } else {
                    $this->Flash->error('Ocorreu um erro ao tentar salvar a imagem. Por favor, tente novamente.');
                    return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
                }
            } else {
                $this->Flash->error("Extensao de arquivo inválida.");
                return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
            }
        }
    }

    public function register()
    {

        if ($this->request->is('post')) {
            $data = $this->request->getData();


            if ($data['password'] != $data['confirmPassword']) {
                $this->Flash->error('As senhas não conferem.');
                $this->set('users', null);
                return;
            }

            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/add.json", $data);

            if (!isset($response->error)) {
                $this->Flash->success("Cadastro realizado com sucesso.");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                if (isset($response->error->email->_isUnique)) {
                    $this->Flash->error('Este e-mail ja está cadastrado no sitema.');
                    $this->set('users', $response->user);
                } else {
                    $this->Flash->error('Todas as informações devem ser preenchidas.');
                    if ($response->user == [])
                        $this->set('users', null);
                    else
                        $this->set('users', $response->user);
                }
            }
        } else {
            $this->set('users', null);
        }
    }

    public function forgetPassword()
    {
    }

    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    public function changePass($token = null)
    {
        if ($token == null || $token == '') {
            $this->Flash->error(__('Link Inválido!'));
            return $this->redirect(['controller' => '/']);
        }

        $data = explode('.', $token);
        $user_id = $data[0];
        $tokenCode = $data[1];
        $data = ['id' => $user_id, 'tokenCode' => $tokenCode];

        $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/account/verify-token.json", $data);

        if ($response->error == false) {
            $id = $response->id;
            $token = $response->tokenCode;

            $data = ['id' => $id, 'token' => $token];
            $this->set('data', $data);
        } else {
            $this->Flash->error(__('Link Inválido!'));
            return $this->redirect(['controller' => '/']);
        }
    }

    public function authorizeUser()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->user('role_id') == 2) {

                $id = $this->request->getData('id');

                $data = ['id' => $id];
                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/authorize-user.json", $data, $this->Auth->user('token'));

                if (!$response->error) {
                    $this->Flash->success("Usuário autorizado com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUnUsers']);
                } else {
                    $this->Flash->success("Erro ao autorizar o usuário. Por favor, contate o desenvolvedor.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUnUsers']);
                }
            } else {
                $this->Flash->error('Você não é um admin.');
            }
        } else {
            $this->Flash->error('Apenas post request.');
        }
    }

    public function unauthorizeUser()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->user('role_id') == 2) {
                $id = $this->request->getData('id');
                $data = ['id' => $id];

                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/delete.json", $data, $this->Auth->user('token'));

                if (!$response->error) {
                    $this->Flash->success("Usuário removido com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUnUsers']);
                } else {
                    $this->Flash->success("Erro ao remover o usuário. Por favor, contate o desenvolvedor.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUnUsers']);
                }
            } else {
                $this->Flash->error('Você não é um admin.');
            }
        } else {
            $this->Flash->error('Apenas post request.');
        }
    }

    public function promoteUser()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->user('role_id') == 2) {
                $id = $this->request->getData('id');
                $data = ['id' => $id];

                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/promote-user.json", $data, $this->Auth->user('token'));

                if (!$response->error) {
                    $this->Flash->success("Usuário promovido com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUsers']);
                } else {
                    $this->Flash->success("Erro ao promover o usuário. Por favor, contate o desenvolvedor.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUsers']);
                }
            } else {
                $this->Flash->error('Você não é um admin.');
            }
        } else {
            $this->Flash->error('Apenas post request.');
        }
    }

    public function activateUser()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->user('role_id') == 2) {
                $id = $this->request->getData('id');
                $data = ['id' => $id];

                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/activate-user.json", $data, $this->Auth->user('token'));

                if (!$response->error) {
                    $this->Flash->success("Usuário ativado com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUsers']);
                } else {
                    $this->Flash->success("Erro ao ativar o usuário. Por favor, contate o desenvolvedor.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUsers']);
                }
            } else {
                $this->Flash->error('Você não é um admin.');
            }
        } else {
            $this->Flash->error('Apenas post request.');
        }
    }

    public function removeUser()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->user('role_id') == 2) {
                $id = $this->request->getData('id');
                $data = ['id' => $id];

                $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/delete.json", $data, $this->Auth->user('token'));

                if (!$response->error) {
                    $this->Flash->success("Usuário removido com sucesso.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUsers']);
                } else {
                    $this->Flash->success("Erro ao remover o usuário. Por favor, contate o desenvolvedor.");
                    return $this->redirect(['controller' => 'Pages', 'action' => 'viewUnUsers']);
                }
            } else {
                $this->Flash->error('Você não é um admin.');
            }
        } else {
            $this->Flash->error('Apenas post request.');
        }
    }

    public function edit()
    {
        $data = $this->request->getData();
        if ($this->request->is('post')) {
            $response = $this->post_request("http://localhost/p05-ger-pericial-back" . "/users/edit.json", $data, $this->Auth->user('token'));
            
            if (!$response->user) {
                $this->Flash->error('Erro ao salvar o perfil. Entre em contato com os administradores');
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $user = (array) $response->user;
                $user['token'] = $this->Auth->user('token');
                $this->Auth->setUser($user);

                $this->Flash->success('Perfil editado com sucesso.');
                return $this->redirect(['controller' => 'Pages', 'action' => 'profile']);
            }
        }
    }

    public function delete($id = null)
    {
    }
}
