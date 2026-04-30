<?php

namespace service;

use dao\mysql\HomeControllersDAO;

class HomeControllersService extends HomeControllersDAO
{
public function teste() 
    {
        return parent::teste();
    }
}