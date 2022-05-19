<?php 
    namespace App\Services;

    class MyTestService {
        private $test;

        public function __construct() {
            $this->test = "test";
        }

        public function test() {
            return dd($this->test);
        }
    }
?>