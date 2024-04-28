<?php

class HarvardApi
{
    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function makeRequest($endpoint)
    {
        $api_url = 'https://api.harvardartmuseums.org/' . $endpoint . '?apikey=' . $this->api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}
?>
