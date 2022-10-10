<?php

class View
{
    public function generate($content_view, $template_view, $data=null)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/task1/application/view/" . $template_view;
    }
}