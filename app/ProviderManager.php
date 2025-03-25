<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class ProviderManager
{
    private $config;
    private $provider;

    public function __construct($yamlPath) {
        $this->config = Yaml::parseFile($yamlPath);
        $this->provider = $this->config['providers'][0];
    }

    public function getEndpoint($endpointName) {
        $endpoint = $this->provider['endpoints'][$endpointName];
//        $handler = new EndpointHandler($this->provider, $endpoint);
//        return $handler->execute();
    }

    public function getProvider() {
        return $this->provider;
    }
}
