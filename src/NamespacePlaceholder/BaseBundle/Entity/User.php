<?php

namespace NamespacePlaceholder\BaseBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

class User extends BaseUser
{

    public function __construct()
    {
        parent::__construct();
    }
}
