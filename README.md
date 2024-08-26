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



# API Endpoints
Aca encontraran el listado de los endpoints requeridos y desarrollados

## GET
`Listar productos` [/api/products](#get-api-products) <br/>
`Listar usuarios` [/api/users](#get-api-users) <br/>
`Listar ordenes` [/api/orders](#get-api-orders) <br/>
`Ver productos de la orden` [/api/order/{id}/products](#get-api-order-id) <br/>
## POST
`Login` [/api/login](#post-api-login) <br/>
`Registrar Usuario` [/api/user](#post-api-user) <br/>
`Registrar Producto` [/api/product](#post-api-product) <br/>
`Registrar Orden` [/api/order](#post-api-order) <br/>
`Validar token` [/api/validate-token](#post-api-validate-token) <br/>
## PUT
`Actualizar producto` [/api/product](#put-api-product) <br/>
`Actualizar usuario` [/api/user](#put-api-user) <br/>
`Actualizar contraseña` [/api/user/change-password](#put-api-user-change-password) <br/>
`Actualizar orden al estado en proceso` [/api/order/{id}/status-progress](#put-api-order-id-status-progress) <br/>
`Actualizar orden al estado en delivery` [/api/order/{id}/status-delivery](#put-api-order-id-status-delivery) <br/>
`Actualizar orden al estado en recibido` [/api/order/{id}/status-received](#put-api-order-id-status-received) <br/>
## DELETE
`Eliminar producto` [/api/product](#delete-api-product) <br/>
`Eliminar usuario` [/api/user](#delete-api-user) <br/>

---
### HEADERS
|          Key | Value     |
| -------------:|:--------:
|     `Authorization` |  Bearer  {token}|
|     `Accept` |  application/json|
|     `Content-Type` |  application/json|
---


### GET /api/products
Obtener un listado de productos registrados

**Response**

```
// Sin registros
{
    "data": []
    "error": null,
    "success": 200,
}

o

// Con registros
{
    "data": [
        {
            "id": 1,
            "sku": "SK-0824080813",
            "name": "Producto 0824080813",
            "price": 26.84,
            "stock": 2,
            "id_type_product": 2,
            "type_product": "Vegetales",
            "id_unit_measurement": 2,
            "unit_measurement": "Unidad",
            "tags": [
                "limpieza",
                "detergente"
            ]
        },
        . . .
    ],
    "error": null,
    "success": 200,
}
```

### GET /api/user
Obtener un listado de usuarios registrados

**Response**

```
// Sin registros
{
    "data": []
    "error": null,
    "success": 200,
}

o

// Con registros
{
    "data": [
        {
            "id": 1,
            "code": "20240824080844",
            "name": "Wanda Stracke",
            "lastname": "Botsford",
            "email": "prosacco.deion@gmail.com",
            "phone": "+16519733271",
            "username": "isabell90",
            "password": "",
            "id_position": 2,
            "position": "Venta",
            "id_rol": 3,
            "rol": "Delivery"
        },
        . . .
    ],
    "error": null,
    "success": 200,
}
```


### GET /api/orders
Obtener un listado de las ordenes registradas

**Response**

```
// Sin registros
{
    "data": []
    "error": null,
    "success": 200,
}

o

// Con registros sin historia de estados y sin delivery asignado
{
    "data": [
        {
            "id": 27,
            "vendor": {
                "id": 1,
                "code": "20240824080844",
                "name": "Wanda Stracke",
                "lastname": "Botsford"
            },
            "id_delivery": null,
            "date_delivery": "2024-08-25",
            "id_status": 1,
            "status": "Por atender",
            "total": 1200,
            "created_at": "2024-08-25T01:01:57.000000Z",
            "history": []
        },
        . . .
    ],
    "error": null,
    "success": 200,
}

o

// Con registros con historia de estados y delivery asignado
{
    "data": [
        {
            "id": 27,
            "vendor": {
                "id": 1,
                "code": "20240824080844",
                "name": "Wanda Stracke",
                "lastname": "Botsford"
            },
            "delivery": {
                "id": 11,
                "code": "20240824080850",
                "name": "Jhon Swith",
                "lastname": "Bolson"
            },
            "date_delivery": "2024-08-25",
            "id_status": 4,
            "status": "Recibido",
            "total": 1200,
            "created_at": "2024-08-25T01:01:57.000000Z",
            "history": [
            {
                    "id_status": 2,
                    "status": "En proceso",
                    "created_at": "2024-08-25T05:08:29.000000Z"
                },
                {
                    "id_status": 3,
                    "status": "En delivery",
                    "created_at": "2024-08-25T05:08:36.000000Z"
                },
                {
                    "id_status": 4,
                    "status": "Recibido",
                    "created_at": "2024-08-25T05:08:57.000000Z"
                }
            ]
        },
        . . .
    ],
    "error": null,
    "success": 200,
}
```


### POST /api/login
Login para el sistema

**Parametros**

|          Name | Required |  Type                                                                                                                                                    |
| -------------:|:--------:|:------- |
|     `username` | required | string  | 
|     `password` | required | string  |

**Response**

```
// Sin problemas
{
    "data": {
        "id": 3,
        "code": "20240825060842",
        "name": "admin",
        "lastname": "admin",
        "email": "admin@gmail.com",
        "phone": "952387795",
        "username": "admin",
        "password": "",
        "id_position": 1,
        "position": "Logistica",
        "id_rol": 1,
        "rol": "Encargado",
        "token": "5|moWvyMERVV93EPYQk7VxCuviQzSqXMJZLek86JbF9c322893"
    },
    "error": null,
    "status": 200
}

o

// Con errores en las credenciales
{
    "data": null,
    "error": "Usuario o contraseña incorrecta",
    "status": 400
}
```


### POST /api/validate-token
Login para el sistema

**Parametros**

|          Name | Required |  Type                                                                                                                                                    |
| -------------:|:--------:|:------- |
|     `token` | required | string  |

**Response**

```
// Sin problemas
{
    "data": "Token válido",
    "error": null,
    "status": 202
}

o

// Con errores en las credenciales
{
    "data": "Token inválido",
    "error": null,
    "status": 400
}
```


### POST /api/order
Login para el sistema

**Parametros**

|          Name | Required |  Type     | Descripcion                                                                                                                                               |
| -------------:|:--------:|:-------:|:-----------:|
|     `id_vendor` | required | integer  | id del vendedor
|     `date_delivery` | required | integer  | fecha de entrega
|     `detail` | required | array  | lista de productos agregados
|     `detail.*.id_product` | required | integer  | id del producto
|     `detail.*.quantity` | required | integer  | cantidad del producto
|     `detail.*.price` | required | float  | precio 

**Response**

```
// Sin problemas
{
    "data": {
        "id": 30
    },
    "error": null,
    "status": 201
}

```




### PUT /api/order/{id}/status-progress
Cambiar el estado de una orden a En Proceso

**Parametros**

|          Name | Required |  Type     | Descripcion                                                                                                                                               |
| -------------:|:--------:|:-------:|:-----------:|
|     `id` | required | integer  | id de la orden

**Response**

```
// Sin problemas
{
    "data": null,
    "error": null,
    "status": 200
}

o
 
// Con problemas
{
    "data": null,
    "error": "No se puede cambiar a un estado inferior",
    "status": 400
}

```



### PUT /api/order/{id}/status-delivery
Cambiar el estado de una orden a En Delivery

**Parametros**

|          Name | Required |  Type     | Descripcion                                                                                                                                               |
| -------------:|:--------:|:-------:|:-----------:|
|     `id` | required | integer  | id de la orden

**Response**

```
// Sin problemas
{
    "data": null,
    "error": null,
    "status": 200
}

o 

// Con problemas
{
    "data": null,
    "error": "No se puede cambiar a un estado inferior",
    "status": 400
}

```


### PUT /api/order/{id}/status-received
Cambiar el estado de una orden a Recibido

**Parametros**

|          Name | Required |  Type     | Descripcion                                                                                                                                               |
| -------------:|:--------:|:-------:|:-----------:|
|     `id` | required | integer  | id de la orden

**Response**

```
// Sin problemas
{
    "data": null,
    "error": null,
    "status": 200
}

o 

// Con problemas
{
    "data": null,
    "error": "No se puede cambiar a un estado inferior",
    "status": 400
}

```