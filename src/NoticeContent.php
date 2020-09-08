<?php

namespace Noticeable;

class NoticeContent
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected static $allowed_types = ['success', 'error'];

    /**
     * Set up
     *
     * @param string $message
     * @param string $type
     */
    public function __construct(string $message, string $type)
    {
        $this->message = $message;
        $this->type    = $type;

        if ($message == '') {
            throw new \InvalidArgumentException('Please provide a notice message.');
        }

        if ($type == '') {
            throw new \InvalidArgumentException('Please provide a notice type.');
        }

        if (!in_array($type, $this->allowed_types)) {
            throw new \InvalidArgumentException("'$type' is not a valid type. Please use either 'success' or 'error'.");
        }
    }

    /**
     * Get the message
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Get the type
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }
}
