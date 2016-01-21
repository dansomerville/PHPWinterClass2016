<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            $db = getDatabase();
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input (INPUT_POST, 'email');
                $zipcode = filter_input (INPUT_POST, 'zipcode');
                $owner = filter_input (INPUT_POST, 'owner');
                $phone = filter_input (INPUT_POST, 'phone');
                $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":incorp_dt" => $incorp_dt,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results ['owner'];
                $phone = $results ['phone'];
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Corporation <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Date Incorporated <input type="date" value="<?php echo $incorp_dt; ?>" name="incorp_dt" />
            <br />
            Email <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
            
            
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
