# Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.nja.blocked.ips', []);
c::set('plugin.nja.buttons.like', true);
c::set('plugin.nja.buttons.dislike', true);
c::set('plugin.nja.dislikes.key', 'dislikes');
c::set('plugin.nja.likes.key', 'likes');
c::set('plugin.nja.panel.uri', 'panel');
c::set('plugin.tja.records.page.slug', 'nja');
c::set('plugin.tja.records.page.title', '_Nja');
c::set('plugin.nja.snippet', 'nja');
```

## blocked.ips (optional)

If you want to block some ips from being able to vote you can add them as an array.

## buttons (optional)

In some cases you may only want the like or the dislike button. It's possible to override the snippet, but now you can also change it with this option.

### buttons.like

Disable the like button.

### buttons.dislike

Disable the dislike button

## dislikes.key (optional)

The content key for the dislikes counter.

## likes.key (optional)

The content key for the likes counter.

## panel.uri (optional)

If you don't have the panel installed at `/panel` you need to use this option for the `nja` field to work. If you don't use the field it does not matter.

## records.page.slug (optional)

All likes/dislikes will be saved as files in a subfolder to the page to keep track on IP numbers to prevent multiple votes from the same visitor. It's possible to use a custom name for this page.

## records.page.title (optional)

The title for the likes/dislikes records panel page.

## snippet (optional)

Set the name of the built in snippet when calling it. If set to `false` it will not set it at all.