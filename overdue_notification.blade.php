<!DOCTYPE html>
<html>
<head>
    <title>Overdue Book Rental Notification</title>
</head>
<body>
    <h1>Overdue Rental Notice</h1>
    <p>Dear {{ $user->name }},</p>
    <p>This is a reminder that the following book rental is overdue:</p>
    <ul>
        <li><strong>Title:</strong> {{ $book->title }}</li>
        <li><strong>Author:</strong> {{ $book->author }}</li>
        <li><strong>Due Date:</strong> {{ $rental->due_date->format('M d, Y') }}</li>
    </ul>
    <p>Please return the book as soon as possible to avoid further penalties.</p>
    <p>Thank you.</p>
</body>
</html>
