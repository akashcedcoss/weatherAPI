<?php

require BASE_PATH.'/vendor/autoload.php';
use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    /**
     * Listed every city using API
     *
     * @return void
     */
    public function indexAction()
    {
        $cit = $this->request->getPost('city');
        $this->view->city = $cit;
    }
    public function getCityAction()
    { 
        $cityname = $this->request->getPost('name');
    }
    public function tempDetailsAction()
    { 
        $cityname = $this->request->getPost('name');
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q='.$cityname.'&aqi=no',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $city = json_decode($data);
        $this->view->city = $city;
    }
    
    public function forecastAction() {
        echo "<pre>";
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=3&aqi=no&alerts=no',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $forecast = json_decode($data);
        $this->view->forecast = $forecast;
    }
    public function historyAction(){
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $date = date("Y-m-d");
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/history.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&dt='.$date.'',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $current = json_decode($data);
        $this->view->current = $current;
        
        
    }
    public function timezoneAction() {
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/timezone.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $timezone = json_decode($data);
        $this->view->timezone = $timezone;
        
    }
    public function sportsAction() {
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/sports.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $sports = json_decode($data);
        $this->view->sports = $sports;
        
    }
    public function astronomyAction() {
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $date = date("Y-m-d");
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/astronomy.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&dt='.$date.'',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $astronomy = json_decode($data);
        $this->view->astronomy = $astronomy;
        
    }
    public function airqualityAction() {
        
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $date = date("Y-m-d");
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=1&aqi=yes&alerts=no',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $air = json_decode($data);
        $this->view->air = $air;

    }
    public function currentAction() {
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $date = date("Y-m-d");
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=1&aqi=yes&alerts=no',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $current = json_decode($data);
        $this->view->current = $current;
    }
    public function alertsAction() {
        // echo "No data found";
        $city = $this->request->getPost('city');
        $btn = $this->request->getPost('name');
        $date = date("Y-m-d");
        $client = new Client(['base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=1&aqi=no&alerts=yes',]);
        $response = $client->request('GET');
        $data = $response->getBody();
        $current = json_decode($data);
        $this->view->alerts = $current;
    }
}
