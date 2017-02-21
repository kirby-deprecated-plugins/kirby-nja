# Methods

```php
echo $page->njaValue();

if($page->njaVisitorDislike()) {
  echo 'Visitor dislike this page';
}
```

### `value`

Like returns `1`, dislike returns `-1` and no value returns `0`.

```php
echo nja::value($page);
```

### `isLike`

If the current visitor like this page it returns `true`:

```php
if(nja::isLike($page)) {
  echo 'Visitor like this page';
}
```

### `isDislike`

If the current visitor dislike this page, it returns `true`:

```php
if(nja::isDislike($page)) {
  echo 'Visitor dislike this page';
}
```

## Page methods

No page methods are built in, but you can build them very easily.

**Example**

```php
page::$methods['isLike'] = function($page) {
	return nja::isLike($page);
};
```

**Use it like this**

```php
echo $page->isLike();
```

## Non page methods

This is not a page methods, but a content values:

```php
echo $page->likes();
echo $page->dislikes();
```

If you con't change the config, you will get the like/dislike counters this way.