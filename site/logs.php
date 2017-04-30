<?php
$mysqli = new mysqli("127.0.0.1", "root", "(a-password)", "logs");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$db_query = $mysqli->query("SELECT * FROM ssh ORDER BY id DESC");
echo"<center><table><tr><td><b>TIME STAMP</b></td><td><b>IP ADDRESS</b></td></tr>";
while ($result = $db_query->fetch_array())
{
        echo"<tr>
        <td>" . $result['date'] . "</td>
        <td>" . $result['IP'] . "</td>
        </tr>
        ";
}
echo"</table></center>"
?>

<style>
#list {
        text-align:center;
}
ul {
        list-style-type: none;
}
li {
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
        border-collapse: collapse;
        margin-left:auto;
        margin-right:auto;
}
table, th, td {
        border: 1px solid black;
}
td {
        padding: 3px;
}
</style>
