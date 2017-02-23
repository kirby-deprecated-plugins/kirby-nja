# Uninstall

When using this plugin data will be saved to each page to prevent vote spam.

You can delete these manually with a [field](https://github.com/jenstornell/kirby-nja/blob/master/docs/setup.md#blueprint-optional) and also use a cleanup interval. It's also possible to completely uninstall all the data.

This feature will not delete the plugin itself.

***WARNING!!! This is a really agressive feature and it can't be undone!***

1. First you need to login to the panel.
2. Then, go to this page:

```text
https://example.com/nja/uninstall/[your-username]
```

Replace `[your-username]` with your panel username. It's there just to make you more careful.

## Details

It will use this option to figure out the page id and will delete all pages that matches this slug:

```php
c::set('plugin.tja.records.page.slug', 'nja');
```