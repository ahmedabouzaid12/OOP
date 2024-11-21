<?php

class Session {
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    public static function get($key) {
        return self::has($key) ? $_SESSION[$key] : null;
    }

    public static function flash($key) {
        $value = self::get($key);
        self::remove($key);
        return $value;
    }

    public static function getAll() {
        return $_SESSION;
    }

    public static function remove($key) {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function removeAll() {
        session_unset();
        session_destroy();
    }
}

?>
