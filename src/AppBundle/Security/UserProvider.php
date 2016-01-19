<?php
/**
 * Created by PhpStorm.
 * User: Lahiru
 * Date: 18/01/2016
 * Time: 10:38 PM
 */

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use AppBundle\Entity\User;

class UserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        // make a call to your webservice here
        return new User("$username", password_hash("1234", PASSWORD_BCRYPT, array('cost' => 13)), "", ["ROLE_ADMIN"]);
/*
        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
*/
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'AppBundle\Entity\User';
    }
}