# Clothing Store `CHIRK S.R.L.`

## Instrucciones de instalacion

1. Clonar o descargar este repositorio en htdocs (si usan `XAMPP` ).
2. Tener instalado `composer` y `php^8.2` o superior.
3. Abrir el proyecto en VS CODE o el editor de su gusto.
4. Mediante la termial del IDE que usen, colocar el siguiente comando:

    ```sh

    $: composer install 

    ```
    Se instalaran las dependencias del proyecto y se creara el directorio `/vendor`
5. Una ves que todo este instalado, deben ejecutar `XAMPP` 
6. En `MySQL` deben cargar el archivo `clothing-shop.sql` que esta en el directorio de `database` (el nombre de la DB en MySQL debe ser `clothing-shop`), si cambian de nombre, deben colocar ese nombre el archivo `.env` (archivo de variables de entorno)
7. Una vez configurado todo, para acceder a la parte de administrador es: `localhost:/[nombre_del_directorio]/admin`

   ```sh
    user: admin@mail.com
    password: 1234
   ```
8. Si se quiere acceder a la parte del usuario es: `localhost:/[nombre_del_directorio]/`

