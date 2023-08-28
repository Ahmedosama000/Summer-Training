<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
            margin: 10px auto;
            width: 100%;
        }
        td {
            width: 50px;
            height: 50px;
            padding-left: 20px;
            border: 1px solid black;
            text-align: center;
        }
        tr {
            border: 1px solid black;
        }
        th {
            border: 1px solid black;
        }
    </style>
</head>
<?php

class product {
    public int $id ;
    public string $name;
    public float $price;

    public function __construct(int $id ,string $name ,float $price){
        $this->id = $id ;
        $this->name = $name;
        $this->price = $price;
    }
}

$All_products = [
new product(1,'fisrt',20),
new product(2,'second',30),
new product(3,'third',50),
new product(4,'fourth',60),
new product(5,'fifth',10),
new product(6,'sixth',30),
new product(7,'seventh',20),
new product(8,'eighth',80)
];
?>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name </th>
            <th>price</th>
        </tr>
        <?php 
        $num = 0;
        $total = 0;
        foreach ($All_products as $product){
            echo '<tr>';
            echo "<td>{$product->id}</td>";
            echo "<td>{$product->name}</td>";
            echo "<td>{$product->price}$</td>";
            echo '<tr>';
            $num ++;
            $total +=$product->price;
    }
        ?>
        <tr>
            <td>Total </td>
            <td><?=$num?> Products</td>
            <td><?=$total?>$</td>
        </tr>
    </table>

</body>
</html>

<!--####################################################################-->
<?php

function is_anagrams($word1, $word2)
{
    if (count_chars($word1) == count_chars($word2)) {
        echo "$word1 and $word2 is anagram";
    } else {
        echo "$word1 and $word2 is not anagram";
    }
}
?>
<!--####################################################################-->

<?php

function is_palindrome($word)
{
    if ($word == strrev($word)) {
        echo "$word is palindrome";
    } else {
        echo "$word is notpalindrome";
    }
}

?>
<!--####################################################################-->

<!-- Json Quiz  -->
<?php 
function json_read($file_name){
    $json_file = file_get_contents($file_name);
    $All_data = json_decode($json_file);
    print_r($All_data);
}
?>