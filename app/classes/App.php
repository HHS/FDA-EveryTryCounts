<?php

namespace App;

class App {
    protected $head = "/app/views/partials/head.php";
    protected $header = "/app/views/partials/header.php";
    protected $body = "/app/views/partials/body.php";
    protected $footer = "/app/views/partials/footer.php";
    protected $ga = "/app/views/partials/ga.php";
    protected $scripts = "/app/views/partials/scripts.php";
    protected $meta = "/app/views/partials/meta.php";

    function get_file($file) {
        require($_SERVER["DOCUMENT_ROOT"] . $file);
    }

    function get_head() {
        $this->get_file($this->head);
    }

    function get_header() {
        $this->get_file($this->header);
    }

    function get_body() {
        $this->get_file($this->body);
    }

    function get_footer() {
        $this->get_file($this->footer);
    }

    function get_ga() {
        $this->get_file($this->ga);
    }

    function get_scripts() {
        $this->get_file($this->scripts);
    }

    function get_meta() {
        $this->get_file($this->meta);
    }
}

$app = new App();

?>