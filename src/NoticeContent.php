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
    protected $allowed_types = ['info', 'success', 'error'];

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
    }

    /**
     * Verify the type is valid
     *
     * @return void
     */
    public function verifyType(): void
    {
        if (!in_array($this->type, $this->allowed_types)) {
            $types_as_string = implode(', ', $this->allowed_types);

            throw new \InvalidArgumentException(
                "'$this->type' is not a valid type. Please use either $types_as_string."
            );
        }
    }

    /**
     * Check if content is blank
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return ($this->message() == '' && $this->type() == '' ? true : false);
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
