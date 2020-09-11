<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Elasticsearch {
    public $index;

    // function __construct($config = array('server' => 'http://localhost:9200'))
    function __construct($config = array('server' => 'elastic:9200'))
    {
        $this->server = $config['server'];
    }

    function call_debitur($path, $method = 'GET', $data = NULL)
    {
        // if (!$this->index) throw new Exception('$this->index needs a value');
		
		$this->index = 'debitur';

        // echo $url = $this->server . '/' . $this->index . '/' . $path;
        $url = $this->server . '/' . $this->index . '/' . $path;

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }

        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);        
        
        return json_decode($response);
    }

}