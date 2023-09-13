<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/deploy', 'DeployController@deploy');
Route::get('/clear', 'DeployController@clear');


Route::get('forgot-password', 'Auth\LoginController@forgot')->name('forgot.password');
Route::post('forgot-password', 'Auth\LoginController@forgotAuth')->name('forgot.auth');



Route::middleware(['auth'])->group(function () {

    /*
    * Carteira
    */
    Route::get('carteira/', 'AlunoCarteiraController@index')->name('carteira.index');
    Route::post('carteira/', 'AlunoCarteiraController@search')->name('carteira.search');
    Route::get('escolacarteira', 'EscolaCarteiraController@index')->name('escolacarteira.index');

    /*
    * EventoEscola
    */
    Route::get('eventoescola/eventofaixa/faixaslist/{id}/{action}', 'EventoEscolaController@eventofaixalist')->name('eventoescola.faixaslist');
    Route::get('eventoescola/modelodata', 'EventoEscolaController@modelodata')->name('eventoescola.modelodata');
    Route::get('eventoescola/modelonumero', 'EventoEscolaController@modelonumero')->name('eventoescola.modelonumero');
    Route::post('eventoescola/eventofaixa/faixagravarimport/{id}', 'EventoEscolaController@faixagravarimport')->name('eventoescola.faixagravarimport');
    Route::post('eventoescola/eventofaixa/faixagravarmanual/{id}', 'EventoEscolaController@faixagravarmanual')->name('eventoescola.faixagravarmanual');
    Route::post('eventoescola/eventofaixa/faixagravar/{id}', 'EventoEscolaController@faixagravar')->name('eventoescola.faixagravar');
    Route::get('eventoescola/eventofaixa/faixanew/{id}', 'EventoEscolaController@faixanew')->name('eventoescola.faixamenu');
    Route::get('eventoescola', 'EventoEscolaController@index')->name('eventoescola.index');
    Route::post('eventoescola/inserir', 'EventoEscolaController@store')->name('eventoescola.inserir');
    Route::get('eventoescola/list', 'EventoEscolaController@list')->name('eventoescola.list');
    Route::get('eventoescola/editar/{id}', 'EventoEscolaController@edit')->name('eventoescola.edit');
    Route::post('eventoescola/update/{id}', 'EventoEscolaController@update')->name('eventoescola.update');
    Route::get('eventoescola/eventofaixa/{id}', 'EventoEscolaController@eventofaixa')->name('eventoescola.eventofaixa');
    Route::get('eventoescola/eventofaixa/RepasseForm/{id}/{action}', 'EventoEscolaController@RepasseForm')->name('eventoescola.repasseform');

    Route::get('eventoescola/eventofaixa/{id}/faixaedit/{faixaEvento}', 'EventoEscolaController@faixaedit')->name('eventoescola.faixaedit');
    Route::post('eventoescola/eventofaixa/{id}/faixaupdate/{faixaEvento}', 'EventoEscolaController@faixaupdate')->name('eventoescola.faixaupdate');
    Route::get('eventoescola/eventofaixa/{id}/faixadelete/{faixaEvento}', 'EventoEscolaController@faixadelete')->name('eventoescola.faixadelete');
    /*
    * AlunoCompra
    */
    Route::post('alunocompra/inserir', 'AlunoCompraController@store')->name('alunocompra.inserir');
    Route::get('alunocompra', 'AlunoCompraController@index')->name('alunocompra.index');
    Route::get('alunocompra/list', 'AlunoCompraController@list')->name('alunocompra.list');
    Route::get('alunocompra/editar/{id}', 'AlunoCompraController@edit')->name('alunocompra.edit');
    Route::post('alunocompra/update/{id}', 'AlunoCompraController@update')->name('alunocompra.update');

    /*
    * Ponto
    */
    Route::post('ponto/inserir', 'PontoController@store')->name('ponto.inserir');
    Route::get('ponto', 'PontoController@index')->name('ponto.index');
    Route::get('ponto/list', 'PontoController@list')->name('ponto.list');
    Route::get('ponto/editar/{id}', 'PontoController@edit')->name('ponto.editar');
    Route::post('ponto/update/{id}', 'PontoController@update')->name('ponto.update');

    /*
    * UsuarioEscolaInformativoAcesso ( Tela Separada )
    */

    Route::post('usuarioescolainformativoacesso/inserir', 'UsuarioEscolaInformativoAcessoController@store')->name('usuarioescolainformativoacesso.inserir');
    Route::get('usuarioescolainformativoacesso', 'UsuarioEscolaInformativoAcessoController@index')->name('usuarioescolainformativoacesso.index');
    Route::get('usuarioescolainformativoacesso/list', 'UsuarioEscolaInformativoAcessoController@list')->name('usuarioescolainformativoacesso.list');
    Route::get('usuarioescolainformativoacesso/editar/{id}', 'UsuarioEscolaInformativoAcessoController@edit')->name('usuarioescolainformativoacesso.edit');
    Route::post('usuarioescolainformativoacesso/update/{id}', 'UsuarioEscolaInformativoAcessoController@update')->name('usuarioescolainformativoacesso.update');

    /*
    * UsuarioEscola
    */
    Route::post('usuarioescola/inserir', 'UsuarioEscolaController@store')->name('usuarioescola.inserir');
    Route::get('usuarioescola', 'UsuarioEscolaController@index')->name('usuarioescola.index');
    Route::get('usuarioescola/list', 'UsuarioEscolaController@list')->name('usuarioescola.list');
    Route::get('usuarioescola/editar/{id}', 'UsuarioEscolaController@edit')->name('usuarioescola.edit');
    Route::post('usuarioescola/update/{id}', 'UsuarioEscolaController@update')->name('usuarioescola.update');

    /*
    * PerfilTela
    */
    Route::post('perfiltela/inserir', 'PerfilTelaController@store')->name('perfiltela.inserir');
    Route::get('perfiltela', 'PerfilTelaController@index')->name('perfiltela.index');
    Route::get('perfiltela/list', 'PerfilTelaController@list')->name('perfiltela.list');
    Route::get('perfiltela/editar/{id}', 'PerfilTelaController@edit')->name('perfiltela.edit');
    Route::post('perfiltela/update/{id}', 'PerfilTelaController@update')->name('perfiltela.update');

    /*
    * Tela
    */
    Route::post('tela/inserir', 'TelaController@store')->name('tela.inserir');
    Route::get('tela', 'TelaController@index')->name('tela.index');
    Route::get('tela/list', 'TelaController@list')->name('tela.list');
    Route::get('tela/editar/{id}', 'TelaController@edit')->name('tela.edit');
    Route::post('tela/update/{id}', 'TelaController@update')->name('tela.update');

    /*
    * InformativoAcesso
    */
    Route::post('informativoacesso/inserir', 'InformativoAcessoController@store')->name('informativoacesso.inserir');;
    Route::get('informativoacesso', 'InformativoAcessoController@index')->name('informativoacesso.index');
    Route::get('informativoacesso/list', 'InformativoAcessoController@list')->name('informativoacesso.list');
    Route::get('informativoacesso/editar/{id}', 'InformativoAcessoController@edit')->name('informativoacesso.edit');
    Route::post('informativoacesso/update/{id}', 'InformativoAcessoController@update')->name('informativoacesso.update');

    /*
    * Evento
    */
    Route::post('evento/inserir', 'EventoController@store')->name('evento.inserir');
    Route::get('evento', 'EventoController@index')->name('evento.index');
    Route::get('evento/list', 'EventoController@list')->name('evento.list');
    Route::get('evento/editar/{id}', 'EventoController@edit')->name('evento.editar');
    Route::post('evento/update/{id}', 'EventoController@update')->name('evento.update');

    /*
    * Usuario
    */
    Route::post('usuario/inserir', 'UsuarioController@store')->name('usuario.inserir');
    Route::get('usuario', 'UsuarioController@index')->name('usuario.index');
    Route::get('usuario/list', 'UsuarioController@list')->name('usuario.list');
    Route::get('usuario/importar', 'UsuarioController@importar')->name('usuario.importar');
    Route::post('usuario/importarGravar', 'UsuarioController@importarGravar')->name('usuario.importarGravar');
    Route::get('usuario/editar/{id}', 'UsuarioController@edit')->name('usuario.editar');
    Route::get('usuario/editaraluno/{id}', 'UsuarioController@editaraluno')->name('usuario.editar-aluno');
    Route::post('usuario/updatealuno/{id}', 'UsuarioController@updatealuno')->name('usuario.update-aluno');
    Route::post('usuario/update/{id}', 'UsuarioController@update')->name('usuario.update');
    Route::get('usuario/modelo', 'UsuarioController@download')->name('usuario.modelo');

    /*
    * Perfil
    */
    Route::post('perfil/inserir', 'PerfilController@store')->name('perfil.inserir');
    Route::get('perfil', 'PerfilController@index')->name('perfil.index');
    Route::get('perfil/list', 'PerfilController@list')->name('perfil.list');
    Route::get('perfil/editar/{id}', 'PerfilController@edit')->name('perfil.editar');
    Route::post('perfil/update/{id}', 'PerfilController@update')->name('perfil.update');

    /*
    * Traducao
    */
    Route::post('traducao/inserir', 'TraducaoController@store')->name('traducao.inserir');
    Route::get('traducao', 'TraducaoController@index')->name('traducao.index');
    Route::get('traducao/list', 'TraducaoController@list')->name('traducao.list');
    Route::get('traducao/editar/{id}', 'TraducaoController@edit')->name('traducao.editar');
    Route::post('traducao/update/{id}', 'TraducaoController@update')->name('traducao.update');

    /*
    * Escola
    */
    Route::get('escola', 'EscolaController@index')->name('escola.index');
    Route::post('escola/inserir', 'EscolaController@store')->name('escola.inserir');
    Route::get('escola/list', 'EscolaController@list')->name('escola.list');
    Route::get('escola/editar/{id}', 'EscolaController@edit')->name('escola.editar');
    Route::get('escola/editarparams/{id}', 'EscolaController@editarparams')->name('escola.editarparams');
    Route::post('escola/updateparams/{id}', 'EscolaController@updateparams')->name('escola.updateparams');
    Route::post('escola/update/{id}', 'EscolaController@update')->name('escola.update');

    /*
    * Rede
    */
    Route::get('rede', 'RedeController@index')->name('rede.index');
    Route::post('rede/inserir', 'RedeController@store')->name('rede.inserir');
    Route::get('rede/list', 'RedeController@list')->name('rede.list');
    Route::get('rede/editar/{id}', 'RedeController@edit')->name('rede.editar');
    Route::post('rede/update/{id}', 'RedeController@update')->name('rede.update');

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout');

});
Auth::routes();

