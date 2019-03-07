<?php

namespace jakharbek\sms\providers\playmobile;

use GuzzleHttp\Client;
use Yii;

/**
 * Class PlaymobileDriver
 * @package common\modules\sms\providers
 */
class PlaymobileDriver extends PlaymobileDriverAbstract
{
    public $username;
    public $password;
    public $originator;

    /**
     * PlaymobileDriver constructor.
     * @param PlaymobileConnectionDTO $playmobileConnectionDTO
     * @param Client $client
     * @param array $config
     */
    public function __construct(PlaymobileConnectionDTO $playmobileConnectionDTO, array $config = array())
    {
        $this->username = $playmobileConnectionDTO->username;
        $this->password = $playmobileConnectionDTO->password;
        $this->originator = $playmobileConnectionDTO->originator;

        $client = Yii::createObject(Client::class);

        parent::__construct($client, $config);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed|string
     */
    public function getOriginator()
    {
        return $this->originator;
    }
}