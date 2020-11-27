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

        $this->assertInstanceOf('\Noticeable\NoticeContent', Notice::get());
    }

    /**
     * @test
     */
    public function test_message_cannot_be_empty_on_set()
    {
        $this->expectException(\InvalidArgumentException::class);

        Notice::set(
            new NoticeContent('', 'success')
        );
    }

    /**
     * @test
     */
    public function test_type_cannot_be_empty_on_set()
    {
        $this->expectException(\InvalidArgumentException::class);

        Notice::set(
            new NoticeContent('This is a notice.', '')
        );
    }

    /**
     * @test
     */
    public function test_no_errors_when_notice_doesnt_exist()
    {
        $this->assertInstanceOf('\Noticeable\NoticeContent', Notice::get());
    }
}
