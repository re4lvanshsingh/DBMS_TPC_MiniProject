<?php 
    session_start();
    include 'config.php';

    $cname= $_SESSION['comp'];
    $yr= $_SESSION['yr'];
    $c1= $_SESSION['c1'];
    $c2= $_SESSION['c2'];
    $c3= $_SESSION['c3'];

    // echo $cname;
    // echo $yr;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
        }
    th {
  border-style: solid;
    }
    td{
        border-style: ridge;
    }
    </style>
</head> 
<body> 
    <table style= "width:50%">
    <caption> <h3> Placement Record </h3></caption>
    <!-- <tfoot> Data till date</tfoot> -->
        <tr>
            <th> Roll No.</th>
            <th> Company Placed </th>
            <th> Package </th>
            <th> Year</th>
        </tr>
        <?php 
        if($c1){
            $query= " SELECT* FROM placed where Company= '$cname' and Year= '$yr' ORDER BY Package desc";
        }
        else if($c2){
            $query= " SELECT* FROM placed where Company= '$cname'  ORDER BY Package desc ";
        }
        else if($c3){
            $query= " SELECT* FROM placed where Year= '$yr' ORDER BY Package desc";
        }

        $res= mysqli_query($conn, $query);
        // echo mysqli_num_rows($res);
        while($row= mysqli_fetch_array($res))
        {
        ?>
            <tr>
                <td> <?php echo $row['Roll_no'];?></td>
                <td> <?php echo $row['Company'];?></td>
                <td> <?php echo $row['Package'] . ' L.P.A';?></td>
                <td> <?php echo $row['Year'];?> </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>