<?php

namespace Tests\Unit;

use Noticeable\Notice;
use Noticeable\NoticeContent;

class NoticeTest extends Test
{
    /**
     * @test
     */
    public function test_value_object_is_returned()
    {
        Notice::set(
            new NoticeContent('This is a notice.', 'success')
        );

        $this->assertInstanceOf(NoticeContent::class, Notice::get());
    }

    /**
     * @test
     */
    public function test_no_errors_when_notice_isnt_set()
    {
        $this->assertInstanceOf(NoticeContent::class, Notice::get());
    }

    /**
     * @test
     */
    public function test_notice_is_cleared_after_initial_get()
    {
        Notice::set(
            new NoticeContent('This is a notice.', 'success')
        );

        $notice_1 = Notice::get();

        // Content was successfully retrieved on first get
        $this->assertFalse($notice_1->isEmpty());

        $notice_2 = Notice::get();

        // Content was successfully removed on first get
        $this->assertTrue($notice_2->isEmpty());
    }
}
