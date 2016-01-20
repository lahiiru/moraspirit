<?php
/**
 * Created by PhpStorm.
 * User: Lahiru
 * Date: 18/01/2016
 * Time: 10:38 PM
 */
/* Please execute following Query
 *
 * ALTER TABLE `app_users` CHANGE `role` `role` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
 * INSERT INTO `moraspirit`.`app_users` (`username`, `password`, `email`, `id`, `is_active`, `role`) VALUES ('admin', '$2y$13$0aW6zsmFJEZKWgS8o5kK..U3KOP6mWC6rBl9VLPvEMuH6j8/1mLlO', 'admin@gmail.com', '1', '1', 'a:2:{i:0;s:10:"ROLE_ADMIN";i:1;s:9:"ROLE_USER";}');
 *
 */
namespace AppBundle\Security;

use AppBundle\Modal\DBAccess;
use AppBundle\Modal\DBConnection;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use AppBundle\Entity\User;

class UserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        $db = new DBConnection();
        $link=$db->connect();

        $query = "SELECT * FROM app_users WHERE username ='$username'";
        $result = $link->query($query);
        $user = null;
        while($row = mysqli_fetch_assoc($result)){
            $user = new User($row['username'],$row['password'],$row['email'],unserialize($row['role']));
        }

        if($user==null){
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }
        $db->closeConnection();
        //new User("$username", password_hash("1234", PASSWORD_BCRYPT, array('cost' => 13)), "1234", ["ROLE_USER","ROLE_ADMIN"]);
        // make a call to your webservice here
        return $user;
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