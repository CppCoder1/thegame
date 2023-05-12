<?php
    include('functions.php');

    if (get_or_post("total", "") == "")
    {
        include('./templates/game.html');
    }
    else
    {
        $total = get_or_post("total", "win");
        $score = sql_req("SELECT score FROM player where id= " . $_COOKIE["id"]);
        $ds = 0;

        if ($total == "win")
            $ds = 10;
        else
            $ds = -10;

        $s = $score[0]["score"] + $ds;

        sql_req("UPDATE player SET score = " . $s
            . " where id = " . $_COOKIE["id"]);

        include('./templates/leadboard.html');
    }
?>