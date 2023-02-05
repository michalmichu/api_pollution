# api_pollution
## API Pollution REST API
<br>
Get started with the simple Web Page with the "API Pollution REST API" Rest Api plugin. This is very easy to use and easily customizable code base. You have to maintain the very easy HTML/php structure for this plugin.
<br>
https://tripplant.pl/api/api_get_data.php

## How to use<br>
Use the json_decode function ( customize the application per Postman for Windows desktop application UI using general url described on api.gios.gov.pl site) & different parameters of url accordingly on your site. This way You use the api served by GIOS which is free to use and show us a pollution state and air condition in different cities in Poland.
<br>
<pre>
$url = "https://api.gios.gov.pl/pjp-api/rest/aqindex/getIndex/266";
      $data = json_decode(file_get_contents($url), true);
</pre>
<br>

You may use POSTMAN Desktop Application and find out different Cities using this GET type queries:
<br>
<pre>
https://api.gios.gov.pl/pjp-api/rest/station/findAll
</pre>
<br>
This way you will get list of Index which You can use in url below:
<br>
<pre>
https://api.gios.gov.pl/pjp-api/rest/aqindex/getIndex/114
</pre>
<br>
Examples data in JSON format as a result of above url with 266 number on the end of url:
<br>
<pre>
{
        "id": 266,
        "stationName": "Lublin, ul. Obywatelska",
        "gegrLat": "51.259431",
        "gegrLon": "22.569133",
        "city": {
            "id": 489,
            "name": "Lublin",
            "commune": {
                "communeName": "Lublin",
                "districtName": "Lublin",
                "provinceName": "LUBELSKIE"
            }
        },
        "addressStreet": "ul. Obywatelska 13"
    },
</pre>
<br>

## REST API Function

To run Your own WEB API copy file rest.php and copy it to “Class” folder on your Apache Serwer. This file have a function getPollution which let you get a pollution norm which is collect in mySQL database and encode it to JSON formatted data like data in above GIOS API.
<br>
<pre>
public function getPollution($pollId) {		
		$sqlQuery = '';
		if($pollId) {
			$sqlQuery = "WHERE id = '".$pollId."'";
		}	
		$empQuery = "SELECT id, pollution_name, pollution_max_index, pollution_acceptable FROM ".$this->polutionTable." $sqlQuery
			ORDER BY id DESC";	
		$resultData = mysqli_query($this->dbConnect, $empQuery);
		$empData = array();
		while( $empRecord = mysqli_fetch_assoc($resultData) ) {
			$empData[] = $empRecord;
		}
		header('Content-Type: application/json');
		echo json_encode($empData);	
	}
  </pre>
  
<br>

## Initialize

Before running WEB API you must:
1.	Make test_api database on Apache localhost.
2.	Run test_api.sql file on this database to make tables with data
3.	Set up your database login and password in above rest.php file.
4.	Copy file read.php to tblpolutionnorm folder
5.	Make and configure file .htaccess in above folder:
<br>
<pre>
RewriteEngine On    # Turn on the rewriting engine
RewriteRule ^read/([0-9a-zA-Z_-]*)$ read.php?id=$1 [NC,L]
</pre>
<br>
Then You can use WEB API features. Here is the little code example’s to use it:
<br>
<pre>
$urln = "http://localhost/api/tblpolutionnorm/read/4";
        $datan = json_decode(file_get_contents($urln), true);
</pre>
<br>
This code is placed in api_get_data.php which use external API and localhost API also.
Run api_get_data.php and check air condition in air station chosen by id.

## Requirements

Requires htscanner function activate in Apache configuration in PHP Selector section.
<br><br>
####Tested Browsers:
- Chrome
- Firefox
- Edge
- Opera
- IE7+
- Android Browser
- iOS Safari
<br>
## SOURCE CODE:
github:
michalmichu/api_pollution
