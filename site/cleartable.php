<?php
        include "config.php";
        $db_query = $mysqli->query("TRUNCATE temp");
        if($mysqli->affected_rows !== 1)
        {
                header( "Location: temp.php?message=clear");
        }
        else
        {
                header( "Location: temp.php?message=error");
        }
?>
