<?php

/*
|--------------------------------------------------------------------------
| SEO
|--------------------------------------------------------------------------|
*/
Route::group(['namespace' => 'Seo'], function () {

	Route::get('sitemap', array('as'     => 'sitemap', 'uses' => 'SitemapController@index'));
	Route::get('sitemap.xml', array('as' => 'sitemapxml', 'uses' => 'SitemapController@index'));
	Route::get('feed', array('as'        => 'feed', 'uses' => 'FeedController@index'));
	Route::get('feed.xml', array('as'    => 'feedxml', 'uses' => 'FeedController@index'));
});

/*
|--------------------------------------------------------------------------
| Web Routes Site
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['namespace' => 'Site'], function () {
	Route::get('/', array('as' => 'site-home', 'uses' => 'HomeController@index'));
	Route::get('/contato', array('as' => 'site-contact', 'uses' => 'ContactController@index'));
	Route::post('/contato', array('as' => 'site-contact', 'uses' => 'ContactController@store'));
	Route::get('/quem-somos', array('as' => 'site-abouts', 'uses' => 'AboutsController@index'));
	Route::get('/cardapio', array('as' => 'site-menu', 'uses' => 'MenuController@index'));
	Route::get('/lojas', array('as' => 'site-adress', 'uses' => 'AdressController@index'));
	Route::get('/selector/{id}', array('as' => 'site-selector', 'uses' => 'SelectorController@selector'));
});


/*
|--------------------------------------------------------------------------
| Web Routes CMS
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['namespace' => 'Cms', 'prefix' => 'cms'], function () {
	Route::get('auth', array('as'        => 'cms-auth', 'uses' => 'LoginController@index', 'nickname' => "Login do CMS"));
	Route::post('auth', array('as'       => 'cms-auth', 'uses' => 'LoginController@authenticate', 'nickname' => "Login do CMS"));
	Route::get('auth/logout', array('as' => 'cms-auth-logout', 'uses' => 'LoginController@logout', 'nickname' => "Logout do CMS"));

	Route::group(['middleware' => 'auth:cms'], function () {

		Route::get('/', array('as'                             => 'cms-home', 'uses' => 'HomeController@index', 'nickname' => "Página Inicial"));

		Route::get('usuarios', array('as'                      => 'cms-users', 'uses' => 'UsersController@index', 'nickname' => "Listar Usuários"));
		Route::get('usuario/novo', array('as'                  => 'cms-user-create', 'uses' => 'UsersController@create', 'nickname' => "Criar Usuário"));
		Route::post('usuario/novo', array('as'                 => 'cms-user-create', 'uses' => 'UsersController@store', 'nickname' => "Criar Usuário"));
		Route::get('usuario/{id}', array('as'                  => 'cms-user-show', 'uses' => 'UsersController@show', 'nickname' => "Visualizar Usuário"));
		Route::put('usuario/{id}', array('as'                  => 'cms-user-update', 'uses' => 'UsersController@update', 'nickname' => "Atualizar Usuário"));
		Route::get('usuario/excluir/{id}', array('as'          => 'cms-user-delete', 'uses' => 'UsersController@destroy', 'nickname' => "Excluir Usuário"));

		Route::get('grupos-de-usuarios', array('as'            => 'cms-roles', 'uses' => 'RolesController@index', 'nickname' => "Listar Grupos de Usuários"));
		Route::get('grupo-de-usuario/novo', array('as'         => 'cms-role-create', 'uses' => 'RolesController@create', 'nickname' => "Criar Grupo de Usuário"));
		Route::post('grupo-de-usuario/novo', array('as'        => 'cms-role-create', 'uses' => 'RolesController@store', 'nickname' => "Criar Grupo de Usuário"));
		Route::get('grupo-de-usuario/{id}', array('as'         => 'cms-role-show', 'uses' => 'RolesController@show', 'nickname' => "Visualizar Grupo de Usuário"));
		Route::put('grupo-de-usuario/{id}', array('as'         => 'cms-role-update', 'uses' => 'RolesController@update', 'nickname' => "Atualizar Grupo de Usuário"));
		Route::get('grupo-de-usuario/excluir/{id}', array('as' => 'cms-role-delete', 'uses' => 'RolesController@destroy', 'nickname' => "Excluir Grupo de Usuário"));

		Route::get('paises', array('as'                        => 'cms-countries', 'uses' => 'CountriesController@index', 'nickname' => "Listar Paises"));
		Route::get('pais/novo', array('as'                     => 'cms-countrie-create', 'uses' => 'CountriesController@create', 'nickname' => "Criar Pais"));
		Route::post('pais/novo', array('as'                    => 'cms-countrie-create', 'uses' => 'CountriesController@store', 'nickname' => "Criar Pais"));
		Route::get('pais/{id}', array('as'                     => 'cms-countrie-show', 'uses' => 'CountriesController@show', 'nickname' => "Visualizar Pais"));
		Route::put('pais/{id}', array('as'                     => 'cms-countrie-update', 'uses' => 'CountriesController@update', 'nickname' => "Atualizar Pais"));
		Route::get('pais/excluir/{id}', array('as'             => 'cms-countrie-delete', 'uses' => 'CountriesController@destroy', 'nickname' => "Excluir Pais"));

		Route::get('estados', array('as'                       => 'cms-states', 'uses' => 'StatesController@index', 'nickname' => "Listar Estados"));
		Route::get('estado/novo', array('as'                   => 'cms-state-create', 'uses' => 'StatesController@create', 'nickname' => "Criar Estado"));
		Route::post('estado/novo', array('as'                  => 'cms-state-create', 'uses' => 'StatesController@store', 'nickname' => "Criar Estado"));
		Route::get('estado/{id}', array('as'                   => 'cms-state-show', 'uses' => 'StatesController@show', 'nickname' => "Visualizar Estado"));
		Route::put('estado/{id}', array('as'                   => 'cms-state-update', 'uses' => 'StatesController@update', 'nickname' => "Atualizar Estado"));
		Route::get('estado/excluir/{id}', array('as'           => 'cms-state-delete', 'uses' => 'StatesController@destroy', 'nickname' => "Criar Estado"));

		Route::get('cidades', array('as'                       => 'cms-cities', 'uses' => 'CitiesController@index', 'nickname' => "Listar Cidades"));
		Route::get('cidade/novo', array('as'                   => 'cms-citie-create', 'uses' => 'CitiesController@create', 'nickname' => "Criar Cidade"));
		Route::post('cidade/novo', array('as'                  => 'cms-citie-create', 'uses' => 'CitiesController@store', 'nickname' => "Criar Cidade"));
		Route::get('cidade/{id}', array('as'                   => 'cms-citie-show', 'uses' => 'CitiesController@show', 'nickname' => "Visualizar Cidade"));
		Route::put('cidade/{id}', array('as'                   => 'cms-citie-update', 'uses' => 'CitiesController@update', 'nickname' => "Atualizar Cidade"));
		Route::get('cidade/excluir/{id}', array('as'           => 'cms-citie-delete', 'uses' => 'CitiesController@destroy', 'nickname' => "Excluir Cidade"));

		Route::get('sexos', array('as'                         => 'cms-sexes', 'uses' => 'SexesController@index', 'nickname' => "Listar Sexos"));
		Route::get('sexo/novo', array('as'                     => 'cms-sexe-create', 'uses' => 'SexesController@create', 'nickname' => "Criar Sexo"));
		Route::post('sexo/novo', array('as'                    => 'cms-sexe-create', 'uses' => 'SexesController@store', 'nickname' => "Criar Sexo"));
		Route::get('sexo/{id}', array('as'                     => 'cms-sexe-show', 'uses' => 'SexesController@show', 'nickname' => "Visualizar Sexo"));
		Route::put('sexo/{id}', array('as'                     => 'cms-sexe-update', 'uses' => 'SexesController@update', 'nickname' => "Atualizar Sexo"));
		Route::get('sexo/excluir/{id}', array('as'             => 'cms-sexe-delete', 'uses' => 'SexesController@destroy', 'nickname' => "Excluir Sexo"));

		Route::get('log-de-erros', array('as'                  => 'cms-log-errors', 'uses' => 'Log_errorsController@index', 'nickname' => "Listar Log de Erros"));
		Route::get('log-de-erros/{id}', array('as'             => 'cms-log-errors-show', 'uses' => 'Log_errorsController@show', 'nickname' => "Visualizar Log de Erro"));

		Route::get('slide', array('as'                         => 'cms-slide', 'uses' => 'SlideController@index', 'nickname' => "Listar Slide"));
		Route::get('slide/novo', array('as'                     => 'cms-slide-create', 'uses' => 'SlideController@create', 'nickname' => "Criar Slide"));
		Route::post('slide/novo', array('as'                    => 'cms-slide-create', 'uses' => 'SlideController@store', 'nickname' => "Criar Slide"));
		Route::get('slide/{id}', array('as'                     => 'cms-slide-show', 'uses' => 'SlideController@show', 'nickname' => "Visualizar Slide"));
		Route::put('slide/{id}', array('as'                     => 'cms-slide-update', 'uses' => 'SlideController@update', 'nickname' => "Atualizar Slide"));
		Route::get('slide/excluir/{id}', array('as'             => 'cms-slide-delete', 'uses' => 'SlideController@destroy', 'nickname' => "Excluir Slide"));

		Route::get('referencia', array('as'                         => 'cms-reference', 'uses' => 'ReferenceController@index', 'nickname' => "Listar Referencia"));
		Route::get('referencia/novo', array('as'                     => 'cms-reference-create', 'uses' => 'ReferenceController@create', 'nickname' => "Criar Referencia"));
		Route::post('referencia/novo', array('as'                    => 'cms-reference-create', 'uses' => 'ReferenceController@store', 'nickname' => "Criar Referencia"));
		Route::get('referencia/{id}', array('as'                     => 'cms-reference-show', 'uses' => 'ReferenceController@show', 'nickname' => "Visualizar Referencia"));
		Route::put('referencia/{id}', array('as'                     => 'cms-reference-update', 'uses' => 'ReferenceController@update', 'nickname' => "Atualizar Referencia"));
		Route::get('referencia/excluir/{id}', array('as'             => 'cms-reference-delete', 'uses' => 'ReferenceController@destroy', 'nickname' => "Excluir Referencia"));

		Route::get('summary', array('as'                         => 'cms-summary', 'uses' => 'SummaryController@index', 'nickname' => "Listar foto resumo"));
		Route::get('summary/novo', array('as'                     => 'cms-summary-create', 'uses' => 'SummaryController@create', 'nickname' => "Criar foto resumo"));
		Route::post('summary/novo', array('as'                    => 'cms-summary-create', 'uses' => 'SummaryController@store', 'nickname' => "Criar foto resumo"));
		Route::get('summary/{id}', array('as'                     => 'cms-summary-show', 'uses' => 'SummaryController@show', 'nickname' => "Visualizar foto resumo"));
		Route::put('summary/{id}', array('as'                     => 'cms-summary-update', 'uses' => 'SummaryController@update', 'nickname' => "Atualizar foto resumo"));
		Route::get('summary/excluir/{id}', array('as'             => 'cms-summary-delete', 'uses' => 'SummaryController@destroy', 'nickname' => "Excluir foto resumo"));

		Route::get('social', array('as'                         => 'cms-social', 'uses' => 'SocialController@index', 'nickname' => "Listar Social"));
		Route::get('social/novo', array('as'                     => 'cms-social-create', 'uses' => 'SocialController@create', 'nickname' => "Criar Social"));
		Route::post('social/novo', array('as'                    => 'cms-social-create', 'uses' => 'SocialController@store', 'nickname' => "Criar Social"));
		Route::get('social/{id}', array('as'                     => 'cms-social-show', 'uses' => 'SocialController@show', 'nickname' => "Visualizar Social"));
		Route::put('social/{id}', array('as'                     => 'cms-social-update', 'uses' => 'SocialController@update', 'nickname' => "Atualizar Social"));
		Route::get('social/excluir/{id}', array('as'             => 'cms-social-delete', 'uses' => 'SocialController@destroy', 'nickname' => "Excluir Social"));

		Route::get('media', array('as'                         => 'cms-media', 'uses' => 'MediaController@index', 'nickname' => "Listar Media"));
		Route::get('media/novo', array('as'                     => 'cms-media-create', 'uses' => 'MediaController@create', 'nickname' => "Criar Media"));
		Route::post('media/novo', array('as'                    => 'cms-media-create', 'uses' => 'MediaController@store', 'nickname' => "Criar Media"));
		Route::get('media/{id}', array('as'                     => 'cms-media-show', 'uses' => 'MediaController@show', 'nickname' => "Visualizar Media"));
		Route::put('media/{id}', array('as'                     => 'cms-media-update', 'uses' => 'MediaController@update', 'nickname' => "Atualizar Media"));
		Route::get('media/excluir/{id}', array('as'             => 'cms-media-delete', 'uses' => 'MediaController@destroy', 'nickname' => "Excluir Media"));

		Route::get('abouts', array('as'                         => 'cms-abouts', 'uses' => 'AboutsController@index', 'nickname' => "Listar Quem Somos"));
		Route::get('abouts/novo', array('as'                     => 'cms-abouts-create', 'uses' => 'AboutsController@create', 'nickname' => "Criar Quem Somos"));
		Route::post('abouts/novo', array('as'                    => 'cms-abouts-create', 'uses' => 'AboutsController@store', 'nickname' => "Criar Quem Somos"));
		Route::get('abouts/{id}', array('as'                     => 'cms-abouts-show', 'uses' => 'AboutsController@show', 'nickname' => "Visualizar Quem Somos"));
		Route::put('abouts/{id}', array('as'                     => 'cms-abouts-update', 'uses' => 'AboutsController@update', 'nickname' => "Atualizar Quem Somos"));
		Route::get('abouts/excluir/{id}', array('as'             => 'cms-abouts-delete', 'uses' => 'AboutsController@destroy', 'nickname' => "Excluir Quem Somos"));

		Route::get('adress', array('as'                         => 'cms-adress', 'uses' => 'AdressController@index', 'nickname' => "Listar Lojas"));
		Route::get('adress/novo', array('as'                     => 'cms-adress-create', 'uses' => 'AdressController@create', 'nickname' => "Criar Lojas"));
		Route::post('adress/novo', array('as'                    => 'cms-adress-create', 'uses' => 'AdressController@store', 'nickname' => "Criar Lojas"));
		Route::get('adress/{id}', array('as'                     => 'cms-adress-show', 'uses' => 'AdressController@show', 'nickname' => "Visualizar Lojas"));
		Route::put('adress/{id}', array('as'                     => 'cms-adress-update', 'uses' => 'AdressController@update', 'nickname' => "Atualizar Lojas"));
		Route::get('adress/excluir/{id}', array('as'             => 'cms-adress-delete', 'uses' => 'AdressController@destroy', 'nickname' => "Excluir Lojas"));

		Route::get('category', array('as'                         => 'cms-category', 'uses' => 'CategoryController@index', 'nickname' => "Listar Categoria"));
		Route::get('category/novo', array('as'                     => 'cms-category-create', 'uses' => 'CategoryController@create', 'nickname' => "Criar Categoria"));
		Route::post('category/novo', array('as'                    => 'cms-category-create', 'uses' => 'CategoryController@store', 'nickname' => "Criar Categoria"));
		Route::get('category/{id}', array('as'                     => 'cms-category-show', 'uses' => 'CategoryController@show', 'nickname' => "Visualizar Categoria"));
		Route::put('category/{id}', array('as'                     => 'cms-category-update', 'uses' => 'CategoryController@update', 'nickname' => "Atualizar Categoria"));
		Route::get('category/excluir/{id}', array('as'             => 'cms-category-delete', 'uses' => 'CategoryController@destroy', 'nickname' => "Excluir Categoria"));

		Route::get('subcategory', array('as'                         => 'cms-subcategory', 'uses' => 'SubcategoryController@index', 'nickname' => "Listar Sub Categoria"));
		Route::get('subcategory/novo', array('as'                     => 'cms-subcategory-create', 'uses' => 'SubcategoryController@create', 'nickname' => "Criar Sub Categoria"));
		Route::post('subcategory/novo', array('as'                    => 'cms-subcategory-create', 'uses' => 'SubcategoryController@store', 'nickname' => "Criar Sub Categoria"));
		Route::get('subcategory/{id}', array('as'                     => 'cms-subcategory-show', 'uses' => 'SubcategoryController@show', 'nickname' => "Visualizar Sub Categoria"));
		Route::put('subcategory/{id}', array('as'                     => 'cms-subcategory-update', 'uses' => 'SubcategoryController@update', 'nickname' => "Atualizar Sub Categoria"));
		Route::get('subcategory/excluir/{id}', array('as'             => 'cms-subcategory-delete', 'uses' => 'SubcategoryController@destroy', 'nickname' => "Excluir Sub Categoria"));

		Route::get('product', array('as'                         => 'cms-product', 'uses' => 'ProductController@index', 'nickname' => "Listar Produto"));
		Route::get('product/novo', array('as'                     => 'cms-product-create', 'uses' => 'ProductController@create', 'nickname' => "Criar Produto"));
		Route::post('product/novo', array('as'                    => 'cms-product-create', 'uses' => 'ProductController@store', 'nickname' => "Criar Produto"));
		Route::get('product/{id}', array('as'                     => 'cms-product-show', 'uses' => 'ProductController@show', 'nickname' => "Visualizar Produto"));
		Route::put('product/{id}', array('as'                     => 'cms-product-update', 'uses' => 'ProductController@update', 'nickname' => "Atualizar Produto"));
		Route::get('product/excluir/{id}', array('as'             => 'cms-product-delete', 'uses' => 'ProductController@destroy', 'nickname' => "Excluir Produto"));

		Route::get('contatos', array('as' 					   => 'cms-contact', 'uses' => 'ContactController@index', 'nickname' => "Listar Contatos"));
		Route::get('contatos/{id}', array('as' 				   => 'cms-contact-show', 'uses' => 'ContactController@show', 'nickname' => "Visualizar Contato"));
		Route::put('contatos/{id}', array('as' 				   => 'cms-contact-update', 'uses' => 'ContactController@update', 'nickname' => "Atualizar Contato"));
	});
});

/*
|--------------------------------------------------------------------------
| Web Routes Uploads
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth:cms'], function () {
	Route::get('upload', array('as'    => 'flexUpload', 'uses' => 'FlexUploadController@get', 'nickname' => "Listar Uploads"));
	Route::post('upload', array('as'   => 'flexUpload', 'uses' => 'FlexUploadController@create', 'nickname' => "Criar Upload"));
	Route::put('upload', array('as'    => 'flexUpload', 'uses' => 'FlexUploadController@update', 'nickname' => "Atualizar Upload"));
	Route::delete('upload', array('as' => 'flexUpload', 'uses' => 'FlexUploadController@destroy', 'nickname' => "Exluir Upload"));
});
