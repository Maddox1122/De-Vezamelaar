<?php
include('../Requires/config.php');
$id = $_GET['id'];

$sql = "SELECT * FROM verzameling  WHERE `ID` = $id";

$query = $con->query($sql);

$result = $query->fetch_assoc();

$img = $result['image'];
$naam = $result['naam'];
$beschrijving = $result['beschrijving'];
$eigenschappen = $result['eigenschappen'];
$prijs = $result['prijs'];

if (isset($_POST['submit'])) {
    $naaminv = $_POST['naam'];
    $telefoonnummer = $_POST['telefoon'];
    $email = $_POST['mail'];
    $adres = $_POST['adres'];


    $stmt = $con->prepare("INSERT INTO orders (product_id, name, email, phone_number, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $id, $naaminv, $email, $telefoonnummer, $adres);
    if ($stmt->execute()) {
        header("Location: ../index.php?message=gelukt");
    } else {
        header("Location: ../index.php?message=gefaald");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bestel</title>
    <link rel="stylesheet" href="../Css/Nav.css">
    <link rel="stylesheet" href="../Css/bestel.css" />
    <script src="https://kit.fontawesome.com/15e3ed1574.js" crossorigin="anonymous" defer></script>
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
    <main>
        <section class='product-section'>
            <?php
            if ($query->num_rows <= 0) {
                echo "Geen Product Geselcteerd";
            }
            ?>
            <div>
                <div class='img-container'>
                    <img src='<?= $img ?>'>
                </div>
            </div>
            <div class='text-container'>
                <div class='title'>
                    <h1><?= $naam ?></h1>
                </div>
                <div class='eigenschappen'>
                    <h4><?= $eigenschappen ?></h4>
                </div>
                <div class='beschrijving'>
                    <p><?= $beschrijving ?></p>
                </div>
                <div class='prijs'>
                    <p><?= $prijs ?></p>
                </div>
            </div>
            <div class='form-container'>
                * Required
                <form action="" method="post">
                    <label for="Naam" required class="form-label">Volledige Naam*</label>
                    <input type="text" class="form-input" name='naam' placeholder="....">
                    <label for="TelefoonNummer" required class="form-label">TelefoonNummer*</label>
                    <input type="number" class="form-input" name='telefoon' placeholder="...." maxlength="13">
                    <label for="Email" class="form-label">Email*</label>
                    <input type="text" required class="form-input" name='mail' placeholder="....">
                    <label for="Adres" required class="form-label">Adres*</label>
                    <input type="text" class="form-input" name='adres' placeholder="....">
                    <button class="form-button" type='submit' name='submit'>Bestel</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <svg id="wave" style="transform: rotate(0deg); transition: 0.3s" viewBox="0 0 1440 300" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(246, 76, 114, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(85, 61, 103, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform: translate(0, 0px); opacity: 1" fill="url(#sw-gradient-0)" d="M0,150L26.7,160C53.3,170,107,190,160,170C213.3,150,267,90,320,80C373.3,70,427,110,480,105C533.3,100,587,50,640,50C693.3,50,747,100,800,120C853.3,140,907,130,960,125C1013.3,120,1067,120,1120,125C1173.3,130,1227,140,1280,160C1333.3,180,1387,210,1440,190C1493.3,170,1547,100,1600,100C1653.3,100,1707,170,1760,175C1813.3,180,1867,120,1920,100C1973.3,80,2027,100,2080,130C2133.3,160,2187,200,2240,200C2293.3,200,2347,160,2400,145C2453.3,130,2507,140,2560,145C2613.3,150,2667,150,2720,135C2773.3,120,2827,90,2880,65C2933.3,40,2987,20,3040,55C3093.3,90,3147,180,3200,185C3253.3,190,3307,110,3360,75C3413.3,40,3467,50,3520,60C3573.3,70,3627,80,3680,75C3733.3,70,3787,50,3813,40L3840,30L3840,300L3813.3,300C3786.7,300,3733,300,3680,300C3626.7,300,3573,300,3520,300C3466.7,300,3413,300,3360,300C3306.7,300,3253,300,3200,300C3146.7,300,3093,300,3040,300C2986.7,300,2933,300,2880,300C2826.7,300,2773,300,2720,300C2666.7,300,2613,300,2560,300C2506.7,300,2453,300,2400,300C2346.7,300,2293,300,2240,300C2186.7,300,2133,300,2080,300C2026.7,300,1973,300,1920,300C1866.7,300,1813,300,1760,300C1706.7,300,1653,300,1600,300C1546.7,300,1493,300,1440,300C1386.7,300,1333,300,1280,300C1226.7,300,1173,300,1120,300C1066.7,300,1013,300,960,300C906.7,300,853,300,800,300C746.7,300,693,300,640,300C586.7,300,533,300,480,300C426.7,300,373,300,320,300C266.7,300,213,300,160,300C106.7,300,53,300,27,300L0,300Z"></path>
            <defs>
                <linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(85, 61, 103, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(246, 76, 114, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform: translate(0, 50px); opacity: 0.9" fill="url(#sw-gradient-1)" d="M0,90L26.7,95C53.3,100,107,110,160,110C213.3,110,267,100,320,125C373.3,150,427,210,480,210C533.3,210,587,150,640,110C693.3,70,747,50,800,60C853.3,70,907,110,960,150C1013.3,190,1067,230,1120,230C1173.3,230,1227,190,1280,190C1333.3,190,1387,230,1440,235C1493.3,240,1547,210,1600,195C1653.3,180,1707,180,1760,155C1813.3,130,1867,80,1920,75C1973.3,70,2027,110,2080,150C2133.3,190,2187,230,2240,220C2293.3,210,2347,150,2400,130C2453.3,110,2507,130,2560,160C2613.3,190,2667,230,2720,230C2773.3,230,2827,190,2880,160C2933.3,130,2987,110,3040,105C3093.3,100,3147,110,3200,110C3253.3,110,3307,100,3360,85C3413.3,70,3467,50,3520,50C3573.3,50,3627,70,3680,100C3733.3,130,3787,170,3813,190L3840,210L3840,300L3813.3,300C3786.7,300,3733,300,3680,300C3626.7,300,3573,300,3520,300C3466.7,300,3413,300,3360,300C3306.7,300,3253,300,3200,300C3146.7,300,3093,300,3040,300C2986.7,300,2933,300,2880,300C2826.7,300,2773,300,2720,300C2666.7,300,2613,300,2560,300C2506.7,300,2453,300,2400,300C2346.7,300,2293,300,2240,300C2186.7,300,2133,300,2080,300C2026.7,300,1973,300,1920,300C1866.7,300,1813,300,1760,300C1706.7,300,1653,300,1600,300C1546.7,300,1493,300,1440,300C1386.7,300,1333,300,1280,300C1226.7,300,1173,300,1120,300C1066.7,300,1013,300,960,300C906.7,300,853,300,800,300C746.7,300,693,300,640,300C586.7,300,533,300,480,300C426.7,300,373,300,320,300C266.7,300,213,300,160,300C106.7,300,53,300,27,300L0,300Z"></path>
            <defs>
                <linearGradient id="sw-gradient-2" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(246, 76, 114, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(85, 61, 103, 1)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform: translate(0, 100px); opacity: 0.8" fill="url(#sw-gradient-2)" d="M0,150L26.7,140C53.3,130,107,110,160,85C213.3,60,267,30,320,50C373.3,70,427,140,480,145C533.3,150,587,90,640,60C693.3,30,747,30,800,60C853.3,90,907,150,960,180C1013.3,210,1067,210,1120,175C1173.3,140,1227,70,1280,65C1333.3,60,1387,120,1440,130C1493.3,140,1547,100,1600,105C1653.3,110,1707,160,1760,150C1813.3,140,1867,70,1920,45C1973.3,20,2027,40,2080,80C2133.3,120,2187,180,2240,170C2293.3,160,2347,80,2400,50C2453.3,20,2507,40,2560,80C2613.3,120,2667,180,2720,195C2773.3,210,2827,180,2880,170C2933.3,160,2987,170,3040,165C3093.3,160,3147,140,3200,130C3253.3,120,3307,120,3360,125C3413.3,130,3467,140,3520,160C3573.3,180,3627,210,3680,200C3733.3,190,3787,140,3813,115L3840,90L3840,300L3813.3,300C3786.7,300,3733,300,3680,300C3626.7,300,3573,300,3520,300C3466.7,300,3413,300,3360,300C3306.7,300,3253,300,3200,300C3146.7,300,3093,300,3040,300C2986.7,300,2933,300,2880,300C2826.7,300,2773,300,2720,300C2666.7,300,2613,300,2560,300C2506.7,300,2453,300,2400,300C2346.7,300,2293,300,2240,300C2186.7,300,2133,300,2080,300C2026.7,300,1973,300,1920,300C1866.7,300,1813,300,1760,300C1706.7,300,1653,300,1600,300C1546.7,300,1493,300,1440,300C1386.7,300,1333,300,1280,300C1226.7,300,1173,300,1120,300C1066.7,300,1013,300,960,300C906.7,300,853,300,800,300C746.7,300,693,300,640,300C586.7,300,533,300,480,300C426.7,300,373,300,320,300C266.7,300,213,300,160,300C106.7,300,53,300,27,300L0,300Z"></path>
        </svg>
    </footer>
</body>

</html>