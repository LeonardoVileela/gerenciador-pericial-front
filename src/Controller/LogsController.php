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
class LogsController extends AppController
{


    function logs($page = null)
    {

        if (!$this->verifyUser()) {
            $this->Flash->error("Você não tem autorização para acessar o sistema!");
            return;
        }

        $search = $this->request->getQuery('search');

        if ($page != null) {
            $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/logs/view.json?page=' . $page . '&search='. $search);

            $data = (array) $data;
            $data = $data['logs'];
            foreach ($data as $log) {
                $log->created = date("d/m/Y H:i:s", strtotime($log->created));
            }

            $this->set(compact('data'));
        } else {
            $data = $this->get_request($this->Auth->user('token'), "http://localhost/p05-ger-pericial-back" . '/logs/view.json?search='. $search);
            $data = (array) $data;
            $data = $data['logs'];
            $cont = 0;
            foreach ($data as $log) {
                $log->created = date("d/m/Y H:i:s", strtotime($log->created));
            }


            $this->set(compact('data'));
        }
    }
}
