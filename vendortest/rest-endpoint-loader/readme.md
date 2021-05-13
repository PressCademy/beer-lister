# Underpin Rest Endpoint Loader

Loader That assists with registering REST endpoints to a WordPress website.

## Installation

### Using Composer

`composer require underpin/rest-endpoint-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-rest-endpoints/rest-endpoints.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new rest endpoints as-needed.

## Example

A very basic example could look something like this.

```php
// Register rest endpoint
underpin()->rest_endpoints()->add( 'example-endpoint', [
	'endpoint_callback'       => function ( \WP_REST_Request $request ) {
		return [ 'result' => 'Wow this worked nicely!' ];
	},
	'has_permission_callback' => '__return_true',
	'rest_namespace'          => 'example/v1',
	'route'                   => 'example-endpoint',
	'args'                    => [ 'methods' => 'GET' ],
] );
```

Alternatively, you can extend `Rest_Endpoint` and reference the extended class directly, like so:

```php
underpin()->rest_endpoints()->add('endpoint-key','Namespace\To\Class');
```

A common use-case is to extend `Rest_Endpoint` with your own `rest_namespace` to keep code DRY.