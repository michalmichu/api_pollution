
      <html lang="pl-PL">
<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zaczytywanie grafiku poboru do bazy</title>
        <link rel="stylesheet" href="styles.css">
				<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">

</head>
<body background="backgr_earth_in_mask.png"> 
<h1><font color=#715649>Stan i jakość powietrza w Lublinie</font></h1>
 
<?php				
				$url = "https://api.gios.gov.pl/pjp-api/rest/aqindex/getIndex/266";
        $data = json_decode(file_get_contents($url), true);
        echo "<font color=#364e54>Numer stacj pomiarowej: ", $data['id'];
        echo '<br>';
        echo "Data i godzina pomiaru: ", $data['stCalcDate'];
        echo '<br>';
				echo "<font size=+2>Indeks jakości powietrza: <b>", $data['stIndexLevel']['indexLevelName'];
        echo '</b></font></font><br>';
        //echo "Logo: ", '<img src="', $data['logo'], ' " height="30" width="30">';
				
				
				echo '<h2><font color=#715649>Poziomy niektórych substancji i gazów w powietrzu</font></h2>';
				
				$url = "https://api.gios.gov.pl/pjp-api/rest/station/sensors/266";
        $data = json_decode(file_get_contents($url), true);
				
				$urlm = "https://api.gios.gov.pl/pjp-api/rest/data/getData/1888";
				$measurement = json_decode(file_get_contents($urlm), true);
				
        //echo "Numer stacj pomiarowej: ", $data[0]['id'];
        echo '<font size=+1 color=#364e54>Badana cecha / Wartośc parametru / Stężenie maksymalne i dopuszczalne';
        echo '<br><br>';
				echo " <b>", $data[0]['param']['paramName'];
        echo ' </b>';
				$meas=$measurement['values'][0]['value'];
				if($meas<>null){
				echo ": <b>", $measurement['values'][0]['value'] ." [µg/m3]</b>";
				} else {
				echo ": <b>", $measurement['values'][1]['value'] ." [µg/m3]</b>";
				}
        echo ', ';
				$urln = "http://localhost/api/tblpolutionnorm/read/1";
        $datan = json_decode(file_get_contents($urln), true);
				echo "Stężenie godzinowe przy najgorszym indeksie: >" .$datan[0]['pollution_max_index'] . "[µg/m3], Stężenie dopuszczalne to " .$datan[0]['pollution_acceptable'] . "[µg/m3]<br><br>";
				
				$urlm = "https://api.gios.gov.pl/pjp-api/rest/data/getData/1895";
				$measurement = json_decode(file_get_contents($urlm), true);
				
				echo " <b>", $data[1]['param']['paramName'];
        echo ' </b>';
				$meas=$measurement['values'][0]['value'];
				if($meas<>null){
				echo ": <b>", $measurement['values'][0]['value'] ." [µg/m3]</b>";
				} else {
				echo ": <b>", $measurement['values'][1]['value'] ." [µg/m3]</b>";
				}
        echo ', ';
				$urln = "http://localhost/api/tblpolutionnorm/read/2";
        $datan = json_decode(file_get_contents($urln), true);
				echo "Stężenie godzinowe przy najgorszym indeksie: >" .$datan[0]['pollution_max_index'] . "[µg/m3], Stężenie dopuszczalne to " .$datan[0]['pollution_acceptable'] . "[µg/m3]<br><br>";
				
				$urlm = "https://api.gios.gov.pl/pjp-api/rest/data/getData/1902";
				$measurement = json_decode(file_get_contents($urlm), true);
				
				echo " <b>", $data[4]['param']['paramName'];
        echo ' </b>';
				$meas=$measurement['values'][0]['value'];
				if($meas<>null){
				echo ": <b>", $measurement['values'][0]['value'] ." [µg/m3]</b>";
				} else {
				echo ": <b>", $measurement['values'][1]['value'] ." [µg/m3]</b>";
				}
        echo ', ';
				$urln = "http://localhost/api/tblpolutionnorm/read/3";
        $datan = json_decode(file_get_contents($urln), true);
				echo "Stężenie godzinowe przy najgorszym indeksie: >" .$datan[0]['pollution_max_index'] . "[µg/m3], Stężenie dopuszczalne to " .$datan[0]['pollution_acceptable'] . "[µg/m3]<br><br>";
				
				$urlm = "https://api.gios.gov.pl/pjp-api/rest/data/getData/1900";
				$measurement = json_decode(file_get_contents($urlm), true);
				
				echo " <b>", $data[3]['param']['paramName'];
        echo ' </b>';
				$meas=$measurement['values'][0]['value'];
				if($meas<>null){
				echo ": <b>", $measurement['values'][0]['value'] ." [µg/m3]</b>";
				} else {
				echo ": <b>", $measurement['values'][1]['value'] ." [µg/m3]</b>";
				}
        echo ', ';
				$urln = "http://localhost/api/tblpolutionnorm/read/4";
        $datan = json_decode(file_get_contents($urln), true);
				echo "Stężenie godzinowe przy najgorszym indeksie: >" .$datan[0]['pollution_max_index'] . "[µg/m3], Stężenie dopuszczalne to " .$datan[0]['pollution_acceptable'] . "[µg/m3]<br><br>";
				
				$urlm = "https://api.gios.gov.pl/pjp-api/rest/data/getData/16472";
				$measurement = json_decode(file_get_contents($urlm), true);
				
				echo " <b>", $data[6]['param']['paramName'];
        echo ' </b>';
				$meas=$measurement['values'][0]['value'];
				if($meas<>null){
				echo ": <b>", $measurement['values'][0]['value'] ." [µg/m3]</b>";
				} else {
				echo ": <b>", $measurement['values'][1]['value'] ." [µg/m3]</b>";
				}
        echo ', ';
				$urln = "http://localhost/api/tblpolutionnorm/read/5";
        $datan = json_decode(file_get_contents($urln), true);
				echo "Stężenie godzinowe przy najgorszym indeksie: >" .$datan[0]['pollution_max_index'] . "[µg/m3], Stężenie dopuszczalne to " .$datan[0]['pollution_acceptable'] . "[µg/m3]<br><br>";
				
				$urla = "http://localhost/api/tblemp/read/20";
        $dataa = json_decode(file_get_contents($urla), true);
				echo " <br>Autor: <b>", $dataa[0]['name'] . " ". $dataa[0]['surname'];
        echo ' </b></font>';
				
				
?>
</body>
</html>