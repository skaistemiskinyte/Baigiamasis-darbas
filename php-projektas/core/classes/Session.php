<?php

namespace Core;

use App\App;

/**
 * class for authentication
 *
 * Class Session
 * @package Core
 */
class Session
{

    public function __construct()
    {
        $this->loginFromCookie();
    }

    /**
     * @return bool
     */
    public function loginFromCookie(): bool
    {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $this->login($_SESSION['username'], $_SESSION['password']);
            return true;
        }

        return false;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        // password_verify( $pass, password_hash($pass, PASSWORD_BCRYPT) )


        $user = App::$db->getRowWhere('users', ['user_name' => $username]);
        if ($user) {
            if (is_array($user)) {
                $user = reset($user);
            }

            if (!password_verify($password, $user['password'])) {
                return false;
            }

            $_SESSION['user_name'] = $user['user_name'];

            return true;
        }
        return false;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $_SESSION['user_name'] ?? null;
    }

    /**
     * Logout user from site
     *
     * @param string|null $redirect
     */
    public function logout(string $redirect = null): void
    {
        setcookie('PHPSESSID', null, -1);
        session_destroy();
        $_SESSION = [];
        if ($redirect) {
            header("Location: $redirect");
            exit;
        }
    }
}