<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess-Boeder</title>

    <style>

        table{
            border-collapse: collapse;
            border: 1px solid black;
            margin: 50px auto;
        }
        td {
            width: 50px;
            height: 50px;
        }
        .first {
            background-color: whitesmoke;
        }
        .second {
            background-color: black;
        }
       
    </style>
</head>
<body>
    <table>
        <?php
        
        for ($i=0; $i < 8 ; $i++) { 
            echo "<tr>";

            for ($ii=0; $ii < 8 ; $ii++) { 
                if (($ii + $i ) % 2 == 0){
                    echo "<td class = first ></td>";
                }
                else {
                    echo "<td class = second ></td>";
                }
            }

            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>