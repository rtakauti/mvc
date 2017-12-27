<?php


namespace StudioVisual\Core;


class View
{

    private $content;
    private $data;
    private $title;

    public function __construct($view, $data)
    {
        if (!file_exists($file = "../app/views/$view.html")) {
            $this->data = false;
        }
        $this->title = ucfirst(explode('/', $view)[0]);
        $this->content = file_get_contents($file);
        $this->data = $data;
    }

    public function header()
    {
        return <<<HEADER
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>$this->title</title>
    <base href="/public/css/">
    <link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>
HEADER;
    }

    public function footer()
    {
        return <<<FOOTER
</body>
</html>
FOOTER;

    }

    public function show()
    {
        if (!$this->data) {
            echo 'Erro ao renderizar pagina';
            return false;
        }
        echo $this->header();
        echo preg_replace_callback('/{{(.*?)[\|\|.*?]?}}/', function ($tag) {
            return $this->data->{$tag[1]};
        }, $this->content);
        echo $this->footer();
    }
}