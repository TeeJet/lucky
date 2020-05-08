SELECT name FROM books
JOIN books_categories ON (books.id = books_categories.book_id)
WHERE cover = 'Твердая' AND copies = 5000
GROUP BY books.id
HAVING COUNT(books.id) > 3