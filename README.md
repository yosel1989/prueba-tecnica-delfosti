# Ejercicio Técnico Backend Developer

Esta es una prueba técnica para demostrar mis habilitades y conocimiento en cuanto al manejo de tecnologías de desarrollo para la parte del Back, utilizando PHP Laravel, Mysql , SOLID PRINCIPIOS, Domain Driven Design (DDD), Laravel Sanctum Auth, PHP UNIT.

## Crear la base de datos
    CREATE DATABASE xyzboutique;
## Crear las tablas
Las tablas las cree utilizando las migraciones de laravel
### Estructura de las tablas

#### Tabla positions (puestos)
    id          = llave primaria
    name        = nombre del puesto
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla roles
    id          = llave primaria
    name        = nombre del rol
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla users (usuarios)
    id          = llave primaria
    code        = código del usuario 
    name        = nombres del usuario
    lastname    = apellidos del usuario
    email       = correo del usuario
    phone       = teléfono del usuario
    username    = credencial para logeo
    password    = contraseña
    id_position = id del puesto
    id_rol      = id del rol
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla type_product (tipo de producto)
    id          = llave primaria
    code        = código del tipo de producto
    name        = nombre del tipo de producto
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla unit_measurement (unidad de medida)
    id          = llave primaria
    code        = código de la unidad de medida
    name        = nombre de la unidad de medida
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla product (producto)
    id                  = llave primaria
    sku                 = sku del producto
    name                = nombre del producto
    type_product_id     = id del tipo de producto
    tags                = etiquetas
    price               = precio
    unit_measurement_id = id de la unidad de medida
    stock               = stock del producto
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla order_status (estados de la orden)
    id          = llave primaria
    name        = nombre del estado
    created_at  = fecha creación
    updated_at  = fecha ultima actualización


#### Tabla order (orden)
    id                  = llave primaria
    id_vendor           = id del vendedor
    id_delivery         = id del delivery asignado
    date_delivery       = fecha de entrega
    id_status           = id del estado de la orden
    created_at          = fecha creación
    updated_at          = fecha ultima actualización

#### Tabla order_product (detalle de la orden)
    id_order            = id de la orden
    id_product          = id del producto
    quantity            = cantidad
    price               = precio
    created_at  = fecha creación
    updated_at  = fecha ultima actualización

#### Tabla order_status_history (historia de los estados de la orden)
    id              = llave primaria
    id_order        = id de la orden
    id_status       = id del estado de la orden
    created_at      = fecha creación
    updated_at      = fecha ultima actualización

## Iniciar el proyecto
Una vez ubicados por consola en el folder del proyecto de laravel

#### 1. Instalar paquetes con composer
    composer install
#### 2. Generar key
    php artisan key:generate
#### 3. Crear las tablas con las migraciones
    php artisan migrate
#### 3. Ingresar los valores predefinidos para la tablas tipo de productos, unidades de medidas, roles, estados, puestos
    php artisan db:seed
#### 4. Iniciar el servidor
    php artisan serve