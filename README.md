# Óptica Sooleil

Proyecto de una óptica.

## Requerimientos 📋

- Xampp.
- PHP 7.1 o superior.
- MySQL
- Cuenta de Paypal Business

Nota: Se puede ejecutar en paquetes binarios como XAMPP, WampServer, Mamp Server, LAMP, hosting, entro otros.

## Instalación y configuración

1. Copiar la carpeta "opticaSooleil" al DocumentRoot del servidor web regularmente es la carpeta htdocs, www o public_html.
2. Crear una base de datos en MySQL con cotejamiento `utf8_spanish_ci` o `utf8mb4_unicode_ci`, en este ejemplo utilizaremos el nombre optica.
3. Importamos el archivo "optica.sql" a la base de datos creada.
4. Para agregar los datos de MySQL abra el archivo `config/database.php` con un editor de texto y establezca la configuración de la base de datos.
```
    private $hostname = "localhost";
    private $database = "optica";
    private $username = "usuario_de_mysql";
    private $password = "password_de_usuario_de_mysql";
    private $charset = "utf8";
```
Nota: Esta configuración es de acceso a MySQL, se debe agregar los datos propios.

5. Para agregar los datos de configuración del sistema abra el archivo `config/config.php` con un editor de texto.

	Deberá agregar los datos de la URL base de la optica y los datos de cifrado.

6. Abrir en un navegador web la ruta del servidor web y la aplicación. http://localhost/opticaSooleil o http://direccion_ip/opticaSooleil

7. Repetir el paso 5 pero con el archivo `admin/config/config.php` para configuración del panel de administración.

	Para abrir el panel de administración deberá ingresar al final de la url `admin`. http://localhost/opticaSooleil/admin

## Autores ✒️
- **Grupo 6** 
