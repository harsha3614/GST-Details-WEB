


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4; /* Background color similar to dashboard */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #fff; /* Card background color */
            border-radius: 10px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            max-width: 400px;
            width: 100%;
        }

        .login-card:hover {
            transform: scale(1.05);
        }

        .login-card i {
            font-size: 50px;
            color: #00818A; /* Icon color similar to dashboard */
        }

        .login-card h3 {
            margin-top: 10px;
            color: #333;
        }

        .login-card form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .login-card label {
            text-align: left;
            margin-bottom: 5px;
            color: #666;
        }

        .login-card input {
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-card button {
            background-color: #005C97; /* Button color similar to dashboard */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-card button:hover {
            background-color: #004669; /* Button hover color similar to dashboard */
        }

        .login-card p {
            margin-top: 15px;
            color: #666;
        }

        .login-card a {
            color: #00818A; /* Link color similar to dashboard */
            text-decoration: none;
        }

        .login-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <i class="fas fa-user-tie"></i>
        <h3 style="color: #005C97;">Auditor Login</h3>
    
        <form action="loginbk.php" method="POST" class="log-forms forms">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Forgot your password? <a href="#" style="color: #00818A;">Reset here</a></p>
    </div>
</body>
</html>
