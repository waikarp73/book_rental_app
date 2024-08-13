1. php artisan make:migration create_books_table to execute migration script
2. php artisan make:command ImportBooks
3. Register your command in the app/Console/Kernel.php file
4. import CSV FILE by using this command - php artisan books:import /path/to/yourproject/books.csv
5. php artisan make:command MarkOverdueRentals
6. php artisan make:command SendOverdueNotifications
7. php artisan make:mail OverdueNotification
8. Setup cron job  -->  * * * * * php /pathtoyourproject/artisan schedule:run >> /dev/null 2>&1


Run folloeing apis

1. Search book
ENDPOINT- GET /api/books?title=The Great Gatsby&genre=Classics

2. REnt a book
ENDPOINT-  POST /api/rentals
REQUEST BODY - 
{
    "user_id": 1,
    "book_id": 1
}

3.Return a Book
PUT /api/rentals/{rental_id}/return





-----Thank you for reading======