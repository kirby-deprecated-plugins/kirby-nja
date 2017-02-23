# Options

**All of the options are optional**

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.nja.blocked.ips', []);
c::set('plugin.nja.buttons.like', true);
c::set('plugin.nja.buttons.dislike', true);
c::set('plugin.nja.cleanup, false);
c::set('plugin.nja.dislikes.key', 'dislikes');
c::set('plugin.nja.likes.key', 'likes');
c::set('plugin.nja.panel.uri', 'panel');
c::set('plugin.tja.records.page.slug', 'nja');
c::set('plugin.tja.records.page.title', '_Nja');
c::set('plugin.nja.snippet', 'nja');
c::set('plugin.nja.timeout', 4);
```

### `plugin.nja.blocked.ips`

If you want to block some ips from being able to vote you can add them as an array.

### `plugin.nja.buttons`

In some cases you may only want the like or the dislike button. It's possible to override the snippet, but now you can also change it with this option.

### `plugin.nja.buttons.like`

Disable the like button.

### `plugin.nja.buttons.dislike`

Disable the dislike button

### `plugin.nja.cleanup`

You can set a day interval when records will be deleted. It will not reset the counters, just the records. For weekly interval, set it to `7`. It's disabled by default.

### `plugin.nja.dislikes.key`

The content key for the dislikes counter.

### `plugin.nja.likes.key`

The content key for the likes counter.

### `plugin.nja.panel.uri`

If you don't have the panel installed at `/panel` you need to use this option for the `nja` field to work. If you don't use the field it does not matter.

### `plugin.nja.records.page.slug`

All likes/dislikes will be saved as files in a subfolder to the page to keep track on IP numbers to prevent multiple votes from the same visitor. It's possible to use a custom name for this page.

### `plugin.nja.records.page.title`

The title for the likes/dislikes records panel page.

### `plugin.nja.snippet`

Set the name of the built in snippet when calling it. If set to `false` it will not set it at all.

### `plugin.nja.timeout`

The default timeout is 4 seconds. If the like/dislike did not get saved by that time it will jump back to the previout value.

If you want to change this value you need to change this option, but also the javascript option to the same value. See [setup](docs/setup.md).