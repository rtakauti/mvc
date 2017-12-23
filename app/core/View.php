<?php


namespace StudioVisual\Core;


class View
{

    private $content;
    private $data;

    public function __construct($view, $data)
    {
        if (file_exists($file = "../app/views/$view.html")) {
            $this->content = file_get_contents($file);
        }
        $this->data = $data;
    }

    public function show()
    {
        echo preg_replace_callback('/{{(.*?)[\|\|.*?]?}}/', function ($tag) {
            return $this->data->{'get' . $tag[1]}();
        }, $this->content);
    }
}