<?php

namespace App\service;

class Upload
{
    public function uploadImage($file)
    {

        $image_ext = explode('/', $file['type']);
        $allowed_mime = array('jpg', 'png', 'jpeg', 'gif');

        /**
         * проверяем расширение изображения
         */
        if(in_array($image_ext[1], $allowed_mime)){

            /**
             * проверяем ширину изображения
             */
            $image_params = getimagesize($file["tmp_name"]);

            /**
             * если ибображение больше 320px уменьшаем его
             */
            if($image_params[0] > 320)
            {
                $new_width = 320;
                $new_height = 320 * $image_params[1] / $image_params [0];

                $image_new = \imagecreatetruecolor($new_width,$new_height);

                var_dump($image_ext[1]);
                if($image_ext[1] == 'jpeg')
                {
                    $source = imagecreatefromjpeg($file["tmp_name"]);
                }elseif($image_ext[1] == 'png'){
                    $source = imagecreatefrompng($file["tmp_name"]);
                }

                imagecopyresized($image_new, $source, 0, 0, 0, 0, $new_width, $new_height, $image_params [0], $image_params[1]);

                imagejpeg($image_new, $file["tmp_name"]);
            }

            /**
             * загружаем изображение
             */
            $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/image/";
            $upload_file_path = $upload_path . $file['name'];

            move_uploaded_file($file["tmp_name"], $upload_file_path);
        }else{
            echo "тип изображения должен быть jpg, png, jpeg, gif";
        }

    }
}