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
 
 
 
 
