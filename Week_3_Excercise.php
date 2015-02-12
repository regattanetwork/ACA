<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Countries of Earth</title>
    <?php
    session_start();
    ?>
    <!-- This is where your JS and CSS references go -->
    <style type="text/css">
        body {
            font-family: sans-serif;
            font-size: 1.0em;
        }

        .inputbox {
            font-size: 1.0em;
            color: black;
        }
    </style>
</head>

<body>

<h3>Countries on Earth</h3>

<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    Enter Country Name: <input type="text" id="countryName" name="country_name" size="30"/>
    <input type="submit" value="Get Details"/>
</form>

<hr/>
<?php


            // Hint: To access data in a stdClass object use the -> operator
// $data->name = 'Samir'; echo $data->name;


       // Check for an incoming POST request
        if ($_POST) {

            $countryName = $_POST['country_name'];
            echo 'The country entered was: <b>' . strtoupper($countryName)."</b><p>";


//            $data->name = 'Country Name: ' . $data->name;
//            echo 'Capital: '. echo $data->capital;

}
$countryName = isset($_POST['country_name']) ? $_POST['country_name'] : '';
$contents = file_get_contents("http://restcountries.eu/rest/v1/name/$countryName");

$arr = json_decode($contents);
$arr = (array) $arr[0];
$data = new stdClass;
$data->name = $arr['name'];
$data->capital = $arr['capital'];
$data->region = $arr['region'];
$data->population = number_format($arr['population']);
$data->languages = $arr['language'][0];

echo '<b>Country Name:  &nbsp;</b>' . $data->name.'<br />';
echo '<b>Capital: &nbsp;</b>'. $data->capital.'<br />';
echo '<b>Region: &nbsp;</b>'. $data->region.'<br />';
echo '<b>Population: &nbsp;</b>'. $data->population.'<br />';
echo '<b>Language(s): &nbsp;</b>'. $data->languages.'<br />';
?>
<hr/>
<?php
//$data = new stdClass;
//$contents = file_get_contents("http://restcountries.eu/rest/v1/name/$countryName");
//
//$arr = json_decode($contents);
//
//$arr = (array) $arr[0];
//$data = new stdClass;
//echo '</pre>';
//$data->name = $arr['name'];
//echo $data->name;
//$data->capital = $arr['capital'];
//$data->region = $arr['region'];
//$data->population = $arr['population'];
//#$data->languages = $arr['language'];
//echo '</pre>';

?>

</body>

</html>