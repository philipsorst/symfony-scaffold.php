<?php


namespace NamespacePlaceholder\BaseBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class Users extends AbstractContainerAwareOrderedFixture
{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->getUserManager();

        $user = $userManager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@example.com');
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $userManager->updateUser($user);

        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@example.com');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);
        $admin->addRole('ROLE_ADMIN');
        $userManager->updateUser($admin);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 0;
    }
}
