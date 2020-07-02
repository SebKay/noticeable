![Test PHP](https://github.com/sebkay/noticeable/workflows/Test%20PHP/badge.svg)

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
You can set a notice using the `::set` static method. You need to pass the `message` and the `type`.

They can both be anything you want. `error` and `success` are good standards to follow for `type`.

```php
Noticeable\Notice::set([
    'message' => 'Please enter an email address.',
    'type'    => 'error'
]);
```

### Getting the notice
When you get a notice it will return an array, like so:

```php
$notice = Noticeable/Notice::get();

var_dump($notice);

// Will return
array(2) {
  ["message"]=>
  string(12) "Please enter an email address."
  ["type"]=>
  string(5) "error"
}
```

### Using the notice
Once you have the array you can do whatever you want with it, like load a PHP file with some HTML to format the message.

#### Twig
I'm a big fan of [Twig](https://github.com/twigphp/Twig), so I would do something like this:

```php
echo $twig->render('notice.twig', Noticeable/Notice::get());
```

Then I'll have the corresponding `notice.twig` file laid out like so:

```twig
{% if message %}
    {% if type == 'success' %}
        {% set css_class = 'notice--success' %}
    {% elseif type == 'error' %}
        {% set css_class = 'notice--error' %}
    {% endif %}

    <div class="notice {{ css_class }}">
        <p class="notice__title">
            {{ message | raw }}
        </p>
    </div>
{% endif %}
```
