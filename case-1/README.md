# Mini Producten API (zonder framework)

## Gebruik
Plaats in je webserver root (of start PHP built-in server):

```bash
php -S localhost:8000
```

## Endpoints
- `GET /products` - Alle producten
- `GET /products/{id}` - Product met gegeven ID
- `GET /products/euroknaller` - Het goedkoopste product

## Voorbeeld
Wanneer je de endpoints aanroept in je browser verwachten we het resultaat als JSON te zien.
- `GET /products/2` ⇒ `{ "id": 2, "name": "Monitor", "price": 149.00 }`

## Randvoorwaarden
De API laat enkel producten zien die verkoopbaar zijn. Een product is alleen verkooppaar wanneer deze een prijs heeft.

## Structuur
- `index.php` – Entrypoint
- `products.json` – Data
- Voeg gerust andere bestanden en mappen toe als dat nodig is.
