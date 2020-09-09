![Validate PHP](https://github.com/SebKay/noticeable/workflows/Validate%20PHP/badge.svg)

# Noticeable
Easily output a simple flash message/notice to the page, but only once.

## How to install
It's recommended you install this package via [Composer](https://getcomposer.org/).

```bash
composer require sebkay/noticeable
```

The notice is session based and will be removed on the next page refresh.

First you'll need to start a session. Put this at the very start of your project files (so it's the first thing that loads):

```php
session_start();
```

Then include the Composer autoloader so you have access to the package.

```php
require __DIR__ . '/vendor/autoload.php';
```

## How to use
### Setting the notice
You can set a notice using the `::set` static method. All you need to pass is `Noticeable\NoticeContent` object which accepts the `message` and the `type`.

The type must be either `info`, `success` or `error`. Anything else with throw an `InvalidArgumentException` exception.

```php
use Noticeable\Notice;
use Noticeable\NoticeContent;

Notice::set(
    new NoticeContent('Please enter an email address.', 'error')
);
```

### Getting the notice
When you get a notice it will return a `Noticeable\NoticeContent` object, like so:

```php
$notice = Notice::get();

print_r($notice);

// Will return
Noticeable\NoticeContent Object
(
    [message:protected] => This is a success notice.
    [type:protected] => success
    [allowed_types:protected] => Array
        (
            [0] => info
            [1] => success
            [2] => error
        )

)

```

### Available Methods

```php
$notice->message(); // (string) This is a success notice.

$notice->type(); // (string) error

```

### Using the notice
Once you have the notice you can do whatever you want with it, like load a PHP file with some HTML to format the message.

#### Twig
I'm a big fan of [Twig](https://github.com/twigphp/Twig), so I would do something like this:

```php
echo $twig->render('notice.twig', Notice::get());
```

Then I'll have the corresponding `notice.twig` file laid out like so:

```twig
{% if message %}
    {% switch type %}
        {% case 'info' %}
            {% set css_class = 'notice--info' %}
        {% case 'success' %}
            {% set css_class = 'notice--success' %}
        {% case 'error' %}
            {% set css_class = 'notice--error' %}
    {% endswitch %}

    <div class="notice {{ css_class }}">
        <p class="notice__title">
            {{ message | raw }}
        </p>
    </div>
{% endif %}
```
