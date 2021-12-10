<?php

use Noticeable\Notice;
use Noticeable\NoticeContent;

test('Message is set successfully', function () {
    $notice_content = new NoticeContent('This is a notice.', 'success');

    expect($notice_content->message())->toBe('This is a notice.');
});

test('Type is set successfully', function () {
    $notice_content = new NoticeContent('This is a notice.', 'success');

    expect($notice_content->type())->toBe('success');
});

test('An empty message cannot be set', function () {
    Notice::set(new NoticeContent('', 'success'));
})->throws(\InvalidArgumentException::class);

test('An empty type cannot be set', function () {
    Notice::set(new NoticeContent('This is a notice.', ''));
})->throws(\InvalidArgumentException::class);

test('An invalid type cannot be used', function () {
    Notice::set(new NoticeContent('This is a notice.', 'testy'));
})->throws(\InvalidArgumentException::class);
