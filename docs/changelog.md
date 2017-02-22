# Changelog

**0.6**

- Minified field js
- Bug fixes
- Added js option `timeout`

**0.5**
- Option added `plugin.nja.buttons.like`
- Option added `plugin.nja.buttons.dislike`
- Method added `nja::value($page)`
- Method added `nja::isLiked($page)`
- Method added `nja::isDisliked($page)`
- Added hook `nja.create`
- Added hook `nja.delete`
- Added hook `nja.reset`
- Added snippet argument `likeButton`
- Added snippet argument `dislikeButton`
- Changed snippet to reflect the changes.
- Field accordions now works with toggling.

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