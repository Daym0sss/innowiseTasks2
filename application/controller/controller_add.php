<?php

class Controller_Add extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function action_show()
    {
        $this->view->generate("add_view.php","template_view.php");
    }
}