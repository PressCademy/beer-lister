# Underpin Cron Job Loader

Loader That assists with adding cron jobs menus to a WordPress website.

## Installation

### Using Composer

`composer require underpin/loaders/cron-jobs`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-cron-jobs/cron-jobs.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new cron jobs menus as-needed.

## Example

A very basic example could look something like this.

```php
underpin()->cron_jobs()->add( 'test', [
	'action_callback' => '__return_true',
	'name'            => 'Event Name',
	'frequency'       => 'daily',
	'description'     => 'The description',
] );
```

Alternatively, you can extend `Cron_Job` and reference the extended class directly, like so:

```php
underpin()->cron_jobs()->add('cron-job-key','Namespace\To\Class');
```
