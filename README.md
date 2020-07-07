### Simple and error prone example of mercure

Before running remember to change in your `.env` file the broadcasting driver to: `mercure`:
```
BROADCAST_DRIVER=mercure
```

To start simply run:

```bash
## Compile JS
npm run dev
## Start Docker image of mercure hub
make
## Serve site
php artisan serve
```