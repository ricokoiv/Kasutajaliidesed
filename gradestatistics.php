<?php


$description = utf8_decode($_POST['description']);
$course_id = $_POST['course_id'];


$mysqli = mysqli_connect('localhost', 'st2014', 'progress', 'st2014');

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

$query = "select distinct grade, count(grade) as CountOf from t135190_klgrades2 where course_id='$course_id' 
and description='$description' group by grade;";

if ($result = mysqli_query($mysqli, $query)) {
  $out = array();

  while ($row = $result->fetch_assoc()) {
    $out[] = $row;
  }

  /* encode array as json and output it for the ajax script*/
  echo json_encode($out);

  /* free result set */
  mysqli_free_result($result);

}

/* close connection*/
$mysqli->close();

