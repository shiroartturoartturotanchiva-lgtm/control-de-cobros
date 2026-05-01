# CONCEPTS.md
Explicación detallada de cada carpeta y archivo del proyecto.

---

## Estructura general

```
employee-attendance-system/
├── app/
├── config/
├── public/
├── sql/
├── .env
├── .env.example
├── .gitignore
├── .htaccess
├── README.md
└── CONCEPTS.md
```

---

## `app/`
Contiene toda la lógica de la aplicación. Los alumnos trabajarán principalmente aquí.
No es accesible directamente desde el navegador, solo desde el código.

---

### `app/core/`
Clases base del framework MVC que construimos desde cero.

| Archivo | Descripción |
|---|---|
| `App.php` | Inicializa la aplicación, carga las dependencias principales |
| `Router.php` | Lee la URL del navegador y decide qué Controller y método ejecutar |
| `Controller.php` | Clase abstracta base. Todos los controllers heredan de esta clase |
| `Model.php` | Clase abstracta base. Todos los modelos heredan de esta clase. Contiene la conexión PDO |

---

### `app/controllers/`
Aquí van los controllers del sistema. Cada controller maneja las peticiones del usuario
y conecta los modelos con las vistas.

**Ejemplo de flujo:**
```
Usuario entra a /employees → Router → EmployeeController → Employee (model) → vista employees/index.php
```

---

### `app/models/`
Aquí van los modelos del sistema. Cada modelo representa una tabla de la base de datos
y contiene los métodos para consultar, insertar, actualizar y eliminar registros usando PDO.

**Ejemplo:**
```php
class Employee extends Model {
    // métodos: getAll(), findById(), save(), delete()
}
```

---

### `app/views/`
Aquí van los archivos HTML/PHP que el usuario ve en el navegador.
Cada carpeta representa un módulo del sistema.

| Carpeta | Descripción |
|---|---|
| `layouts/` | Elementos que se repiten en todas las páginas (header, footer, navbar) |
| `home/` | Vista del dashboard principal después del login |
| `employees/` | Vistas del módulo de empleados (listar, crear, editar) |
| `departments/` | Vistas del módulo de departamentos |
| `attendance/` | Vistas del módulo de asistencia y reportes |
| `auth/` | Vistas de autenticación (login, registro) |

---

### `app/views/layouts/`
Archivos que se incluyen en todas las vistas para no repetir código (principio DRY).

| Archivo | Descripción |
|---|---|
| `header.php` | Parte superior de la página: navbar, menú, estilos CSS |
| `footer.php` | Parte inferior de la página: scripts JS, copyright |

**¿Cómo se usan?**
```php
include '../layouts/header.php';
// ... contenido de la vista ...
include '../layouts/footer.php';
```

---

## `config/`

| Archivo | Descripción |
|---|---|
| `database.php` | Clase Database que gestiona la conexión PDO a MariaDB. Lee las credenciales del archivo `.env` |

---

## `public/`
**Única carpeta accesible desde el navegador.** El servidor web apunta aquí.
Los archivos fuera de `public/` no son accesibles directamente por seguridad.

| Archivo/Carpeta | Descripción |
|---|---|
| `index.php` | Punto de entrada único de toda la aplicación. Carga el core y arranca el Router |
| `css/` | Archivos de estilos CSS |
| `js/` | Archivos JavaScript |
| `image/` | Imágenes del sistema (fotos de empleados, íconos) |

---

## `sql/`

| Archivo | Descripción |
|---|---|
| `schema.sql` | Script con todos los `CREATE TABLE`. Se ejecuta una vez para crear la base de datos |
| `seeds.sql` | Script con datos de prueba (`INSERT INTO`). Útil para desarrollar sin cargar datos manualmente |

---

## Archivos raíz

| Archivo | Descripción |
|---|---|
| `.env` | Credenciales reales de la base de datos. **Nunca se sube a GitHub** |
| `.env.example` | Plantilla del `.env` sin datos reales. Se sube a GitHub para que otros sepan qué variables configurar |
| `.gitignore` | Lista de archivos que Git debe ignorar (ej: `.env`) |
| `.htaccess` | Redirige todas las peticiones hacia `public/index.php` para que el Router funcione |
| `README.md` | Información principal del proyecto: descripción, instalación, tecnologías |
| `CONCEPTS.md` | Este archivo. Explicación detallada de cada carpeta y archivo del proyecto |

---

## Flujo completo de una petición

```
Navegador (URL)
     ↓
.htaccess  →  redirige a public/index.php
     ↓
public/index.php  →  carga el core
     ↓
App.php  →  inicializa la aplicación
     ↓
Router.php  →  lee la URL y determina Controller y método
     ↓
Controller  →  procesa la lógica, llama al Model
     ↓
Model (PDO)  →  consulta MariaDB
     ↓
Vista (.php)  →  muestra el resultado al usuario
```


# PHP NO SE PUEDE LEER ENV