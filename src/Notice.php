<?php

namespace Noticeable;

class Notice
{
    /**
     * @var array
     */
    protected static $allowed_types = ['success', 'error'];

    /**
     * @var string
     */
    protected static $session_name = 'notice';

    /**
     * Set a new notice
     */
    public static function set(array $args): void
    {
        if (!isset($args['message']) || $args['message'] == '') {
            throw new \Exception('Please provide a notice message.');
        }

        if (!isset($args['type']) || $args['type'] == '') {
            throw new \Exception('Please provide a notice type.');
        }

        if (!in_array($args['type'], self::$allowed_types)) {
            throw new \Exception("{$args['type']} is not a valid notice type.");
        }

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
