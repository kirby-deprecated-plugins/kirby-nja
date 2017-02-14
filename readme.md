# Kirby Nja

*Version 0.1 - Minefield*

Likes and dislikes without an external service.

![Screenshot](docs/screenshot1.gif)

*The name "Nja" is Swedish and means "Maybe".*

## Installation

Use one of the alternatives below.

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following commands in your shell:

```
$ cd path/to/kirby
$ kirby plugin:install username/plugin-name
```

### 2. Clone or download

1. [Clone](https://github.com/username/plugin-name.git) or [download](https://github.com/username/plugin-name/archive/master.zip)  this repository.
2. Unzip the archive if needed and rename the folder to `plugin-name`.

**Make sure that the plugin folder structure looks like this:**

```
site/plugins/plugin-name/
```

### 3. Git Submodule

If you know your way around Git, you can download this plugin as a submodule:

```
$ cd path/to/kirby
$ git submodule add https://github.com/username/plugin-name site/plugins/plugin-name
```

## Setup

### Css

If you don't have an own css file, add the following code to your `header.php` snippet:

```php
echo css('assets/plugins/kirby-nja/css/style.min.css');
```

### Javascript

Add the following code to your `footer.php` snippet:

```php
<?php echo js('assets/plugins/kirby-nja/js/dist/script.min.js'); ?>
<script>
nja.init();
</script>
```

### Snippet

Use the built in snippet or build you own. The built in snippet can be disabled by an option.

```php
snippet('nja');
snippet('nja', ['page' => $page_object]);
```

## Usage

Text, images and videos are good things to describe how to use this plugin.

### Blueprint (optional)

If you want to see the votes in the panel you can add this to your blueprint:

```text
fields:
  likes: likes
  dislikes: dislikes
```

If you don't want to use the built in global field definitions you can use the alternative:

```
fields:
  likes:
    title: Likes
    type: text
    width: 1/2
  dislikes:
    title: Dislikes
    type: text
    width: 1/2
```

## Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.nja.blocked.ips', []);
c::set('plugin.nja.definitions', true);
c::get('plugin.nja.methods', true);
c::get('plugin.nja.snippet', 'nja');
c::get('plugin.nja.panel.page', 'nja');
```

### blocked.ips (optional)

If you want to block some ips from being able to vote you can add them as an array.

### definitions (optional)

Activate the plugin field definitions. Read more about it in Usage/Blueprint.

### methods (optional)

Enable or disable the plugin page methods.

### snippet (optional)

Set the name of the built in snippet when calling it. If set to false it will not set it at all.

### panel.page (optional)

All likes/dislikes will be saved as files in a subfolder to the page to keep track on IP numbers to prevent multiple votes from the same visitor. It's possible to use a custom name for this page.

## Changelog

**0.1**

- Initial release 

## Requirements

- [**Kirby**](https://getkirby.com/) 2.4.1+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/username/plugin-name/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)