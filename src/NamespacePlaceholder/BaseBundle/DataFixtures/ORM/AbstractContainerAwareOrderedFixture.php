<?php


namespace NamespacePlaceholder\BaseBundle\DataFixtures\ORM;

use BandExchange\BaseBundle\Entity\Band;
use BandExchange\BaseBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractContainerAwareOrderedFixture extends AbstractFixture implements
    OrderedFixtureInterface,
    ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        return $this->container->get('fos_user.user_manager');
    }
}
