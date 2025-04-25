# Sistema de Gestión de Almacenes, Compras y Ventas

Proyecto desarrollado en **Laravel** (backend) y **Angular** (frontend), siguiendo principios de separación de responsabilidades y escalabilidad.

---

## Backend - Laravel

### 📂 Estructura de Carpetas

```
├── app
│   ├── Application
│   ├── Console
│   ├── Domain
│   └── Infrastructure
├── bootstrap
├── config
├── database
├── public
├── routes
├── storage
├── tests
└── vite.config.js
```

### 📚 Descripción de Carpetas Clave

- **app/Application/UseCases**: Lógica de negocio (crear, actualizar, listar, eliminar).
- **app/Domain/Models**: Entidades del dominio (productos, almacenes, usuarios).
- **app/Domain/Repositories**: Interfaces de persistencia de datos.
- **app/Infrastructure**:
  - **Controllers**: Recepción de solicitudes HTTP.
  - **Persistence**: Implementaciones de acceso a datos (Eloquent).
  - **Requests**: Validaciones de solicitudes.
  - **Response**: Formato de respuestas estandarizadas.
- **routes/web.php**: Rutas de acceso web y API.

### ⚙️ Inyección de Dependencias en `AppServiceProvider`

```php
$this->app->bind(
    CompanyRepositoryInterface::class,
    EloquentCompanyRepository::class
);
```

[Documentación Oficial: Service Container - Laravel](https://laravel.com/docs/12.x/container)

---

## Frontend - Angular

### 📂 Estructura de Carpetas (en `frontend/`)

```
├── angular.json
├── src/
│   ├── app/
│   ├── assets/
│   ├── environments/
│   ├── index.html
│   └── main.ts
├── package.json
└── tsconfig.json
```

### 📚 Descripción de Carpetas Clave

- **src/app/**: Componentes, servicios y módulos principales de Angular.
- **src/assets/**: Imágenes, íconos y otros recursos estáticos.
- **src/environments/**: Archivos de entorno (`environment.ts`, `environment.prod.ts`).
- **angular.json**: Configuración de construcción de Angular.
- **package.json**: Dependencias y scripts frontend.

### 🚀 Cómo levantar el Frontend

```bash
# Desde el directorio frontend/
npm install
npm run start
```

- Accede a `http://localhost:4200` para ver el proyecto en desarrollo.

### ⚙️ Compilación para producción

```bash
npm run build
```

- Los archivos se generan en `storage/app/public/`.

### 🌐 Relación con Backend

- El `index.html` y los assets se sirven desde **Laravel** en rutas no-API (`web.php` controla esto).
- Rutas como `/dashboard`, `/productos`, `/ventas` son manejadas directamente por Angular.

---

## 🛠️ Instalación Completa del Proyecto

```bash
# Backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

# Frontend
npm install
npm run build

# Symlink para storage
php artisan storage:link

# Ejecutar servidor local
php artisan serve
```

---

## 🎯 Notas Adicionales

- Laravel API responde en `/api/*`.
- Angular SPA responde para todas las demás rutas (`/{any}`).
- Assets generados (JS, CSS) están almacenados en `storage/app/public/`.

---

# 🚀 ¡Proyecto listo para producción!
