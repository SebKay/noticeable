<?php

namespace Tests\Unit;

use Noticeable\Notice;

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

        Notice::set([
            'message' => '',
            'type'    => 'success'
        ]);
    }

    /**
     * @test
     */
    public function test_type_cannot_be_empty()
    {
        $this->expectException(\Exception::class);

        Notice::set([
            'message' => 'This is a notice.',
            'type'    => ''
        ]);
    }

    /**
     * @test
     */
    public function test_type_is_checked_against_valid_types()
    {
        $this->expectException(\Exception::class);

        Notice::set([
            'message' => 'This is a success notice with an incorrect type.',
            'type'    => 'successes'
        ]);
    }

    /**
     * @test
     */
    public function test_an_array_is_returned()
    {
        Notice::set([
            'message' => 'This is a success notice.',
            'type'    => 'success'
        ]);

        $this->assertIsArray(Notice::get());
    }
}
