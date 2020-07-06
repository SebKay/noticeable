<?php

namespace Noticeable;

class Notice
{
    /**
     * @var string
     */
    protected static $session_name = 'notice';

    /**
     * Set a new notice
     */
    public static function set(array $args): void
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
    public static function get(): array
    {
        $notice = ($_SESSION[self::$session_name] ?? []);

        unset($_SESSION[self::$session_name]);

        return $notice;
    }
}
