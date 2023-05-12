<?php 
    include('functions.php');

    if (get_or_post("race", -1) == -1)
    {
        include('./templates/login.html');
    }
    else
    {
        $name = get_or_post("name", "");
        $password = get_or_post("password", "");
        $race = get_or_post("race", -1);

        if ($name == "" or $race == -1)
        {
            include('./templates/error.html');
        }

        $user = sql_req("SELECT * FROM player where name = \"" . $name . "\"");

        if (gettype($user) == "boolean" or count($user) == 0)
        {
            $score = 100;

            sql_req("INSERT INTO player(name, race_id, score) VALUE(\"" . $name . "\"," . $race . "," . $score . ")");
            $user = sql_req("SELECT id FROM player where name = \"" . $name . "\"");
            setcookie("id", $user[0]["id"], time() + (86400 * 30), "/");
            setcookie("score", $score, time() + (86400 * 30), "/");
            header('Location: ./game.php');
            exit();
        }
        else
        {   
            
            setcookie("id", $user[0]["id"], time() + (86400 * 30), "/");
            header('Location: ./game.php');
            exit();
        }

    }
?>