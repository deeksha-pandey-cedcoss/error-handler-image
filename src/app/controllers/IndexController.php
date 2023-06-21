<?php

use Phalcon\Mvc\Controller;

// defalut controller view
class IndexController extends Controller
{
    public function indexAction()
    {
        //   default action
    }
    public function uploadAction()
    {
        function customError($errno, $errstr)
        {
            echo "<b>Error:</b> [$errno] $errstr<br>";
            echo "Ending Script";
            die();
        }

        //set error handler
        set_error_handler("customError", E_ALL);


        $target_dir = "../assets";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "smily face";
                trigger_error("File is not an image", E_ALL);
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // }
    }
}
