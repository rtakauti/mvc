<?php


namespace StudioVisual\Core;


class View
{

    private $content;
    private $data;

    public function __construct($view, $data)
    {
        $file = '../app/views/' . $view . '.html';
        if (file_exists($file)) {
            $this->content = file_get_contents($file);
        }
        $this->data = $data;
    }

    private function replace($tag)
    {
        return $this->data->{'get'.ucfirst($tag[1])}();
    }

    public function show()
    {
        echo preg_replace_callback('/{{(.*?)[\|\|.*?]?}}/', [$this, 'replace'], $this->content);
    }
}