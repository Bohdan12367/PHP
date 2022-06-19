<?php
function conferences_all($link){
    $query = "SELECT * FROM conference ORDER BY id DESC";
    $result = mysqli_query($link,$query);

    if(!$result){
        die(mysqli_error($link));
    }

    //витягування бд
    $n = mysqli_num_rows($result);
    $conferences = array();

    for ($i = 0; $i < $n ; $i++){
        $row = mysqli_fetch_assoc($result);
        $conferences[] = $row;
    }
    return $conferences;
}

function conferences_get($link, $id_conference){
//запит
$query=sprintf("SELECT * FROM conference WHERE id=%d", (int)$id_conference);
    $result  = mysqli_query($link,$query);
    if(!$result)
        die(mysqli_error($link));

        $conference = mysqli_fetch_assoc($result);

        return $conference;

}

function conferences_create($link,$title, $date, $latitude, $longitude, $country){
    //підготовка даних
    $title = trim($title);
    $country = trim($country);

    //запит
    $t = "INSERT INTO conference (title, date, latitude, longitude, country) VALUES ('%s','%s','%f','%f','%s')";

    $query = sprintf($t,mysqli_real_escape_string($link,$title), 
    mysqli_real_escape_string($link,$date), 
    mysqli_real_escape_string($link,$latitude), 
    mysqli_real_escape_string($link,$longitude), 
    mysqli_real_escape_string($link,$country));

    $result = mysqli_query($link,$query);

    if (!$result)
        die(mysqli_error($link));
    
    return true;
}

?>