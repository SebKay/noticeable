<?php

namespace Noticeable;

class Notice
{
    protected static $session_name = 'notice';

    /**
     * Set a new notice
     */
    public static function set($args)
    {
        $_SESSION[self::$session_name] = [
            'message' => ($args['message'] ?? null),
            'type'    => ($args['type'] ?? null)
        ];
    }

    /**
     * Get the last notice
     *
     * @return array
     */
    public static function get()
    {
        $notice = ($_SESSION[self::$session_name] ?? null);

        if (!$notice) {
            return [];
        }

        unset($_SESSION[self::$session_name]);

        return $notice;
    }
}
