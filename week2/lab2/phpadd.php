<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       include './dbconnect.php';
       include './functions.php';
        

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");

            
            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input (INPUT_POST, 'lastname');
            $dob = filter_input (INPUT_POST, 'dob');
            $height = filter_input (INPUT_POST, 'height');

            $binds = array(
                
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                "dob" => $dob,
                "height" =>$height
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>
        
        <body>
            
            <h1><?php echo $results; ?></h1>
       <form method="post" action="#">
            
            Actor ID <input type="varchar" value="" name="id" />
            <br />
            First Name <input type="varchar" value="" name="firstname" />
            <br />
            Last Name <input type="varchar" value="" name="lastname" />
            <br />
            Date of Birth <input type="date" value="" name="dob" />
            <br />
            Height <input type="varchar" value="" name="height" />
            <br />
            
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>
