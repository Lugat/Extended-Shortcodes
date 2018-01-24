# Extended-Shortcodes
Extended shortcodes for Wordpress

This plugins takes advantage of the [Shortcode Parser](https://github.com/Lugat/Shortcode-Parser).

The main advantage of this plugin is the possibility to created nested shortcodes of the same type, which will be parsed correctly by finding the correct closing tag.

See: https://codex.wordpress.org/Shortcode_API#Nested_Shortcodes

### Activation

After you activate the plugin, it will recognize all registered shortcodes. The plugin will remove the ```do_shortcode``` filter for ```the_content``` and place it's own parsing function at the beginning.

### Adding shortcodes

You may use the ```add_shortcode``` function from Wprdpress.

You may also use the internal function:

```php
Shortcode\Shortcode::register($tag, $callback, array $attr = []);
```

In this case you may also pass additional attributes to the shortcode.

### Removing shortcodes

Shortcodes must be removed before the plugin is initialized or by using it's internal function.

```php
Shortcode\Shortcode::unregister($tag);
```

### Parsing shortcodes

As mentioned, the plugin will parse shortcodes automatically after is has been activated.

If you need to parse shortcodes in other places than ```the_content``` you are able to run the parser manually.

```php
Shortcode\Shortcode::process($string, array $allow = []);
```

In this case you may also allow just specified shortcodes. If no shortcodes are specified, all registered shortcodes will be accepted.
