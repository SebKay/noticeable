<?php

use Noticeable\Notice;
use Noticeable\NoticeContent;

test('Correct value object is returned', function () {
    Notice::set(
        new NoticeContent('This is a notice.', 'success')
    );

    expect(Notice::get())->toBeInstanceOf(NoticeContent::class);
});

test("There are no errors when a notice hasn't been set", function () {
    expect(Notice::get())->toBeInstanceOf(NoticeContent::class);
});

test("Notice is cleared after it's been retrieved", function () {
    Notice::set(
        new NoticeContent('This is a notice.', 'success')
    );

    $notice_1 = Notice::get();

    // Content was successfully retrieved on first get
    expect($notice_1->isEmpty())->toBeFalse();

    $notice_2 = Notice::get();

    // Content was successfully removed on first get
    expect($notice_2->isEmpty())->toBeTrue();
});
