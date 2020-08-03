<?php
    $array = array(
        "firstname" => "",
        "name" => "",
        "email" => "",
        "phone" => "",
        "message" => "",
        "firstnameError" => "",
        "nameError" => "",
        "emailError" => "",
        "phoneError" => "",
        "messageError" => "",
        "isSuccess" => false
        );

    $emailTo ="contact@ramyelbehedy.yj.fr";

    if($_SERVER["REQUEST_METHOD"]=="POST" && (isset($_POST['firstname']) && isset($_POST['name'])
    && isset($_POST['email']) && isset($_POST['message']))){
        $array['firstname'] = $_POST['firstname'];
        $array['name'] =  verifyInput($_POST['name']);
        $array['email'] =  verifyInput($_POST['email']);
        $array['message'] =  verifyInput($_POST['message']);
        if(isset($_POST['phone']))
        $array['phone'] =  verifyInput($_POST['phone']);
        $array['isSuccess'] = true;
        $emailText = "";

        if(empty($array['firstname']))
        {
            $array['firstnameError'] = "Je veux connaître ton prénom !";
            $array['isSuccess'] = false;
        }
        if(empty($array['name']))
        {
            $array['nameError'] = "Et ton nom alors ?";
            $array['isSuccess'] = false;
        }
        if( !(isEmail($array['email'])) || empty($array['email'])){
            $array['emailError'] = "T'essaies de me rouler Billy ? C'est pas un email ça !";
            $array['isSuccess'] = false;
        }
        if(!empty($array['phone'])){
            if(!isPhone($array['phone'])){
                $array['phoneError']= "Ici c'est uniquement des chiffres et des espaces.";
                $array['isSuccess'] = false;
            }
        }
        if(empty($array['message']))
        {
            $array['messageError'] = "Envoyer un message, OUI ! Mais avec du contenu, c'est mieux !";
            $array['isSuccess'] = false;
        }
        if($array['isSuccess']){
            $emailText .= "Firstname: {$array["firstname"]}\n";
            $emailText .= "Name: {$array['name']}\n";
            $emailText .= "Email: {$array['email']}\n";
            if(!empty($array['phone']))
                $emailText .= "Phone: {$array['phone']}\n";
            $emailText .= "Message: {$array['message']}\n";

            $headers = "From: {$array['firstname']} {$array['name']}<{$array['email']}>\r\nReply-To:{$array['email']}";
                mail($emailTo, "Message venant du site CV", $emailText, $headers);
        }
        echo json_encode($array);
    }

    function isPhone($var){
        return preg_match("/^[0-9 ]*$/", $var);
    }  

    function isEmail($var){
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>