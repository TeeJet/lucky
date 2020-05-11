SELECT DISTINCT least(b1.name, b2.name) book1, greatest(b1.name, b2.name) as book2, COUNT(*) count FROM books_categories bc1
JOIN books_categories bc2 ON (bc1.category_id = bc2.category_id)
JOIN books b1 ON (bc1.book_id = b1.id)
JOIN books b2 ON (bc2.book_id = b2.id)
WHERE bc1.book_id != bc2.book_id
GROUP BY bc1.book_id, bc2.book_id
HAVING COUNT(bc1.category_id) >= 10
