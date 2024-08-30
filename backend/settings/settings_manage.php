<?php
include '../../config/database.php';
session_start();


if(isset($_POST['nameubtn'])){
    $name = $_POST['name'];
    if($name){
        $id = $_SESSION['author_id'];
        $query = "UPDATE users SET name='$name' WHERE id='$id'";
        mysqli_query($db,$query);
        $_SESSION['author_name'] = $name;
        $_SESSION['name_update'] = 'name update successfull';
        header('location: settings.php');

    }else{
        $_SESSION['name_error'] = 'name error';
        header('location: settings.php');
    }



}


if(isset($_POST['passubtn'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cpass = $_POST['cpass'];


    if($oldpass && $newpass && $cpass){
        $encypt = md5($oldpass);
        $id = $_SESSION['author_id'];

        $match_query = "SELECT COUNT(*) AS 'match' FROM users WHERE id='$id' AND password='$encypt'";
        $connect = mysqli_query($db,$match_query);

        $match = mysqli_fetch_assoc($connect)['match'];

        if($match == 1){
            if($newpass == $cpass){
                $new_encrypt = md5($newpass);
                $query = "UPDATE users SET password='$new_encrypt' WHERE id='$id'";
                mysqli_query($db,$query);
                $_SESSION['pass_update'] = 'password update successfull';
                header('location: settings.php');

            }else{
                $_SESSION['pass_error'] = 'age mila';
                header('location: settings.php');
            }
        }else{
            $_SESSION['pass_error'] = 'pass match kore nai';
            header('location: settings.php');
        }

        // $id = $_SESSION['author_id'];
        // $query = "UPDATE users SET name='$name' WHERE id='$id'";
        // mysqli_query($db,$query);
        // $_SESSION['author_name'] = $name;
        // $_SESSION['name_update'] = 'name update successfull';
        // header('location: settings.php');

    }else{
        $_SESSION['pass_error'] = 'pass error';
        header('location: settings.php');
    }



}



// image start


if(isset($_POST['imageubtn'])){
   
    $image = $_FILES['image']['name'];
    $tmp_path = $_FILES['image']['tmp_name'];


    if($image){
        $id = $_SESSION['author_id'];
        $name = $_SESSION['author_name'];
        $explode = explode('.',$image);
        $extention = end($explode);
        $new_name = $id . "-" . $name . "-" . date("d-m-Y") . '.' . $extention;
        $local_path = "../../public/uploads/profile/".$new_name;

        if(move_uploaded_file($tmp_path,$local_path)){
            $query = "UPDATE users SET image='$new_name' WHERE id='$id'";
            mysqli_query($db,$query);
            header('location: settings.php');
        }else{
            echo "kharap";
        }

    }

    

    // if($name){
    //     $id = $_SESSION['author_id'];
    //     $query = "UPDATE users SET name='$name' WHERE id='$id'";
    //     mysqli_query($db,$query);
    //     $_SESSION['author_name'] = $name;
    //     $_SESSION['name_update'] = 'name update successfull';
    //     header('location: settings.php');

    // }else{
    //     $_SESSION['name_error'] = 'name error';
    //     header('location: settings.php');
    // }

}


?>