<?php
include('../Requires/config.php');

$selectall = $con->prepare("SELECT * FROM verzameling");
$selectall->execute();

$result = $selectall->get_result();

$selectupdate = $con->prepare("SELECT * FROM verzameling");
$selectupdate->execute();

$result2 = $selectupdate->get_result();

if (isset($_POST['add-game'])) {
    $name = $_POST['name'];
    $beschrijving = $_POST['beschrijving'];
    $Category = $_POST['Category'];
    $link = $_POST['link'];
    $prijs = $_POST['prijs'];

    $insertNewGame = $con->prepare('INSERT INTO verzameling (naam, image, beschrijving, prijs, eigenschappen) VALUES (?,?,?,?,?)');
    $insertNewGame->bind_param('sssss', $name, $link, $beschrijving, $prijs, $Category);
    $insertNewGame->execute();
}

if (isset($_POST['Delete'])) {
    $ID = $_POST['delete'];

    $delete = $con->prepare('DELETE FROM verzameling WHERE ID = ?');
    $delete->bind_param('s', $ID);
    $delete->execute();
}

if (isset($_POST['Update'])) {
    $updateid = $_POST["update"];
    $newNaam = $_POST["naam"];
    $newBeschrijving = $_POST["beschrijving"];
    $newcategory = $_POST["category"];
    $newLink = $_POST["link"];
    $newPrijs = $_POST['prijs'];

    $sql = "UPDATE verzameling SET naam = ?, image = ?, beschrijving = ?, prijs = ?, eigenschappen = ? WHERE ID = ?";

    $updateGame = $con->prepare($sql);
    $updateGame->bind_param('sssssi', $newNaam, $newLink, $newBeschrijving,  $newPrijs, $newcategory, $updateid);
    $updateGame->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="../Css/Nav.css">
    <link rel="stylesheet" href="../Css/footer.css" />
    <link rel="stylesheet" href="../Css/admin.css">
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
    <main class="admin">
        <section class="insert">
            <div class="form-container">
                <h3>Add een Game</h3>
                <form method="post" enctype="multipart/form-data">
                    <div class=" inputbox">
                        <span>Game Name</span>
                        <input required="required" type="text" name="name" placeholder='Name'>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <span>Game Beschrijving</span>
                        <input required="required" type="text" name="beschrijving" placeholder='Beschrijving'>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <span>Game Category</span>
                        <input required="required" type="text" name="Category" placeholder='Category'>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <span>Image Link</span>
                        <input required="required" type="text" name="link" placeholder='Image Link'>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <span>Game Prijs</span>
                        <input required="required" type="text" name="prijs" placeholder='Prijs'>
                        <i></i>
                    </div>
                    <button type='submit' class='btn' name='add-game'>
                        Add Game
                    </button>
                </form>
            </div>
        </section>
        <section class="delete">
            <div class="form-container">
                <h3>Verwijder een Game</h3>
                <form method="post" enctype="multipart/form-data">
                    <label for="delete">Selecteer een Game om te delete:</label>
                    <select name="delete">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["ID"] . "'>" . $row["naam"] . "</option>";
                            }
                        }
                        ?>

                    </select>
                    <br><br>
                    <button type="submit" name='Delete' class='btn'>Delete</button>
                </form>
            </div>
            <div class="form-container">
                <h3>Update een Game</h3>
                <form method="post" enctype="multipart/form-data">
                    <label for="update">Select row to update</label>
                    <select name="update" onchange="DataNeerZetten()">
                        <option value="">Select a project</option>
                        <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                echo "<option value='" . $row["ID"] . "' data-naam='" . $row["naam"] . "' data-beschrijving='" . $row["beschrijving"] . "' data-prijs='" . $row["prijs"] . "' " . "data-image='" . $row['image'] . "'data-category='" . $row['eigenschappen'] . "'>" . $row["naam"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    <label for="Naam">New Naam:</label>
                    <input type="text" name="naam" id="naamField">
                    <br><br>
                    <label for="Beschrijving">New Beschrijving:</label>
                    <input type="text" name="beschrijving" id="beschrijvingField">
                    <br><br>
                    <label for="Datum">New Category:</label>
                    <input type="text" name="category" id="categoryField">
                    <br><br>
                    <label for="Link">New Link:</label>
                    <input type="text" name="link" id="linkField">
                    <br><br>
                    <label for="Techniek">New Prijs:</label>
                    <input type="text" name="prijs" id="prijsField">
                    <br><br>
                    <button type="submit" name='Update' class='btn'>Update Game</button>
                </form>
</body>
<script>
    function DataNeerZetten() {
        let select = document.getElementsByName("update")[0];
        let selectedOption = select.options[select.selectedIndex];
        let naamField = document.getElementById("naamField");
        let beschrijvingField = document.getElementById("beschrijvingField");
        let categoryField = document.getElementById("categoryField");
        let linkField = document.getElementById("linkField");
        let prijsField = document.getElementById("prijsField");

        if (selectedOption) {
            let naam = selectedOption.getAttribute("data-naam");
            let beschrijving = selectedOption.getAttribute("data-beschrijving");
            let datum = selectedOption.getAttribute("data-prijs");
            let link = selectedOption.getAttribute("data-image");
            let techniek = selectedOption.getAttribute("data-category");

            naamField.value = naam;
            beschrijvingField.value = beschrijving;
            categoryField.value = datum;
            linkField.value = link;
            prijsField.value = techniek;
        } else {
            naamField.value = "";
            beschrijvingField.value = "";
            categoryField.value = "";
            linkField.value = "";
            prijsField.value = "";
        }
    }
</script>

</html>