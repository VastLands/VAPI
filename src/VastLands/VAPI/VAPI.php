<?php


namespace VastLands\VAPI;


use VastLands\VAPI\VProfile\VProfile;

class VAPI
{

    public $userAgent = "";

    const USERAGENT_PREFIX = "VAPI_PHP-";
    const API_ENDPOINT = "https://api.vastlands.net/";

    public function __construct(string $userAgent)
    {
        $this->setUserAgent($userAgent);
    }

    /**
     * @return string
     */
    public function getUserAgent() : string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent(string $userAgent): void
    {
        if(strlen($userAgent) > 256) {
            throw new \Exception("The User Agent length must be less than 256 characters!");
        }
        $this->userAgent = VAPI::USERAGENT_PREFIX . $userAgent;
    }

    public function parseUsername(string $username) : string {
        return rawurlencode($username);
    }

    public function getVProfile(string $username) : VProfile {
        return new VProfile($this->parseUsername($username));
    }
}