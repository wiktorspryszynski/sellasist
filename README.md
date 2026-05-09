# Zadanie rekrutacyjne dla Sellasist

Aplikacja Laravel działająca jako proxy do publicznego [Petstore API](https://petstore.swagger.io/v2).
Nie korzysta z bazy danych – wszystkie dane pobierane są na żywo z zewnętrznego API.

---

## Uruchomienie lokalne

```bash
composer install
cp .env.example .env        # .env.example zawiera gotowe wartości PETSTORE_BASE_URL i PETSTORE_TIMEOUT
php artisan key:generate
php artisan serve
```

Aplikacja dostępna pod `http://localhost:8000`.

---

## Co dodałbym dalej

- **Upload zdjęcia** – brakujący endpoint `POST /pet/{id}/uploadFile`, pominięty
- **Paginacja** – `findByStatus` może zwrócić setki/tysiące rekordów, może źle wpływać na czas renderowania
- **Cache Redis** – odpowiedzi API cache'owane przez kilkadziesiąt sekund, Petstore bywa niestabilne
