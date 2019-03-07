<?php

namespace jakharbek\sms\interfaces;


use jakharbek\sms\dto\sendSmsResponseDTO;

interface SmsSenderInterface
{
    public function connection();

    public function sendSms($phone, $msg): sendSmsResponseDTO;

    public function isDelivered($id): bool;

}