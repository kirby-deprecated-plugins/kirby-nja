# Kirby Nja

*Version 0.4 - Beta*

**Like or dislike a page for Kirby CMS.**

![Screenshot](docs/screenshot3.gif)

- All data is stored on your domain, not an external service.
- Spam protection using IP numbers.
- Undo likes/dislikes possible.
- Vanilla js, no jQuery requred.
- It uses an [optimistic UI approach](https://www.smashingmagazine.com/2016/11/true-lies-of-optimistic-user-interfaces/).

*The name "Nja" is Swedish and means "Maybe".*

## Table of contents

- [Installation](#installation)
- [Setup](#setup)
- [Usage](#usage)
- [Options](#options)
- [Changelog](#changelog)
- [Requirements](#requirements)
- [Disclamer](#disclaimer)
- [License](#license)
- [Credits](#credits)

## Installation

Use one of the alternatives below.

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following commands in your shell:

```
$ cd path/to/kirby
$ kirby plugin:install jenstornell/kirby-nja
```

### 2. Clone or download

1. [Clone](https://github.com/jenstornell/kirby-nja.git) or [download](https://github.com/jenstornell/kirby-nja/archive/master.zip)  this repository.
2. Unzip the archive if needed and rename the folder to `kirby-nja`.

**Make sure that the plugin folder structure looks like this:**

```
site/plugins/kirby-nja/
```

### 3. Git Submodule

If you know your way around Git, you can download this plugin as a submodule:

```
$ cd path/to/kirby
$ git submodule add https://github.com/jenstornell/kirby-nja site/plugins/kirby-nja
```

## Setup

### Css

If you don't have an own css file, add the following code to your `header.php` snippet:

```php
echo css('assets/plugins/kirby-nja/css/style.min.css');
```

**The `nja-loading` class**

By default the class `nja-loading` is not used, but if you want a loading indicator of some kind you can use this class.

### Javascript

Add the following code to your `footer.php` snippet:

```php
<?php echo js('assets/plugins/kirby-nja/js/dist/script.min.js'); ?>
<script>
nja.init({root: '<?php echo u(); ?>'});
</script>
```

**Callback (optional)**

If you need to do something when the like/dislike is saved you can use a callback:

```js
nja.init({
  root: '<?php echo u(); ?>',
  ajaxCallback: function(item, group, args) {
    console.log(args);
  }
});
```

- `group` is the button group object.
- `item` is the clicked button object.
- `args` is an array with data. Use the `console.log` to see what it contains.

### Snippet

Use the built in snippet or build you own. The built in snippet can be disabled by an option, or overwritten by your own with the same name.

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
  nja:
    title: Likes/dislikes
    type: nja
```

## Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.nja.blocked.ips', []);
c::get('plugin.nja.dislikes.key', 'dislikes');
c::get('plugin.nja.likes.key', 'likes');
c::get('plugin.nja.panel.uri', 'panel');
c::get('plugin.tja.records.page.slug', 'nja');
c::get('plugin.tja.records.page.title', '_Nja');
c::get('plugin.nja.snippet', 'nja');
```

### blocked.ips (optional)

If you want to block some ips from being able to vote you can add them as an array.

### dislikes.key (optional)

The content key for the dislikes counter.

### likes.key (optional)

The content key for the likes counter.

### panel.uri (optional)

If you don't have the panel installed at `/panel` you need to use this option for the `nja` field to work. If you don't use the field it does not matter.

### records.page.slug (optional)

All likes/dislikes will be saved as files in a subfolder to the page to keep track on IP numbers to prevent multiple votes from the same visitor. It's possible to use a custom name for this page.

### records.page.title (optional)

The title for the likes/dislikes records panel page.

### snippet (optional)

Set the name of the built in snippet when calling it. If set to `false` it will not set it at all.

## Changelog

**0.4**

- Added a new field called `nja`. It contains counters, delete records button and reset counter button.
- Removed blueprint field definition because of the new field.
- Removed option `plugin.nja.definitions`
- New option `plugin.nja.likes.key`
- New option `plugin.nja.dislikes.key`
- New option `plugin.nja.panel.uri`
- New option `plugin.nja.records.page.slug`
- New option `plugin.nja.records.page.title`
- Fixed javascript bug with like/dislike a subpage. It requires the script to be updated.
- Fixes minor issues.
- Multi language support

**0.3**

- More css px values change to em.
- Removed forces Arial font. It should now inherit the font instead.
- Callback updated and documented.

**0.2**

- Used classes instead of data attributes in some cases.
- Improved sass/css.
- SVG Images as css data uri to prevent blink effect.
- Red and blue picked from Twitter Bootstrap.
- Moved to css em instead of px in many cases.
- Refactored javascript file.

**0.1**

- Initial release 

## Requirements

- [**Kirby**](https://getkirby.com/) 2.4.1+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/jenstornell/kirby-nja/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)
- [Daniel Bruce - Entypo thumb icons](http://www.entypo.com)