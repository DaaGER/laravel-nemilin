<?php


namespace DaaGER\Nemilin;

use Illuminate\Http\Client\Factory as Http;

class NemilinClient
{
    private $project_id;
    private $http;
    private $token;
    private $url = "https://nemilin.pro/API/v1";
    private $method;
    private $param;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * @param  mixed  $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }


    public function send(): string
    {
        $url = $this->buildUrl();
        $result = $this->http->withHeaders(['Authorization' => $this->token])
            ->asJson()
            ->get($url)
            ->body();

        return $result;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param  mixed  $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * @param  int  $project_id
     */
    public function setProjectId(int $project_id): void
    {
        $this->project_id = $project_id;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param  mixed  $param
     */
    public function setParam($param): void
    {
        $this->param = $param;
    }

    /**
     * @return string
     */
    private function buildUrl(): string
    {
        $url = $this->getUrl()."/".$this->getMethod()."/".$this->getProjectId();
        if (!empty($this->getParam())) {
            $url .= "/".$this->getParam();
        }

        return $url;
    }


}
