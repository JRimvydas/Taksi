<?php

namespace Core;

use App\App;
use App\Users\Model;

class Session
{
    private $user;

    public function __construct()
    {
        session_start();
        $this->loginFromCookie();
    }

    /**
     * login from COOKIE
     */
    public function loginFromCookie()
    {
       $this->login($_SESSION['email'] ?? '', $_SESSION['password'] ?? '');
    }

    /**
     * login user
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {

        $user_data = Model::getWhere([
            'email' => $email,
            'password' => $password
        ]);

        if ($user_data) {
            $user = $user_data[0];
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $this->user = $user;

            return true;
        }

        return false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function logout(string $redirect = null)
    {
        $_SESSION = [];

        setcookie(session_name(), null, time() - 3600, "/");

        session_destroy();
        $this->user = null;

        if ($redirect) {
            header("Location: $redirect");
        }
    }
}