# Clothing Store `CHIRK S.R.L.`

## Instrucciones de instalacion

1. Clonar o descargar este repositorio en htdocs (si usan `XAMPP`)
2. Tener instalado `composer`
3. Abrir el proyecto en VS CODE o el editor que quieran
4. Mediante la termial del IDE que usen, colocar el siguiente comando:

    ```sh

    $: composer install 

    ```
    Se instalaran las dependencias del proyecto y se creara el directorio `/vendor`
5. Una ves que todo este instalado, deben ejecutar `XAMPP` 
6. En `MySQL` deben cargar el archivo `ecom_store_main.sql` que esta en el directorio de `database` (el nombre de la DB en MySQL debe ser `ecom_store`), si cambian de nombre, deben colocar ese nombre el archivo `.env`
7. Una vez configurado todo, deben acceder a `localhost/[nombre_del_directorio]/admin`

   ```sh
    user: admin@mail.com
    password: 1234
   ```
--------------------------

NOTA: La parte del usuario todavia me falta completar, por eso no lo subo, una vez que lo tenga avanzado lo subire y si tienen instalado `git/git bash` en sus laptop/pc les sera mas facil actualizar el proyecto segun lo que vaya actualizando en este repositorio, tambien si gustan pueden crear ramas (forks) de este proyecto