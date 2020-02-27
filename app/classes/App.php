<?php

    namespace EveryTryCounts;

    class App {
        protected static $title = "Every Try Counts";
        protected static $head = "/app/views/partials/head.php";
        protected static $header = "/app/views/partials/header.php";
        protected static $body = "/app/views/partials/body.php";
        protected static $footer = "/app/views/partials/footer.php";
        protected static $ga_body = "/app/views/partials/ga_body.php";
        protected static $ga_head = "/app/views/partials/ga_head.php";
        protected static $scripts = "/app/views/partials/scripts.php";
        protected static $meta = "/app/views/partials/meta.php";
        protected static $gtm = "/app/views/partials/gtm.php";
        protected static $styles = "/app/views/partials/styles.php";

        public static function get_file($file) {
            require($_SERVER["DOCUMENT_ROOT"] . $file);
        }

        public static function get_head() {
            self::get_file(self::$head);
        }

        public static function get_header() {
            self::get_file(self::$header);
        }

        public static function get_body() {
            self::get_file(self::$body);
        }

        public static function get_footer() {
            self::get_file(self::$footer);
        }

        public static function get_ga($section) {
            if ($section == "head") {
                self::get_file(self::$ga_head);
            }

            if ($section == "body") {
                self::get_file(self::$ga_body);
            }
        }

        public static function get_scripts() {
            self::get_file(self::$scripts);
        }

        public static function get_meta() {
            self::get_file(self::$meta);
        }

        public static function get_gtm() {
            self::get_file(self::$gtm);
        }

        public static function get_title() {
            echo self::$title;
        }

        public static function get_styles() {
            self::get_file(self::$styles);
        }
    }

?>