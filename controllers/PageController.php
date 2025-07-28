<?php

class PageController
{
    public function about()
    {
        include PATH_ROOT . 'views/pages/about.php';
    }

    public function contact()
    {
        include PATH_ROOT . 'views/pages/contact.php';
    }
}
