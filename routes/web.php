<?php


//para invitados 
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('/', 'Auth\LoginController@login')->name('login');

    
});

Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
     Route::get('/dashboard', 'DashboardController');
    Route::get('/main', function () {
        return view('contenido.contenido');
    })->name('main');
   

    Route::group(['middleware' => ['Almacenero']], function () {
    
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
       // Route::put('/ingreso/actualizar', 'IngresoController@update');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');

    });


    Route::group(['middleware' => ['Vendedor']], function () {
        
        Route::get('/cliente', 'ClienteController@index');
        Route::get('/cliente/selectCliente', 'VentaController@selectCliente');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');

        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');

    });



    Route::group(['middleware' => ['Administrador']], function () {        

         Route::get('/cliente', 'ClienteController@index');
         Route::get('/cliente/selectCliente', 'VentaController@selectCliente');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');

       
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');
    
        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::put('/articulo/eliminar', 'ArticuloController@eliminar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');
    
        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');  
        
        Route::get('/ingreso', 'IngresoController@index');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        // Route::put('/ingreso/actualizar', 'IngresoController@update');
         Route::put('/ingreso/desactivar', 'IngresoController@desactivar');

         Route::get('/venta', 'VentaController@index');
         
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');
        
        
        
    });
    
     //  Route::get('/home', 'HomeController@index')->name('home'); 
 });       
    
    
    
   
    
    
    
    





