<html>
        <h1>CPU Temperature monitor in Celsius</h1>
          <center><a href="index.php"><img src="resources/back.png" width="20px">Back to Mainpage</a></center>
        <center><p id="secondsCountdown">The next temperature reading is in seconds.</p></center>
        <table id='tempTable'>
                <tr>
                        <td><center>ID</center></td>
                        <td><center>TEMP</center></td>
                        <td><center>TIME</center></td>
                        <td><center>Delete</center></td>
                </tr>
        </html>
<center>
<form action='checktemp.php'>
        <input type='submit' value='Check Temperature Now'>
</form>
<form  method='GET' action='temp.php'>
        <input name='number' type='number' id='viewNum' required>
        <input type='submit' value='View Records' id='view'>
</form>
<p>
<button onclick='Confirm()' id='clear'>
        Clear Table
</button>
</p>
<center>
<?php
        include "config.php";
        $temp = 0;
        $counter = 0;
        $num = $_GET["number"];
        if($num !== null)
        {
                $db_query = $mysqli->query("SELECT * FROM temp ORDER BY id DESC LIMIT " . $num);
        }
        else
        {
                $db_query = $mysqli->query("SELECT * FROM temp ORDER BY id DESC");
                $extra = "";
        }
        while ($result = $db_query->fetch_array())
        {
 {
                $on = $counter + 1;
                echo"
                        <tr>
                                <td>
                                        " . $on . "
                                </td>
                                <td>
                                        " . $result['temp'] . " ^ C
                                </td>
                                <td>
                                        " . $result['date'] . "
                                </td>
                                <td>
                                        <a href='delete.php?id=" . $result['id'] . "'><center><img width='20px' src='resources/trashcan.png'></center></a>
                                </td>
                        </tr>
                ";
                $temp = $result["temp"] + $temp;
                $counter = $counter + 1;
        }
        $average = $temp / $counter;
        $average = round($average,3);
         echo"
        <p>
                Average Temperature is " . $average . " ^ C.
        </p>
        <p>
                ";
                                $message = $_GET["message"];
                if($message == "delete")
                {
                        echo"<center><p>Record successfully deleted. <a href='temp.php'><img src='resources/x.png' width='10px'></a></p></center>";
                }
                if($message == "reading")
                {
                        echo"<center><p>Successully Completed Temperature Reading. <a href='temp.php'><img src='resources/x.png' width='10px'></a></p></center>";
                }
                if($message == "clear")
                {
                        echo"<center><p>Successully Cleared Temperature Readings. <a href='temp.php'><img src='resources/x.png' width='10px'></a></p></center>";
                }
                if($message == "error")
                {
                        echo"<center><p>An error occured. <a href='temp.php'><img src='resources/x.png' width='10px'></a></p></center>";

 }
echo"
        </p>
        </table>
        ";


?>
<html>
</html>
<style>
#number {
        text-align:center;
}
p {
        text-align:center;
}
h1 {
        text-align:center;
}
table {
        border:  1px solid black;
        }
td {
        padding: 3px;
}
</style>
<script>
        var date = new Date();
        var seconds = date.getSeconds();
        var remainingSeconds = 60 - seconds
        document.getElementById("secondsCountdown").innerHTML = "The next temperature reading is in " + remainingSeconds + " seconds.";
        setInterval(
        function() {
                date = new Date();
                seconds = date.getSeconds();
                remainingSeconds = 60 - seconds
                if (remainingSeconds == 58) {
                        location.reload();
                }
                document.getElementById("secondsCountdown").innerHTML = "The next temperature reading is in " + remainingSeconds + " seconds.";
        }, 1000
);
var rows = document.getElementById("tempTable").rows.length - 1;
document.getElementById("viewNum").max = rows;
document.getElementById("viewNum").min = 1;
if (rows == 0) {
        document.getElementById("clear").disabled = true;
        document.getElementById("view").disabled = true;
        document.getElementById("viewNum").disabled = true;
}
        function Confirm()
        {
                if (confirm("To confirm, do you really wish to clear all temperature records?") === true)
                {
                        window.location.replace("cleartable.php")
                }
        }

</script>
