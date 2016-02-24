<?php


namespace NamespacePlaceholder\WebBundle\Menu;

use Knp\Menu\FactoryInterface;
use NamespacePlaceholder\BaseBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuBuilder
{

    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    public function __construct(
        FactoryInterface $factory,
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker
    ) {
        $this->factory = $factory;
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function createNavbarLeftMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        return $menu;
    }

    public function createNavbarRightMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $user = $this->getUser();

        if (null === $user) {
            $menu->addChild('Login', ['route' => 'fos_user_security_login']);

            return $menu;
        }

        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            // Add admin menu here
        }

        $userMenu = $menu->addChild($user->getUsername());
        $userMenu->addChild('Profil', ['route' => 'fos_user_profile_show']);
        $userMenu->addChild('Logout', ['route' => 'fos_user_security_logout']);

        return $menu;
    }

    /**
     * Get the current user. Taken from Symfony Controller.
     *
     * @return User|null
     */
    protected function getUser()
    {
        /** @var TokenInterface $token */
        if (null === $token = $this->tokenStorage->getToken()) {
            return null;
        }

        if (!is_object($user = $token->getUser())) {
            return null;
        }

        if ($user === null) {
            return null;
        }

        return $user;
    }
}
