# Laravel Blade Helpers

Adds a new Blade-Directive `@includeOnce`

## Installation

You can install it using Composer:

```bash
composer require hebinet/blade-helpers
```

## Usage

The directive has the same footprint as the native Laravel `@include` directive.

You can use it like this:
```blade
@includeOnce({view to include})
{{-- Or --}}
@includeOnce({view to include}, {data to pass through})
```

## Examples
```blade
{{-- Will include the view 'include-test' once --}}
@includeOnce('include-test')

{{-- Or you can even pass some data to the view --}}
@includeOnce('include-test', ['data'=>4])
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email office@hebinet.at instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.