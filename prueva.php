<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
<?php
$i = 0;
while ($i < 3){
    echo "<tr>
    <th scope=\"row\">1</th>
    <td> <script> document.write(\"hola\") </script> </td>
</tr>";
    $i++;
}
?>
</table>
</body>
</html>