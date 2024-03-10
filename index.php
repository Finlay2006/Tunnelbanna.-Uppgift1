<?php
// Array list of all the stations on line 19
$line19 = ['Hagsätra', 'Rågsved',  'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

// Form submit using post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Use of from and to stations to help calculate
    [$fromStation, $toStation] = [$_POST['fromStation'], $_POST['toStation']];

// calculate number of stations between departure and arrival
    $stationsCount = abs(array_search($fromStation, $line19) - array_search($toStation, $line19));

// Estimated time of travel using estimation of 3 minutes per station
    $estimatedTravelTime = $stationsCount * 3;
// calculation of time of arrival using time of use and time of travel
    $expectedArrivalTime = date('H:i', time() + ($stationsCount * 180));
// Display of results
    echo "Stations: $stationsCount Time taken: $estimatedTravelTime minutes Time arriving: $expectedArrivalTime";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Times</title>
    <!-- Link to the css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--form for both to and from stations-->
<form method="post" action="">
    <label for="fromStation">from station:</label>
    <!-- list for selecting the station from -->
    <select name="fromStation" id="fromStation">
        <?php foreach ($line19 as $station): ?>
            <option><?= $station ?></option>
        <?php endforeach; ?>
    </select>

    <label for="toStation">To station:</label>
    <!-- List for selecting the station to -->
    <select name="toStation" id="toStation">
        <?php foreach ($line19 as $station): ?>
            <option><?= $station ?></option>
        <?php endforeach; ?>
    </select>
<!-- Button to sumbit the form to check times of train -->
    <button type="submit">Check times</button>
</form>
</body>
</html>
