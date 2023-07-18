# Administracion URA

## Descripción

Es una aplicacion web que permite a los rescatistas guardar las consultas generadas, y llevar un historial del medicamento que se le asigno a casa paciente y mostrar los reportes respecivos.

## Requisitos

- PHP >= 8.0.2
- guzzlehttp/guzzle ^7.2
- laravel-frontend-presets/argon ^2.0
- laravel/framework ^9.19
- laravel/sanctum ^3.0
- laravel/tinker ^2.7
- laravel/ui ^4.2

## Requisitos de desarrollo

- fakerphp/faker ^1.9.1
- laravel/pint ^1.0
- laravel/sail ^1.0.1
- mockery/mockery ^1.4.4
- nunomaduro/collision ^6.1
- phpunit/phpunit ^9.5.10
- spatie/laravel-ignition ^1.0

## Instalación

1. Clona este repositorio en tu directorio local.
2. Ejecuta `composer install` para instalar las dependencias.
3. Crea un archivo `.env` a partir del archivo `.env.example` y configura las variables de entorno necesarias.
4. Genera una clave de aplicación ejecutando `php artisan key:generate`.

## Configuración

- `optimize-autoloader`: true
- `preferred-install`: "dist"
- `sort-packages`: true
- `allow-plugins`: {
  - "pestphp/pest-plugin": true
  - }

## Auto-carga

Este paquete utiliza el siguiente esquema de auto-carga:

- App\\: "app/"
- Database\\Factories\\: "database/factories/"
- Database\\Seeders\\: "database/seeders/"

## Auto-carga de desarrollo

Para las pruebas, se utiliza el siguiente esquema de auto-carga:

- Tests\\: "tests/"

## Scripts

- `post-autoload-dump`: [
  - "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
  - "@php artisan package:discover --ansi"
  - ]
- `post-update-cmd`: [
  - "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
  - ]
- `post-root-package-install`: [
  - "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
  - ]
- `post-create-project-cmd`: [
  - "@php artisan key:generate --ansi"
  - ]

## Contribuir

Si quieres contribuir al desarrollo de Laravel Framework, por favor sigue las siguientes pautas:

1. Haz un fork del repositorio.
2. Crea una rama para tu contribución.
3. Realiza los cambios y mejoras necesarios.
4. Envía un pull request a la rama principal del repositorio.

## Licencia

Este paquete está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.

## Contacto

Para cualquier consulta o pregunta, por favor contáctanos a través de [correo electrónico](mailto:camaleoncode@gmail.com) o visita nuestro sitio web en [https://balmoreramirez.netlify.app/](https://balmoreramirez.netlify.app/).

