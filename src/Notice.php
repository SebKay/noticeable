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
        if ($notice_content->message() == '') {
            throw new \InvalidArgumentException('Please provide a notice message.');
        }

        if ($notice_content->type() == '') {
            throw new \InvalidArgumentException('Please provide a notice type.');
        }

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
