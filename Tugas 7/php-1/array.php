<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array</title>
</head>

<body>
    <h1>Berlatih Array</h1>

    <?php
    echo "<h3> Soal 1 </h3>";
    /* 
            SOAL NO 1
            Kelompokkan nama-nama di bawah ini ke dalam Array.
            Kids : "Mike", "Dustin", "Will", "Lucas", "Max", "Eleven" 
            Adults: "Hopper", "Nancy",  "Joyce", "Jonathan", "Murray"
        */
    $kids = array("Mike", "Dustin", "Will", "Lucas", "Max", "Eleven" ); // Lengkapi di sini
    $adults = array("Hopper", "Nancy",  "Joyce", "Jonathan", "Murray"); 
    echo "<h3> Soal 2</h3>";
    /* 
            SOAL NO 2
            Tunjukkan panjang Array di Soal No 1 dan tampilkan isi dari masing-masing Array.
        */
    echo "Cast Stranger Things: ";
    echo "<br>";
    echo "Total Kids: " . count($kids); // Berapa panjang array kids
    echo "<br>";
    echo "<ol>";
    echo "<li> $kids[0] </li><li> $kids[1] </li><li> $kids[2] </li><li> $kids[3] </li><li> $kids[4] </li><li> $kids[5] </li>" ;
    // Lanjutkan

    echo "</ol>";

    echo "Total Adults: " . count($adults); // Berapa panjang array adults
    echo "<br>";
    echo "<ol>";
    echo "<li> $adults[0] </li><li> $adults[1] </li><li> $adults[2] </li><li> $adults[3] </li><li> $adults[4] </li>";
    // Lanjutkan

    echo "</ol>";
    
    // SOAL No 3
    // Susun data-data berikut ke dalam bentuk Asosiatif Array didalam Array Multidimensi
    
    echo "<h3> Soal 3</h3>";
    $kids = array(
        array(
            "Name" => "Mike",
            "Age" => 12,
            "Aliases" => "Dungeon Master",
            "Status" => "Alive"
        ),
        array(
            "Name" => "Will",
            "Age" => 12,
            "Aliases" => "Will the Wise",
            "Status" => "Alive"
        ),
        array(
            "Name" => "Eleven",
            "Age" => 12,
            "Aliases" => "El",
            "Status" => "Alive"
        )
        );

    echo "<pre>";
    print_r($kids);
    echo "</pre>";


            // Output:
            // Array
                // (
                //     [0] => Array
                //         (
                //             [Name] => Will Byers
                //             [Age] => 12
                //             [Aliases] => Will the Wise
                //             [Status] => Alive
                //         )

                //     [1] => Array
                //         (
                //             [Name] => Mike Wheeler
                //             [Age] => 12
                //             [Aliases] => Dugeon Master
                //             [Status] => Alive
                //         )

                //     [2] => Array
                //         (
                //             [Name] => Jim Hooper
                //             [Age] => 43
                //             [Aliases] => Chief Hopper
                //             [Status] => Deceased
                //         )

                //     [3] => Array
                //         (
                //             [Name] => Eleven
                //             [Age] => 12
                //             [Aliases] => El
                //             [Status] => Alive
                //         )

                // )
            

    ?>
</body>

</html>