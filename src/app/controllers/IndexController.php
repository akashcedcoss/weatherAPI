<?php

require BASE_PATH.'/vendor/autoload.php';
use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    /**
     * Listed every city using API
     *
     * @return void
     */
    public function indexAction()
    {
        // $cit = $this->request->getPost('city');
        // $this->view->city = $cit;
        $this->response->redirect('weather/getCity');
    }
}