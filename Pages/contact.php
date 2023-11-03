<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="../Css/Home.css" />
    <link rel="stylesheet" href="../Css/Nav.css" />
    <link rel="stylesheet" href="../Css/footer.css" />
    <link rel="stylesheet" href="../Css/contact.css">
    <script src="https://kit.fontawesome.com/15e3ed1574.js" crossorigin="anonymous" defer></script>
    <script src="./Js/SlideShow.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <li><a href="../index.php">Home</a></li>
            <li><a href="./verzmeling.php">Verzameling</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./admin.php">Admin</a></li>
        </nav>
    </header>

    <main class="main">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="../PHP/send-contact.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="mail" required autocomplete="off">
                <br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <br>
                <button type="submit" name='send-contact'>Submit</button>
            </form>
        </div>
    </main>

    <div class="my-5 footer-container">
        <footer class="text-center text-white">
            <div class="container">
                <section class="text-center mb-5 socials">
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-github"></i>
                    </a>
                </section>
            </div>
            <div class="text-center p-3">© 2023 Copyright: De Verzamelaars</div>
        </footer>
    </div>
</body>

</html>