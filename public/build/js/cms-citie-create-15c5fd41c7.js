;(function($){

    function Navigation() {
   	 	var _ =  this;

        _.resize();

        $(window).resize(function() {
            _.resize();
        });

   	 	//Events
        $(document).on("click", ".btn-menu, .btn-close", function(e){
            e.preventDefault();
            _.navInit();
            $("select").select2();
        }); 

        //sub-menu
        $(".sub-menu > a").on("click", function(e) {
            e.preventDefault();           

            if(!$(this).parent('.sub-menu').hasClass('active')) {
               $(this).parent('.sub-menu').addClass('active');
            } else {
                $(this).parent('.sub-menu').removeClass('active'); 
            }           
        });

        if($("#page-404").val() != undefined)
        {
            $("body").removeClass('navIsActive');
        }
    }

   	Navigation.prototype.navInit =  function() {
        var _ =  this;
        _.navIsActive() ? _.navInative() : _.navActive();
    };

    Navigation.prototype.navIsActive =  function() {
        return $("body").hasClass('navIsActive');
    };

    Navigation.prototype.navActive =  function() {
        $("body").addClass('navIsActive');
    };

    Navigation.prototype.navInative =  function() {
        $("body").removeClass('navIsActive');
    };

    Navigation.prototype.resize =  function() {

        if (window.matchMedia("(min-width: 992px)").matches) {
          $("body").addClass("navIsActive");
        } else {
           $("body").removeClass("navIsActive");
        }
    };

   	new Navigation();

}(jQuery));
 
 
 
 


"use strict";

var FlexInstance = [];

