<?php

namespace Tests\Unit;

use Noticeable\NoticeContent;

class NoticeContentTest extends Test
{
    /**
     * @test
     */
    public function test_type_can_be_checked_against_valid_types()
    {
        $notice_content = new NoticeContent('This is a notice.', 'successes');

        $this->expectException(\InvalidArgumentException::class);

        $notice_content->verifyType();
    }
}
