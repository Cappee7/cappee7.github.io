<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Games Catalogue</title>
    <link id="stylesheet" rel="stylesheet" href="style0.css">

    <style>
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .footer a:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>

</head>

<body>
    <footer class="footer">
        <div class="footer-content text-center">
            <h4>This website was designed with love by Ashley Davies.</h4>
            <p>
                <a href="#" id="changeStyleBtn" class="small-button">Appearance</a>
                <a href="register.php" class="small-button">Register</a>
                <a href="deleteaccount.php" class="small-button">Delete Account</a>
                <a href="changepassword.php" class="small-button">Change Password</a>
                <a href="logout.php" class="small-button">Logout</a>
            </p>
        </div>
    </footer>

    <script>
        const changeStyleBtn = document.getElementById('changeStyleBtn');
        let isStyle0 = true;

        changeStyleBtn.addEventListener('click', function () {
            const stylesheet = document.getElementById('stylesheet');
            if (isStyle0) {
                stylesheet.href = 'css/style1.css';
            } else {
                stylesheet.href = 'css/style0.css';
            }
            isStyle0 = !isStyle0; // Toggle the style flag
        });
    </script>
</body>

</html>