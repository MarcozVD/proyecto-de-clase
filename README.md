# 🛒 Tienda Azul - Proyecto de Clase

¡Bienvenido a **Tienda Azul**! Una aplicación web moderna desarrollada con Laravel para la gestión y venta de productos. Este proyecto destaca por una interfaz limpia, premium y una experiencia de usuario fluida.

---

## ✨ Características Principales

-   **Gestión de Productos (CRUD Full):** Crea, visualiza, edita y elimina productos con facilidad.
-   **Categorización:** Organización de productos por categorías (Tecnología, Hogar, Ropa, etc.).
-   **Galería de Imágenes:** Soporte para subida y visualización de imágenes de productos.
-   **Diseño Premium:** Interfaz responsiva con una paleta de colores profesional, gradientes y micro-animaciones.
-   **Carrito de Compras (Estructura):** Base de datos preparada para integración de carrito con validaciones de integridad referencial.
-   **Validaciones Robustas:** Control de errores en formularios para asegurar datos limpios.

---

## 🚀 Tecnologías Utilizadas

*   **Backend:** [Laravel 12](https://laravel.com/) + PHP 8.2
*   **Base de Datos:** MySQL / MariaDB
*   **Frontend:** Vanilla HTML5, CSS3 con variables modernas y Flexbox/Grid.
*   **Iconografía:** Emojis y estilos CSS personalizados.

---

## 🛠️ Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto localmente:

### 1. Clonar el repositorio
```bash
git clone <tu-url-del-repositorio>
cd proyecto-de-clase
```

### 2. Instalar dependencias
```bash
composer install
npm install
```

### 3. Configuración de Entorno
Copia el archivo de ejemplo y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Base de Datos
Configura tus credenciales de MySQL en el archivo `.env` y ejecuta las migraciones:
```bash
php artisan migrate
```

### 5. Enlace de Almacenamiento (Para imágenes)
```bash
php artisan storage:link
```

### 6. Iniciar Servidor
```bash
php artisan serve
```

---

## 📂 Estructura del Proyecto

*   `app/Http/Controllers/`: Lógica de negocio (Controladores de Productos y Home).
*   `app/Models/`: Modelos Eloquent y relaciones (Product, Category, CardItem).
*   `database/migrations/`: Estructura de tablas y restricciones de llaves foráneas.
*   `resources/views/`: Plantillas Blade para una interfaz dinámica.
*   `public/css/estilos.css`: Todo el diseño visual centralizado.

---

## 🎨 Diseño Visual

El proyecto utiliza un sistema de diseño basado en:
- **Colores:** Primario `#0052a3` (Azul Profundo) con acentos en gradientes.
- **Botones:** Estilos diferenciados para acciones (Editar: Azul suave, Eliminar: Rojo advertencia) con efectos hover dinámicos.
- **Responsividad:** Adaptable a dispositivos móviles y escritorio.

---

## 📄 Licencia

Este proyecto es para fines educativos y de aprendizaje.