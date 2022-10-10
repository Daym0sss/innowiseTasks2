<?php
require ($_SERVER['DOCUMENT_ROOT'] . "/task1/application/model/model_main.php");

class Controller_Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model=new Model_Main();
    }

    function action_index()
    {
        $data=$this->model->get_data();
        $this->view->generate("main_view.php","template_view.php",$data);
    }
}