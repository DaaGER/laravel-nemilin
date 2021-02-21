<?php


namespace DaaGER\Nemilin;


class Nemilin
{
    private $client;


    public function __construct(NemilinClient $client)
    {
        $this->client = $client;
    }


    public function getMembersList()
    {
        $this->client->setMethod('getmembers');

        return $this->client->send();
    }

    public function checkMember(int $user_id)
    {
        $this->client->setMethod('checkmember');
        $this->client->setParam($user_id);

        return $this->client->send();
    }
}
