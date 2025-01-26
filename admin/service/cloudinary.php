<?php 
    require_once __DIR__ . '/../../vendor/autoload.php';

    use Cloudinary\Api\Upload\UploadApi;
    use Cloudinary\Configuration\Configuration;
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    Configuration::instance([
        'cloud' =>[
            'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
            'api_key' => $_ENV['CLOUDINARY_API_KEY'],
            'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
        ],
        'url' => ['secure' => true]
    ]);


    function get_url_from_cloudinary($file,$file_name){
        try{
            if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
                // Subir la imagen a Cloudinary
                $response = (new UploadApi())->upload($file['tmp_name'], [
                    'public_id' => $file_name,  // Nombre del archivo en Cloudinary
                ]);
    
                // Retornar la URL segura de la imagen
                return $response['secure_url']; 
            } else {
                throw new Exception('No se encontró el archivo.');
            }
        }catch (Exception $e){
            echo 'Error al subir la imagen: ' . $e->getMessage();
            return null;
        }
    }


    

