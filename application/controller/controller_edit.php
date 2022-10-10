<?php

class Controller_Edit extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function action_show()
    {
        $this->view->generate("edit_view.php","template_view.php");
    }
}