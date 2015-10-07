<?php


namespace NamespacePlaceholder\BaseBundle\Tests\Integration;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Liip\FunctionalTestBundle\Test\WebTestCase;

abstract class BaseIntegrationTest extends WebTestCase
{

    /**
     * @var ReferenceRepository
     */
    protected $referenceRepository;

    protected function setUp()
    {
        /** @var ORMExecutor $executor */
        $executor = $this->loadFixtures($this->getFixtureClasses());
        $this->referenceRepository = $executor->getReferenceRepository();
    }

    /**
     * @return string[]
     */
    abstract protected function getFixtureClasses();
}
