// How to display data after submitting ? 

<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bookdb';

$con = mysqli_connect($hostname , $username , $password , $dbname);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Book</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

<body>

    <form action="" method="post">
        <div class="form-group">
            <label for="">Book Name</label>
            <input type="text" name='book_name' class="form-control" id="bookname" placeholder="Enter Book Name ... ">
        </div>
        <div class="form-group">
            <label for="">Book Author</label>
            <input type="text" name='author_name' class="form-control" id="bookauthor" placeholder="Enter Author Name ">
        </div>
        <label for="">Book Price</label>
        <input type="number" name="book_price" class="form-control" id="bookprice" placeholder="Book Price">

        <div class="form-group form-check">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    $fetch_data_query = "SELECT * FROM books";
    ?>
    <table>
        <tr>
            <th>Book Name </th>
            <th>Author Name </th>
            <th>Book price </th>
        </tr>
        <?php
        $results = mysqli_query($con , $fetch_data_query);
        if($results){
            if(mysqli_num_rows($results) > 0){
                while($book_details = mysqli_fetch_assoc($results)){
                    echo "<tr>";
                    echo "<td> {$book_details['book_name']} </td>";
                    echo "<td> {$book_details['book_author']} </td>";
                    echo "<td> {$book_details['book_price']} </td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </table>

    <?php 

    if ($_POST){
        $my_book_name = $_POST['book_name'];
        $my_book_author = $_POST['author_name'];
        $my_book_price = $_POST['book_price'];
        $add_book_query = "INSERT INTO books(book_name , book_author , book_price)
        VALUES ('$my_book_name','$my_book_author','$my_book_price')
        ";
        if(mysqli_query($con , $add_book_query)){
            echo 'Book Added Succefully';
        }
        else {
            echo 'Failed';
        }
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
