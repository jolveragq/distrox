# Sistema de Gestión de Almacenes, Compras y Ventas

Este proyecto está desarrollado en Laravel y sigue una arquitectura basada en capas, promoviendo la separación de responsabilidades y facilitando la escalabilidad y mantenibilidad del código.

## Estructura de Carpetas

```
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── README.md
├── app
│   ├── Application
│   │   └── UseCases
│   ├── Console
│   │   └── Commands
│   ├── Domain
│   │   ├── Models
│   │   └── Repositories
│   └── Infrastructure
│       ├── Controllers
│       ├── Persistence
│       ├── Providers
│       ├── Requests
│       └── Response
├── artisan
├── bootstrap
├── composer.json
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeders
├── package.json
├── phpunit.xml
├── public
├── resources
│   ├── css
│   ├── js
│   └── views
├── routes
├── storage
├── stubs
└── vite.config.js
```

## Descripción de Carpetas y Archivos Clave

### `.editorconfig`, `.env.example`, `.gitattributes`, `.gitignore`

- **`.editorconfig`**: Define configuraciones de estilo de código para mantener la consistencia entre diferentes editores y entornos de desarrollo.
- **`.env.example`**: Archivo de ejemplo para las variables de entorno necesarias para la configuración del proyecto.
- **`.gitattributes`**: Especifica atributos que Git debe aplicar a los archivos del repositorio.
- **`.gitignore`**: Lista de archivos y carpetas que Git debe ignorar.

### `app/`

Contiene el núcleo de la aplicación, organizado en subdirectorios que representan diferentes capas de la arquitectura.

- **`Application/UseCases`**: Implementa la lógica de negocio específica mediante casos de uso como crear, obtener, listar, actualizar y eliminar entidades (por ejemplo, empresas).
- **`Console/Commands`**: Define comandos personalizados de Artisan, como generadores de código o tareas programadas.
- **`Domain/Models`**: Contiene las entidades del dominio que representan conceptos clave como productos, categorías, almacenes, usuarios, etc.
- **`Domain/Repositories`**: Define interfaces para la abstracción de acceso a datos, permitiendo desacoplar la lógica de negocio de la implementación de persistencia.
- **`Infrastructure/Controllers`**: Gestiona las solicitudes HTTP y coordina las respuestas apropiadas utilizando los casos de uso.
- **`Infrastructure/Persistence`**: Implementa las interfaces de repositorio utilizando Eloquent u otros métodos de acceso a datos.
- **`Infrastructure/Providers`**: Contiene proveedores de servicios, como `AppServiceProvider`, donde se registran los bindings de interfaces a implementaciones concretas.
- **`Infrastructure/Requests`**: Define clases de solicitud que encapsulan y validan los datos entrantes de las solicitudes HTTP.
- **`Infrastructure/Response`**: Contiene clases que estructuran y formatean las respuestas HTTP de manera consistente.

### `artisan`

Script de consola que proporciona una interfaz de línea de comandos para ejecutar comandos de Artisan.

### `bootstrap/`

Contiene archivos que inicializan y configuran la aplicación antes de manejar las solicitudes.

### `composer.json`, `composer.lock`

- **`composer.json`**: Define las dependencias del proyecto y otras configuraciones de Composer.
- **`composer.lock`**: Registra las versiones exactas de las dependencias instaladas para garantizar la consistencia entre entornos.

### `config/`

Incluye archivos de configuración para diversos aspectos de la aplicación, como base de datos, servicios, caché, etc.

### `database/`

- **`factories/`**: Contiene fábricas para generar datos de prueba para las entidades.
- **`migrations/`**: Define las migraciones para crear y modificar las tablas de la base de datos.
- **`seeders/`**: Incluye seeders para poblar la base de datos con datos iniciales.

### `package.json`

Define las dependencias y scripts de Node.js utilizados en el proyecto, como compilación de assets.

### `phpunit.xml`

Archivo de configuración para las pruebas automatizadas utilizando PHPUnit.

### `public/`

Contiene los archivos públicos accesibles desde el navegador, como `index.php`, que es el punto de entrada de la aplicación.

### `resources/`

- **`css/`**: Archivos CSS sin compilar.
- **`js/`**: Archivos JavaScript sin compilar.
- **`views/`**: Vistas Blade que componen la interfaz de usuario.

### `routes/`

Define las rutas de la aplicación, separadas en archivos como `web.php` para rutas web, `api.php` para rutas de API, y `console.php` para comandos de consola.

### `storage/`

Almacena archivos generados por la aplicación, como logs, caché, y archivos cargados por los usuarios.

### `stubs/`

Contiene plantillas utilizadas por Artisan para generar código boilerplate, como controladores, modelos, migraciones, etc.

### `vite.config.js`

Archivo de configuración para Vite, utilizado para la compilación y procesamiento de assets frontend.

## Inyección de Dependencias en `AppServiceProvider`

Laravel utiliza un contenedor de servicios para gestionar la inyección de dependencias. En el archivo `AppServiceProvider`, puedes registrar bindings que definen cómo se resuelven las dependencias en tu aplicación.

Ejemplo:

```php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\CompanyRepositoryInterface;
use App\Infrastructure\Persistence\EloquentCompanyRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CompanyRepositoryInterface::class,
            EloquentCompanyRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
```

En este ejemplo, cuando Laravel necesita una instancia de `CompanyRepositoryInterface`, el contenedor proporcionará una instancia de `EloquentCompanyRepository`.

Para más información sobre la inyección de dependencias y el contenedor de servicios en Laravel, puedes consultar la documentación oficial: [Service Container - Laravel](https://laravel.com/docs/12.x/container).
