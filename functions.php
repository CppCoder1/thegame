<?php

    error_reporting(0);
    function get_or_post($variable_name, $default)
    {
        if(key_exists($variable_name, $_GET))
            return $_GET[$variable_name];
        else if (key_exists($variable_name, $_POST))
            return $_POST[$variable_name];
        else
            return $default;
    }

    function sql_req($query)
    {
        
        $conn = mysqli_connect('localhost', 'root', '', 'dbname');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');

        $result = mysqli_query($conn, $query);

        if (gettype($result) == "boolean")
        {
            return $result;
        }

        mysqli_close($conn);

        $userinfo = array();

        while($row_user = mysqli_fetch_array($result)){
                $row_id = $row_user["id"];
                $row_name = $row_user["name"];
                $row_race_id = $row_user["race_id"];
                $row_score = $row_user["score"];
                $userinfo[] = array("id"=> $row_id , "name"=> $row_name, "race_id"=> $row_race_id, "score" => $row_score);
            }

        return $userinfo;
    }
?>