# Silverstripe link icon

Adds an option to upload an icon to [gorriecoe/silverstripe-link](https://github.com/gorriecoe/silverstripe-link)

## Installation

Composer is the recommended way of installing SilverStripe modules.

```
composer require gorriecoe/silverstripe-linkicon
```

## Requirements

- [gorriecoe/silverstripe link](https://github.com/gorriecoe/silverstripe-link) ^1.2.3

## Maintainers

- [Gorrie Coe](https://github.com/gorriecoe)

## Template

Add `$Icon` to your `Link.ss` file.
```
<% if LinkURL %>
    <a{$IDAttr}{$ClassAttr} href="{$LinkURL}"{$TargetAttr}>
        {$Icon}{$Title}
    </a>
<% end_if %>
```

## Options

Define folder to store the icons assets into.

```yml
gorriecoe\Link\Models\Link:
  icon_asset_folder: 'SomeFolderName' // Defaults to 'Icons'
```

Defines tab to insert the icon_folder fields into.

```yml
gorriecoe\Link\Models\Link:
  icon_tab: 'SomeTabName' // Defaults to 'Main'
```
