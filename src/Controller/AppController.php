<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'authError' => 'Você não pode acessar essa àrea.',
            'storage' => 'Session'
        ]);


        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    function get_request($token, $path)
    {

        header('Content-Type: application/json'); // Specify the type of data
        $ch = curl_init($path); // Initialise cURL
        $authorization = "Authorization: Bearer " . $token; // Prepare the authorisation token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization)); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, null); // Set the posted fields
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
        $result = curl_exec($ch); // Execute the cURL statement
        curl_close($ch); // Close the cURL connection
        return json_decode($result); // Return the received data

    }

    function post_file($path, $type, $file, $token)
    {
        $curl = curl_init();
        if ($type == 'd') {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $path,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('document' => curl_file_create(WWW_ROOT . 'files' . DS . 'documents' . DS . $file['name']), 'id' => $file['id'], 'title' => $file['title']),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $token
                ),
            ));
        } else {
            return false;
        }

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    function post_request($path, $data, $token = null)
    {
        
        $json = json_encode($data);

        $ch = curl_init($path);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $authorization = "Authorization: Bearer " . $token; // Prepare the authorisation token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            'Content-Type: application/json',
            $authorization,
            'Content-Length: ' . strlen($json)

        ));
        $response = curl_exec($ch);
        curl_close($ch); // Close the cURL connection
        return json_decode($response);
    }

    function put_request($path, $data, $token = null)
    {
        $json = json_encode($data);

        $ch = curl_init($path);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $authorization = "Authorization: Bearer " . $token; // Prepare the authorisation token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            'Content-Type: application/json',
            $authorization,
            'Content-Length: ' . strlen($json)

        ));

        return json_decode(curl_exec($ch));
    }

    public function verifyUser()
    {
        if ($this->Auth->user('actived') && $this->Auth->user('confirmation'))
            return true;
        else
            return false;
    }
}
