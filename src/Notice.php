<?php

namespace Noticeable;

class Notice
{
    /**
     * @var string
     */
    protected static $session_name = self::class;

    /**
     * Set a new notice
     */
    public static function set(NoticeContent $notice_content): void
    {
        $notice_content->verifyMessage();
        $notice_content->verifyType();

        $_SESSION[self::$session_name] = $notice_content;
    }

    /**
     * Get the last notice
     *
     * @return NoticeContent
     */
    public static function get(): NoticeContent
    {
        $notice = ($_SESSION[self::$session_name] ?? null);

        if ($notice) {
            unset($_SESSION[self::$session_name]);

            return $notice;
        }

        return new NoticeContent('', '');
    }
}
