<?php

namespace NamespacePlaceholder\BaseBundle\Tests\Integration\Repository;

use NamespacePlaceholder\BaseBundle\DataFixtures\ORM\Users;
use NamespacePlaceholder\BaseBundle\Tests\Integration\BaseIntegrationTest;

class UserRepositoryTest extends BaseIntegrationTest
{

    public function testNumUsers()
    {
        $userRepository = $this->getContainer()->get('namespace_placeholder_base.repository.user');
        $users = $userRepository->findAll();
        $this->assertCount(2, $users);
    }

    /**
     * @return string[]
     */
    protected function getFixtureClasses()
    {
        return [Users::class];
    }
}
