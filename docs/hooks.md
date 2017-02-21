# Hooks

Maybe you need something to happend when doing an action. That's possible with hooks.

## create

```php
kirby()->hook('nja.create', function($args) {
  echo $args['value'] . ' ' . $args['id'];
});
```

## delete

```php
kirby()->hook('nja.delete', function($id) {
	echo 'Records deleted on page: ' . $id;
});
```

## reset

```php
kirby()->hook('nja.reset', function($id) {
	echo 'Count reset on page: ' . $id;
});
```