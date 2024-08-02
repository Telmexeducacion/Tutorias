<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Panel index que te envia a la vista segun corresponda
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/PanelTutorias','tutoresController@index')->name('tutor.index');

// Control del manejo de infomación
Route::put('/actualizarContactoBdt/{id}','tutoresController@actualizarDatos')->name('contactos.update');

//registra cuando una tutoria no es efectiva.
Route::get('/SinContacto/{id_biblioteca}','tutoresController@TutoriaNoefectiva')->name('llamada.buzon');
Route::post('/Sincontacto','tutoresController@GuardarNoEfectiva')->name('guardar.buzon');


Route::get('/Panel/tutoria{clavebdt}','tutoresController@ContactoEfectivo')->name('inicio.tutoria');


// Adiciones
Route::view('/','welcome')->name('index');
Route::get('/PanelTutorias/Actualizar/{id}','tutoresController@FormularioActualizarContacto')->name('contactos.form.update');
Route::get('/Pruebas','pruebasController@index')->name('pruebas.index');



Route::get('/Pruebas/form','pruebasController@formularioTelegram')->name('pruebas.form');




Route::get('/Tutoria/sede/{sede}','tutoriaController@panelInicio')->name('panel.tutoria');
Route::get('/Tutoria/Internet/{sede}','tutoriaController@panelConectividad')->name('tutoria.internet');
Route::get('/Tutoria/incidencias/{sede}','tutoriaController@panelIncidencia')->name('tutoria.insidencia');
Route::get('/Tutoria/aplicacion/{sede}','tutoriaController@usobdt')->name('tutoria.uso');
Route::get('/Tutoria/Equipos/{sede}','tutoriaController@equipos')->name('tutoria.equipos');
Route::get('/Tutoria/Edificio/{sede}','tutoriaController@edificio')->name('tutoria.edificio');
Route::get('/Tutoria/VerFicha/{sede}','tutoriaController@ficha')->name('tutoria.ficha');

Route::get('contacto{clave}','tutoresController@getContactos')->name('getContactos');
Route::get('historico{clave}','tutoresController@getHistorico')->name('getHistorico');

// modal pruebas
// Route::get('/ejemplo1/{id}','tutoresController@HistoricoBDT');




Route::get('/CargarBibliotecas','DatosController@FormularioBiblioteca')->name('carga.biblioteca');
Route::post('/carga/bdt','DatosController@ImportarBiblioteca')->name('import.bliblioteca');

Route::get('/cargaContactos','DatosController@FormularioContactos')->name('carga.contactos');
Route::post('/carga/contactosbdt','DatosController@ImportarContactos')->name('import.contactos');

Route::get('/UsuariosCarga','DatosController@Formulariousuarios')->name('carga.contactos');
Route::post('/carga/user','DatosController@ImportarUsuarios')->name('import.user');

Route::get('/info/sede','DatosController@FormularioInfo')->name('carga.info');
Route::post('/carga/info','DatosController@ImportarInfo')->name('import.info');

Route::get('/info/mobiliario','DatosController@FormularioMobiliario')->name('carga.mobiliario');
Route::post('/carga/mobiliario','DatosController@ImportarMobiliario')->name('import.mobiliario');


Route::get('/ficha/{clavebdt}','ReporteController@inicio')->name('ficha.externa');




