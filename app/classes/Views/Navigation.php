<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View
{
    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->addLink('left', '/', 'Titulinis');
        $this->addLink('left', '/feedback', 'Atsiliepimai');
        $user = App::$session->getUser();

        if ($user) {
            $this->addLink('right', '/logout', "logout($user->email)");
        } else {
            $this->addLink('right', '/login', 'Login');
            $this->addLink('right', '/register', 'Register');
        }
    }

    public function addLink($section, $url, $title)
    {
        $link = ['url' => $url, 'title' => $title];
        if ($_SERVER['REQUEST_URI'] === $link['url']) {
            $link['active'] = true;
        }
        $this->data[$section][] = $link;
    }

    public function render($path = ROOT . '/app/templates/navigation.php')
    {
        return parent::render($path);
    }

}