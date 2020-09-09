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
    public function test_message_cannot_be_empty()
    {
        $this->expectException(\Exception::class);

        Notice::set(
            new NoticeContent('', 'success')
        );
    }

    /**
     * @test
     */
    public function test_type_cannot_be_empty()
    {
        $this->expectException(\Exception::class);

        Notice::set(
            new NoticeContent('This is a notice.', '')
        );
    }

    /**
     * @test
     */
    public function test_type_is_checked_against_valid_types()
    {
        $this->expectException(\Exception::class);

        Notice::set(
            new NoticeContent('This is a notice.', 'successes')
        );
    }

    /**
     * @test
     */
    public function test_an_value_object_is_returned()
    {
        Notice::set(
            new NoticeContent('This is a notice.', 'success')
        );

        $this->assertInstanceOf('\Noticeable\NoticeContent', Notice::get());
    }
}
