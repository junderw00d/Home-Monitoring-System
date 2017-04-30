<?php
        include "config.php";
        $id = $_GET["id"];
        $db_query = $mysqli->query("DELETE FROM temp WHERE id='" . $id . "'");
        if($mysqli->affected_rows == 1)
        {
                header( "Location: temp.php?message=delete") ;
        }
        else
        {
                header( "Location: temp.php?message=error");
        }
?>
