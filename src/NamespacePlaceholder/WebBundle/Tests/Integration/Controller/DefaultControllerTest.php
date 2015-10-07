<?php

namespace NamespacePlaceholder\WebBundle\Tests\Integration\Controller;

use NamespacePlaceholder\BaseBundle\DataFixtures\ORM\Users;
use NamespacePlaceholder\BaseBundle\Tests\Integration\BaseIntegrationTest;

class DefaultControllerTest extends BaseIntegrationTest
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Hello World")')->count() > 0);
    }

    /**
     * {@inheritdoc}
     */
    protected function getFixtureClasses()
    {
        return [Users::class];
    }
}
