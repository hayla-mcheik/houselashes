<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $emailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $emailData['phone'] }}</p>
    <p><strong>Subject:</strong> {{ $emailData['subject'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $emailData['message'] }}</p>
</body>
</html>
