<?php

class Controller_Delete extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function action_show()
    {
        $this->view->generate("delete_view.php","template_view.php");
    }
}