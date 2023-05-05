<?php
if (isset($_POST['submit'])) {
    $id = $_POST['name'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.genderize.io?name=' . $id);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);
    $gender = $result->gender;
    $probability = $result->probability;
    $count = $result->count;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenderCo</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="name" id="name" placeholder="Enter Name..."><br>
                <input type="submit" id="submit" name="submit" value="submit">
            </form>
        </div>

        <?php
        if (isset($id)) {
            if ($id != "") {
                $id = ucfirst($id);
                echo '<div class="show">';
                if ($gender == "male") {
                    echo $id . " is a " . "<span>" . $gender . "&#9794" . "</span>" . "<br>";
                } elseif ($gender == "female") {
                    echo $id . " is a " . "<span>" . $gender . "&#9792" . "</span>" . "<br>";
                }
                echo "The probability is " . $probability . "<br>";
                echo "There were " . $count . " records found";
                echo '</div>';
            }
        }
        ?>

    </div>
</body>

</html>