;(function($) {

    if (window.File && window.FileList && window.FileReader) {
        
        $.each($("input[type='file'].FlexUpload"), function(index, val) {
            FlexInstance[$(this).attr('name')] = new FlexUpload($(this));
        });
    }


    function FlexUpload(el) {
        
        var _   = this;

        _.files = [];

    	this.attr = {
            name: ($(el).attr('name')          != undefined) ? $(el).attr('name') : null,
            entity: ($(el).data('entity')      != undefined) ? $(el).data('entity') : null,
            entityId: ($(el).data('entity-id') != undefined) ? $(el).data('entity-id') : null,
            url: ($(el).data('url')            != undefined) ? $(el).data('url') : "/upload",
            multiple: ($(el).attr('multiple')) ? true: false,
    	}
        
        $(el).wrap('<div class="FlexUpload-drop"></div>');
        ($(el).attr("id")) ? null : $(el).attr("id",_.attr.name);
        $(document).find($(el)).parent('.FlexUpload-drop').prepend('<svg class="box-icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"/></svg>');
        $(document).find($(el)).parent('.FlexUpload-drop').append('<label for="'+_.attr.name +'" class="label-'+_.attr.name +'"><strong>Escolha o arquivo</strong><span class="box-dragndrop"> ou arraste-o aqui</span>.</label><div class="box-uploading">Uploading&hellip; <span class="flex-upload-percentage">0%</span></div><div class="box-error">Error! <span></span>.</div>');
           

    	$(document).on("change", "input[type='file'][name='"+_.attr.name +"']", function(e){

            if(e.target.files.length < 1)
            {
                return false;
            } 

            if (_.attr.entityId == null || _.attr.entityId == '')
            {
                swal({
                  title: 'Desculpe!',
                  text: 'Para efetuar um upload é necessário salvar o item.'
                });
               return false;
            }

            if (e.target.files.length > 15)
            {
                swal("Você utrapassou o limite de upload de 15 arquivos por vez.");
               return false;
            } 

            $(this).parent(".FlexUpload-drop").find(".label-"+ _.attr.name).hide();
            $(this).parent(".FlexUpload-drop").find(".box-uploading").show();
            
            _.files = [];
    		_.files = e.target.files;
            _.upload();            
    	});

        $(document).on('dragleave dragend drop', "input[type='file'][name='"+_.attr.name +"']", function (e) 
        {   e.stopPropagation();
            e.preventDefault();
            $(this).parent('.FlexUpload-drop').removeClass('is-dragover');
        });

        $(document).on('dragover dragenter', "input[type='file'][name='"+_.attr.name +"']", function (e) 
        {   e.stopPropagation();
            e.preventDefault();
            $(this).parent('.FlexUpload-drop').addClass('is-dragover');
        });

        $(document).on('drop', "input[type='file'][name='"+_.attr.name +"']", function (e) 
        {   e.stopPropagation();
            e.preventDefault();

            if (_.attr.entityId == null || _.attr.entityId == '')
            {
                swal({
                  title: 'Desculpe!',
                  text: 'Para efetuar um upload é necessário salvar o item.'
                });

                return false;
            }

            if(e.originalEvent.dataTransfer.files.length < 1 || (e.originalEvent.dataTransfer.files.length > 1 && _.attr.multiple == false))
            {
                return false;
            } 

            if (e.originalEvent.dataTransfer.files.length > 15)
            {
                swal("Você utrapassou o limite de upload de 15 arquivos por vez.");
               return false;
            } 

            $(this).parent(".FlexUpload-drop").find(".label-"+ _.attr.name).hide();
            $(this).parent(".FlexUpload-drop").find(".box-uploading").show();          
            

            _.files  = e.originalEvent.dataTransfer.files;

            _.upload();
        });

        $(document).on("click", ".FlexUpload-Panel-"+ _.attr.name+" .btn-edit", function(e){
            e.preventDefault();

            var _btn = this;

            swal({
              title: 'Editar Informações',
              confirmButtonText: 'Salvar',
              html:
                '<input id="'+ _.attr.name +'_legend" class="swal2-input" value="'+ $(_btn).data('legend') +'" autofocus placeholder="Legenda">' +
                '<input id="'+ _.attr.name +'_credits" class="swal2-input" value="'+ $(_btn).data('credits') +'" placeholder="Creditos">',
              preConfirm: function () {
                return new Promise(function (resolve) {
                  resolve({
                    legend: $('#'+ _.attr.name +'_legend').val(),
                    credits: $('#'+ _.attr.name +'_credits').val(),
                    id: $(_btn).data('id')
                  })
                })
              }
            }).then(function (result) {
              _.update(result);
            }).catch(swal.noop); 
        });

        $(document).on("click", ".FlexUpload-Panel-"+ _.attr.name+" .btn-delete", function(e){
            e.preventDefault();

            _.delete($(this).data('id'));
        });

        this.upload = function() {
            var _ =  this;

            var data = new FormData();

            data.append('entity', _.attr.entity);
            data.append('entityId', _.attr.entityId);
            data.append('multiple', _.attr.multiple);
            data.append('name', _.attr.name);
            data.append('_token', $('meta[name="csrf-token"]').attr('content'));
   
            $.each(_.files, function(key, value) {
               data.append(key, value);
            });

            this.xhr = $.ajax({
                type: 'POST',
                url: _.attr.url,
                data: data,
                dataType: 'json',
                cache: false,
                processData: false, 
                contentType: false,                
                xhr: function() {
                    
                    var xhr = new XMLHttpRequest();

                    xhr.upload.addEventListener('progress', function(e) {
                        _.setProgress(e.loaded, e.total);
                    }, false);

                    return xhr;
                },
                success: function(success) {
                    $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".label-"+ _.attr.name).show();
                    $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-uploading").hide();
                },
                error: function(error) {
                    $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".label-"+ _.attr.name).hide();
                    $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-uploading").hide();
                    $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-error").text(error.statusText).show();
                },
                complete: function(complete) {
                    
                    if(complete.status == 200)
                    {
                        $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".label-"+ _.attr.name).show();
                        $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-error").hide();
                        $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-uploading").hide();
                        _.get();
                        location.reload();
                    }
                }
            });            
        }

        this.setProgress = function(value, from) {
            var _ =  this;

            $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").find(".box-uploading .flex-upload-percentage").html( Math.floor((value / from) * 100) +"%");
        }

        this.get = function() {
            var _ = this;

            $.get(_.attr.url + '?'+ $.param(_.attr), function(data) {
                
                (_.attr.multiple == true) ? _.templateMultiple(data) : _.templateSingle(data);
            });
        }


        this.update =  function(objects) {

            var _ =  this;

            var data = new FormData();

            data.append('entity', _.attr.entity);
            data.append('entityId', _.attr.entityId);
            data.append('multiple', _.attr.multiple);
            data.append('legend', objects.legend);
            data.append('credits', objects.credits);
            data.append('itemId', objects.id);
            data.append('name', _.attr.name);
            data.append('_method', 'PUT');
            data.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: _.attr.url,
                data: data,
                dataType: 'json',
                cache: false,
                processData: false, 
                contentType: false, 
                error: function(error) {
                    swal(error.responseText);
                }, 
                complete: function() {
                    _.get();
                }
            });
        }

        this.delete =  function(id) {

            var _ =  this;

            var data = new FormData();

            data.append('entity', _.attr.entity);
            data.append('entityId', _.attr.entityId);
            data.append('multiple', _.attr.multiple);
            data.append('itemId', id);
            data.append('name', _.attr.name);
            data.append('_method', 'DELETE');
            data.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: _.attr.url,
                data: data,
                dataType: 'json',
                cache: false,
                processData: false, 
                contentType: false, 
                error: function(error) {
                    swal(error.responseText);
                }, 
                complete: function() {
                    _.get();
                }
            });
        }

        this.templateSingle =  function(data) {
            
            if (data.path == null || data.path == "") {
                return false;
            }

            var _ =  this;

            

            var html = '<div class="FlexUpload-Panel FlexUpload-Panel-'+_.attr.name+'">' +
                '<div class="row">' +
                    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item text-center">' +
                        '<article>' + _.loadTemplateFile(data.path) + 

                            '<div class="options">' +
                                '<ul class="vertical-align">' +
                                    '<li>'+
                                        '<a data-id='+ data.id +' title="Excluir" class="btn-delete">'+
                                            '<i class="fa fa-times" aria-hidden="true"></i>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li>'+
                                        '<a data-id='+ data.id +' data-legend="'+ data.legend +'" data-credits="'+ data.credits +'" title="Editar" class="btn-edit">'+
                                            '<i class="fa fa-pencil" aria-hidden="true"></i>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</div>'+
                        '</article>'+
                    '</div>'+
                '</div>'+
            '</div>';

            if($(document).find('.FlexUpload-Panel-'+_.attr.name) !=  undefined) {
                $('.FlexUpload-Panel-'+_.attr.name).remove();
            }

            if(data.path != "") {
               $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").after(html);
            }        

        }

        this.templateMultiple =  function(data) {

            if (data.path == null || data.path == "") {
                return false;
            }

            var _ =  this;

            var html = '<div class="FlexUpload-Panel FlexUpload-Panel-'+ _.attr.name +'"><div class="row">';

            $.each(data, function(key, value) {
                html +=' <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 item">' +
                    '<article>' + _.loadTemplateFile(value.path) +
                        '<div class="options">' +
                           '<ul class="vertical-align">' +
                                '<li>' +
                                    '<a data-id='+ value.id +' title="Excluir" class="btn-delete">' +
                                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                                    '</a>' +
                                '</li>' +
                                '<li>' +
                                    '<a data-id='+ value.id +' data-legend="'+ value.title +'" data-credits="'+ value.subtitle +'" title="Editar" class="btn-edit">' +
                                        '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                                    '</a>' +
                                '</li>' +
                            '</ul>' +
                       '</div>'+
                    '</article>'+
                '</div>';
            });

            html +='</div></div>';

            if($(document).find('.FlexUpload-Panel-'+_.attr.name) !=  undefined) {
                $('.FlexUpload-Panel-'+_.attr.name).remove();
            }

            if(data.length > 0) {
                $("input[type='file'][name='"+_.attr.name +"']").parent(".FlexUpload-drop").after(html);
            }            
        } 

        this.loadTemplateFile =  function(file) {

            var extension = this.getExtension(file);

            var html;

            switch(extension) {
                case "docx":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-docx.jpg"/>';
                    break;
                case "doc":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-docx.jpg"/>';
                    break;
                break;
                case "xls":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-xls.jpg"/>';
                    break;
                break;
                case "csv":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-xls.jpg"/>';
                    break;
                break;
                case "pdf":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-pdf.jpg"/>';
                    break;
                case "swf":
                    html =  '<object width="100%"><param value="'+file+'" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess"><param name="wmode" value="transparent"><embed width="100%" height="120" allowfullscreen="true" type="application/x-shockwave-flash" src="'+file+'" wmode="transparent"></object>';
                    break;
                case "xlsx":
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-icon-xls.jpg"/>';
                    break;
                case "jpg":
                    html =  '<img src="'+file+'"/>';
                    break;
                case "png":
                    html =  '<img src="'+file+'"/>';
                    break;
                case "gif":
                    html =  '<img src="'+file+'"/>';
                    break;
                default:
                    html =  '<img src="'+$("#app_url").val()+'/public/img/icon-file.jpg"/>';
                    break;
            }

            return html;

        };

        this.getExtension =  function(file) {

            var MyFile    = file.substr(file.lastIndexOf('/')+1);
            var result    = MyFile.lastIndexOf('.');
            return result <= 0 ? '' : MyFile.substr(result + 1);
        };

        _.get();
    }    
}(jQuery));

