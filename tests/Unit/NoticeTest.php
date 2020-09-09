<?php

namespace Tests\Unit;

use Noticeable\Notice;
use Noticeable\NoticeContent;

class NoticeTest extends Test
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function test_value_object_is_returned()
    {
        Notice::set(
            new NoticeContent('This is a notice.', 'success')
        );

        $this->assertInstanceOf('\Noticeable\NoticeContent', Notice::get());
    }
}
