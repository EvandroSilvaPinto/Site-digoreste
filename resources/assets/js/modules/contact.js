;(function($){

    function Contact() {
   	 	var _ = this;

   	 	var $myForm = $("#contact-form").validate({
            rules: {
                name: { required: true },
                email: { required: true },
                phone: { required: true },
                subject: { required: true },
                content: { required: true }
            },
            messages: {
                name: { required: "Informe seu nome" },
                email: { required: 'Informe o seu email', email: 'Ops, informe um email válido' },
                phone: { required: "Informe o nº do seu telefone" },
                subject: { required: "Informe o assunto" },
                content: { required: "Insira uma mensagem" }
            },
            invalidHandler: function(e) {
                swal({
                    title: "OPS! Você não preencheu todos os campos!",
                    text: "Preencha todos os campos e tente novamente.",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK!",
                    closeOnConfirm: true
                });

            },
            submitHandler: function( form ) {

                $("#contact-form .btn-send").html("Enviando...");
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: $("#app_url").val() + "/contato",
                    data: $( form ).serialize(),
                    success: function(result)
                    {
                        swal({
                            title: result.message,
                            text: "Click no botão para fechar!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Fechar!",
                            closeOnConfirm: true
                        });

                        $("#contact-form .btn-send").html("Enviar");

                        form.reset();
                        grecaptcha.reset();
                    },
                    error: function(response) {
                        var errors = $.parseJSON(response.responseText);
                        
                        swal({
                            title: (errors.message) ? errors.message : "Ops! Houve um erro ao enviar. Tente novamente.",
                            text: "Click no botão para fechar!",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Fechar!",
                            closeOnConfirm: true
                        });

                       
                        $myForm.showErrors(errors);
                        
                        $("#contact-form .btn-send").html("Enviar");
                    }
                });
            }
        }); 
    }

   	new Contact();

}(jQuery));