;(function($){

    function Mask() {
   	 	$('[name=phone]').mask('(00) 0000-0000');
        $('[name=cellphone]').mask('(00) 00000-0000');
        $('[name=cpf]').mask('999.999.999-99');
        $("[name=cnpj]").mask("99.999.999/9999-99");
        $("[name=postal_code]").mask("99999-999");
        $('[data-money]').mask('000.000.000.000.000,00', {reverse: true});
        $('[data-integrate]').mask('0#');
        $('[data-percentage]').mask('##0.00', {reverse: true});
        $('[data-cref]').mask('999999-A/AA');
    }

   	new Mask();

}(jQuery));
 
 
 
 

;(function($){

    //C = Countries
    //S = States
    //C = Cities
    // CSC

    function CSC() {

        var _ = this;

        _.API = $("#app_url").val() + "/api/";

        $("select#countries_id").on("change", function()
        {
            _.reset();

            if($(this).val() == "")
            {
                return;
            }

            _.states($(this).val());

        });

        $("select#states_id").on("change", function()
        {
            $("select#cities_id").attr('disabled', true).html('<option value="">Selecione</option>');

            if($(this).val() == "")
            {
                return;
            }

            _.cities($("select#countries_id").val(), $(this).val());
        });

        _.reset();
        _.countries();
    }

    CSC.prototype.countries = function()
    {
        var _ = this;
       
       $.get(this.API + "paises", function(data)
       {
            var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#countries_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#countries_id").attr('disabled', false).html(html);
        }).done(function() {
           if($("select#countries_id").val() != "")
           {
             _.states($("select#countries_id").val());
           }
        });       
    };

    CSC.prototype.states = function(countrie_id)
    {
       var _ = this;

       $.get(this.API + "pais/"+ countrie_id +"/estados", function(data)
       {
           var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#states_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#states_id").attr('disabled', false).html(html);
        }).done(function() {
           if($("select#states_id").val() != "")
           {
             _.cities($("select#countries_id").val(), $("select#states_id").val());
           }
        });       
    };

    CSC.prototype.cities = function(countrie_id, state_id)
    {  
        var _ = this;

       $.get(this.API + "pais/"+ countrie_id +"/estado/"+ state_id +"/cidades", function(data)
       {
           var html = '<option value="">Selecione</option>';

            $.each(data, function(index, value) {
               var selectedStatus = ($("select#cities_id").data('active') == index) ? "selected" : "";
               html += '<option value="'+ index +'" '+ selectedStatus +'>'+ value +'</option>';
            });

           $("select#cities_id").attr('disabled', false).html(html);
       });
    };

    CSC.prototype.reset = function()
    {
        var _ = this;

        $("select#states_id").attr('disabled', true).html('<option value="">Selecione</option>');
        $("select#cities_id").attr('disabled', true).html('<option value="">Selecione</option>');
    }

   	new CSC();

}(jQuery));
;(function($){

    function Select()
    {
        $("select").select2();

        $("select").on("change", function(){
            $("select").select2();
        });

        $(window).resize(function() {
            $("select").select2();
        });
    }

   	new Select();

}(jQuery));
 
 
 
 

//# sourceMappingURL=cms-citie-create.js.map
