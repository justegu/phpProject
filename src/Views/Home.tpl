<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            text-decoration: none;
            color: #fff;
            margin-right: 10px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .header a:hover {
            background-color: #555;
        }

        h1 {
            color: #fff;
            font-size: 2em;
            margin: 30px 0 ;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }
        .main-content img {
            width: 100%;
            height: 93vh;
        }
    </style>
</head>
<body>
<div class="header">
    <a href="/Paskaitos/todo_app/list">List</a>
    <h1>Home Page</h1>
    <a href="/Paskaitos/todo_app/create">Create new</a>
</div>
<div class="main-content">
    <img src="https://ddlqvo8fho737.cloudfront.net/images/516edfecd8b860a110f1222c3f1a6c44.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA3TJ3V4Z4TLCHRDFE%2F20240113%2Fap-southeast-1%2Fs3%2Faws4_request&X-Amz-Date=20240113T074627Z&X-Amz-Expires=900&X-Amz-SignedHeaders=host&X-Amz-Signature=5f3caa8f0c11f2d57ac261ede91b9ebfba518cf0180290968dce09005e757cc0" alt="Nuotrauka">
</div>
</body>
</html>
