<?php

namespace App\Services;

use SoapClient;
use Illuminate\Support\Facades\Http;

class ApiReaderService
{
    public function getRestData(): array
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/1');

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Error fetching REST API'];
    }

    public function getSoapData(): array
    {
        try {
            $client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");
            $params = ["intA" => 5, "intB" => 3];
            $result = $client->__soapCall("Add", [$params]);

            return ['result' => $result->AddResult];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getCombinedData(): array
    {
        return [
            'rest_api' => $this->getRestData(),
            'soap_api' => $this->getSoapData(),
        ];
    }
}
