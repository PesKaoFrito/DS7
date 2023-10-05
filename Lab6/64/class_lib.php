<?php
class Foo {
        public static $mi_static = 'foo';
        public function staticValor() {
            return self::$mi_static;
        }
    }
    class Bar extends Foo {
        public function fooStatic() {
            return parent::$mi_static;
        }
    }
?>