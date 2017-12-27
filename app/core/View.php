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

    public function header(){
        return <<<HEADER
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
HEADER;
    }

    public function footer(){
        return <<<FOOTER
</body>
</html>
FOOTER;

    }

    public function show()
    {
        echo $this->header();
        echo preg_replace_callback('/{{(.*?)[\|\|.*?]?}}/', function ($tag) {
            return $this->data->{$tag[1]};
        }, $this->content);
        echo $this->footer();
    }
}