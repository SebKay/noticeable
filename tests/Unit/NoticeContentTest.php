<?php

namespace Tests\Unit;

use Noticeable\NoticeContent;

class NoticeContentTest extends Test
{
    /**
     * @test
     */
    public function test_message_is_set_successfully()
    {
        $notice_content = new NoticeContent('This is a notice.', 'success');

        $this->assertSame('This is a notice.', $notice_content->message());
    }

    /**
     * @test
     */
    public function test_type_is_set_successfully()
    {
        $notice_content = new NoticeContent('This is a notice.', 'success');

        $this->assertSame('success', $notice_content->type());
    }

    /**
     * @test
     */
    public function test_empty_message_is_caught()
    {
        $notice_content = new NoticeContent('', 'success');

        $this->expectException(\InvalidArgumentException::class);

        $notice_content->verifyMessage();
    }

    /**
     * @test
     */
    public function test_empty_type_is_caught()
    {
        $notice_content = new NoticeContent('This is a notice.', '');

        $this->expectException(\InvalidArgumentException::class);

        $notice_content->verifyType();
    }

    /**
     * @test
     */
    public function test_invalid_type_is_caught()
    {
        $notice_content = new NoticeContent('This is a notice.', 'successes');

        $this->expectException(\InvalidArgumentException::class);

        $notice_content->verifyType();
    }
}
