<?php
  session_start();

  $booksample = explode(";",
    file_get_contents('gs://booksample/bookmark.txt')
  );
  $_SESSION["0"]=$booksample[0];
  $_SESSION["1"]=$booksample[1];
  $_SESSION["2"]=$booksample[2];
  $_SESSION["3"]=$booksample[3];
  $_SESSION["4"]=$booksample[4];
  $_SESSION["5"]=$booksample[5];
  $_SESSION["6"]=$booksample[6];
  $_SESSION["7"]=$booksample[7];
  $_SESSION["8"]=$booksample[8];
  $_SESSION["9"]=$booksample[9];
  $_SESSION["10"]=$booksample[10];
  $_SESSION["11"]=$booksample[11];
  $_SESSION["12"]=$booksample[12];
  $_SESSION["13"]=$booksample[13];
  $_SESSION["14"]=$booksample[14];
  $_SESSION["15"]=$booksample[15];
  $_SESSION["16"]=$booksample[16];
  $_SESSION["17"]=$booksample[17];
  $_SESSION["18"]=$booksample[18];
  $_SESSION["19"]=$booksample[19];
  $_SESSION["20"]=$booksample[20];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>

    <script src='../wireframe.js'></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

          // Load the Visualization API and the corechart package.
          google.charts.load('current', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.

          function drawChart() {

            // Create the data table.
            var data = google.visualization.arrayToDataTable([

            // data.addColumn('string', 'Topping');
            // data.addColumn('number', 'Slices');
            // data.addRows([
              ['Task', 'Hours per Day'],
              ['Fiction',<?php echo $_SESSION["1"]; ?>],
              ['Crime',<?php echo $_SESSION["3"]; ?>],
              ['Children',<?php echo $_SESSION["5"]; ?>],
              ['Drama',<?php echo $_SESSION["7"]; ?>],
              ['Horror',<?php echo $_SESSION["9"]; ?>],
              ['Poetry',<?php echo $_SESSION["11"]; ?>],
              ['Romance',<?php echo $_SESSION["13"]; ?>],
              ['Science',<?php echo $_SESSION["15"]; ?>],
              ['Travel',<?php echo $_SESSION["17"]; ?>],
              ['Art',<?php echo $_SESSION["19"]; ?>]

            ]);

            // Set chart options
            var options = {
              'title':'Different Categorical Book with Different Rating'
             };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1000px; height: 600px;"></div>
    <!-- <div class='content'>
    <?php
      // require 'vendor/autoload.php';
      // $client = new Google_Client();
      // $client->useApplicationDefaultCredentials();
      // $client->addScope(Google_Service_Bigquery::BIGQUERY);
      // $bigquery = new Google_Service_Bigquery($client);
      // $projectId = 'vital-chiller-254512';
      //
      // $request = new Google_Service_Bigquery_QueryRequest();
      // $str = '';
      //
      // $request->setQuery("SELECT * FROM [book.BookRating] LIMIT 10");
      //
      // $response = $bigquery->jobs->query($projectId, $request);
      // $rows = $response->getRows();
      //
      // $str = "<table>".
      // "<tr>" .
      // "<th>Name</th>" .
      // "<th>Gender</th>" .
      // "<th>Count</th>" .
      // "<th>Year</th>" .
      // "</tr>";
      //
      // foreach ($rows as $row)
      // {
      //   $str .= "<tr>";
      //
      //   foreach ($row['f'] as $field)
      //   {
      //     $str .= "<td>" . $field['v'] . "</td>";
      //   }
      //   $str .= "</tr>";
      // }
      //
      // $str .= '</table></div>';
      //
      // echo $str;
    ?>
    </div> -->

  </body>
</html>
