# Assignment: Mini Products API (CakePHP 5 framework)

[![PHPStan](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 5.x.

The cookbook containing all the information that you need can be found here: [CakePHP Cookbook](https://book.cakephp.org/5/en/intro.html)

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `composer install`.

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Configuration

Copy `config/app_local.example.php` to `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Endpoints
- `GET /products` - All products
- `GET /products/{id}` - Product with given ID
- `GET /products/euroknaller` - The cheapest product

## Example
When calling the endpoints in your browser, we expect to see the result as JSON.
- `GET /products/2` ⇒ `{ "id": 2, "name": "Monitor", "price": 149.00 }`

## Requirements
The API only shows products that are saleable. A product is only saleable when it has a price.

## Structure
- `webroot/index.php` – Application entrypoint
- `resources/products.json` – Example data
- `src/Controller/ProductsController.php` – You'll probably want to create a controller to handle the requests. 
- Feel free to add other files and folders if needed, but keep it in the style of the CakePHP framework.
