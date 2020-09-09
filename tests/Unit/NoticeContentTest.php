<?php

namespace Tests\Unit;

use Noticeable\NoticeContent;

class NoticeContentTest extends Test
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function test_message_cannot_be_empty()
    {
        $this->expectException(\InvalidArgumentException::class);

        new NoticeContent('', 'success');
    }

    /**
     * @test
     */
    public function test_type_cannot_be_empty()
    {
        $this->expectException(\InvalidArgumentException::class);

        new NoticeContent('This is a notice.', '');
    }

    /**
     * @test
     */
    public function test_type_is_checked_against_valid_types()
    {
        $this->expectException(\InvalidArgumentException::class);

        new NoticeContent('This is a notice.', 'successes');
    }
}
