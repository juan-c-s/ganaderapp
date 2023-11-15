## Uso
A continuacion la lista de todos los metodos que exponemos en el API, su ruta y los parametros que deberian ser usados para su correcto funcionamiento.

#### events:
Función para listar todos los eventos disponibles.
- Método: **GET**
- Ruta: **/api/events**
- QueryString: `?image=<false|true>`. Si desea que la consulta contenga la imagen en base64 o no.

#### products:
Función para listar todos los productos disponibles.
- Método: **GET**
- Ruta: **/api/products**
- QueryString: `?image=<false|true>`. Si desea que la consulta contenga la imagen en base64 o no.

#### filterByDate
Función para filtrar los eventos por fecha
- Método: **POST**
- Ruta: **/api/events/dateFilter**
- Request body:
```
{
    "date": <filterDate>,
    "events": <eventsToBeFiltered>, 
    "_token": <CSRF_TOKEN>
}
```

#### filterBySupplier
Función para filtrar los productos por supplier
- Método: **POST**
- Ruta: **/api/products/supplierFilter**
- Request body:
```
{
    supplier: <filterSupplier>, 
    products: <productsToBeFiltered>,
    _token: <CSRF_TOKEN>
}
```