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
    <base href="/public/dist/">
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
</head>
<body>
HEADER;
    }

    public function footer()
    {
        return <<<FOOTER
<script src="vendor.bundle.js"></script>
<script src="bundle.js"></script>
</body>
</html>
FOOTER;

    }

    public function show()
    {
        echo $this->header() .
            preg_replace_callback_array([
                '/@endLoop:(\w+)/s' => function () {
                    return '';
                },
                '/@loop:(\w+)(.*+)/s' => function ($placeHolder) {
                    return implode('', array_map(function ($attribute) use  ($placeHolder){
                       return  preg_replace_callback('/{{(\w+)}}/', function ($match) use ($attribute) {
                           return $attribute[$match[1]];
                       }, $placeHolder[2]);
                    },$this->data[$placeHolder[1]]));
                },
                '/{{(\w+)\.(\w+)}}/' => function ($placeHolder) {
                    if (is_object($this->data[$placeHolder[1]])) {
                        return $this->data[$placeHolder[1]]->{$placeHolder[2]};
                    }
                    return $this->data[$placeHolder[1]][$placeHolder[2]];
                },
                '/{{(\w+)}}/' => function ($placeHolder) {
                    return $this->data[$placeHolder[1]];
                },
            ], $this->content) .
            $this->footer();
    }
}