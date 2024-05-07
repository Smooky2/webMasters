<?php
require '../../Model/Hotel.php';
require '../../Contoller/HotelC.php';
$hotel1=new Hotels();

if(
    isset ($_POST["idH"]) &&
    isset ($_POST["name"])&&
    isset ($_POST["location"])&&
    isset ($_POST["desc"])&&
    isset ($_POST["images"])
    
){
if(   !empty($_POST["idH"])&&
    !empty ($_POST["name"])&&
    !empty ($_POST["location"])&&
    !empty ($_POST["desc"])&&
    !empty ($_POST["images"]) 
    
      )
     {
       
        
        $hotel=new Hotel(
            
            $_POST["idH"],
            $_POST["name"],
            $_POST["location"],
            $_POST["desc"],
            $_POST["images"]

        );
      
        $hotel1=new Hotels();
        $hotel1->updateHotel($hotel, $_POST['idH']);
        header('Location: hotel.php');
        
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel</title>
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
    <h2> update hotel </h2>

    <?php
    if (isset($_GET['idH'])) {
        $hotel = $hotel1->showHotel($_GET['idH']);}
    ?>
        
        <table>
        
            <tr>
                <td><label for="idH">id </label></td>
               <td> <input type="text" id="idH" name="idH" value="<?php echo $hotel['idH'] ?>" readonly></td>
               
            </tr>
        <tr>
        <td><label for="name">name </label></td>
               <td> <input type="text" id="name" name="name" value="<?php echo $hotel['name'] ?>" ></td>
            <tr>
            <td><label for="location">id </label></td>
               <td> <input type="text" id="location" name="location" value="<?php echo $hotel['location'] ?>" ></td>
            </tr>
            <tr>
            
            </tr>
            <tr>
            <td><label for="desc"> Description:</label></td>
    <td>
        <textarea id="desc" name="desc" rows="4" cols="50"><?php echo $hotel['desc'] ?></textarea>
        <span id="erreurDescription" style="color: red"></span>
    </td>

            </tr>
            <tr>
            <td><label for="images">images </label></td>
               <td> <input type="text" id="images" name="images" value="<?php echo $hotel['images'] ?>" ></td>
            </tr>
            </tr>          
            <tr>
          
<td>
<br><br>
    <button type="submit"> Confirm </button>
</td>

   </form>
    <form action="hotel.php" method="get">

       <td>  <br><br><button type="submit">Back </button></td>
</tr>
</table>
</body>

</html>