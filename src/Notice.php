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
    public static function set(NoticeContent $notice_content): void
    {
        $_SESSION[self::$session_name] = $notice_content;
    }

    /**
     * Get the last notice
     *
     * @return NoticeContent
     */
    public static function get(): NoticeContent
    {
        $notice = ($_SESSION[self::$session_name] ?? []);

        unset($_SESSION[self::$session_name]);

        return $notice;
    }
}
