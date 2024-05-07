<?php
require '../../Model/test_res.php';
require '../../Contoller/res_test.php';
$res1=new reservations1();

if(
    isset ($_POST["id"]) &&
    isset ($_POST["start"])&&
    isset ($_POST["endDate"])&&
    isset ($_POST["Description"])
    
){
if(   !empty($_POST["id"])&&
    !empty ($_POST["start"])&&
    !empty ($_POST["endDate"])&&
    !empty ($_POST["Description"]) 
    
      )
     {
       
        
        $res=new res2(
            
            $_POST["id"],
            $_POST["start"],
            $_POST["endDate"],
            $_POST["Description"]

        );
      
        $res1=new reservations1();
        $res1->updateres($res, $_POST['id']);
        header('Location: table.php');
        
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update reservation</title>
    <link rel="stylesheet" type="text/css" href="styleee.css">
 
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ff9900;
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.back {
            background-color: #ff9900;
        }
    </style>
</head>

<body>
    

    <form action="" method="POST">
    <h2> update reservation </h2>

    <?php
    if (isset($_GET['id'])) {
        $res = $res1->showres($_GET['id']);}
    ?>
        
        <table>
        
            <tr>
                <td><label for="id">id </label></td>
               <td> <input type="text" id="id" name="id" value="<?php echo $res['id'] ?>" readonly></td>
               
            </tr>
        <tr>
            <tr>
                <td><label for="start">start :</label></td>
                <td>
                    <input type="date" id="start" name="start" value="<?php echo $res['start'] ?>"/>
                    <span id="erreurstart" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="endDate">endDate :</label></td>
                <td>
                    <input type="date" id="endDate" name="endDate" value="<?php echo $res['endDate'] ?>" />
                    <span id="erreurendDate" style="color: red"></span>
                </td>
            </tr>
            <tr>
            <td><label for="Description"> Description:</label></td>
    <td>
        <textarea id="Description" name="Description" rows="4" cols="50"><?php echo $res['idH'] ?></textarea>
        <span id="erreurDescription" style="color: red"></span>
    </td>
            </tr>
            </tr>          
            <tr>
          
<td>
<br><br>
    <button type="submit"> Confirm </button>
</td>

   </form>
    <form action="table.php" method="get">

       <td>  <br><br><button type="submit">Back </button></td>
</tr>
</table>
</body>

</html>