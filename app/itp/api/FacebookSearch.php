<?php

namespace itp\api;

class FacebookSearch
{
    public function getResults($company)
    {
        $endpoint = "https://graph.facebook.com/$company";
        $json = file_get_contents($endpoint);
        return json_decode($json);
    }
}