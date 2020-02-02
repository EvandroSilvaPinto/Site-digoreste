<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-mail</title>
</head>
<body>
    <div style="background-color: #f5f5f5; margin: 0; font-family: Calibri,Arial,sans-serif; font-size: 13px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: Calibri,Arial,sans-serif; font-size: 12px;">
            <tbody>
                <tr>
                    <td style="background-color:#f5f5f5;padding:15px 0">
                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td style="padding:0 0 10px 0">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="400" style="text-align:left"><p style="font-family:Calibri,Arial,sans-serif;font-size:11px;color:#999999">Isto é um email automático de nosso robô. Por favor, não responda.</p></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color:#f2f2f2;padding:30px 20px;border-left:1px solid #e6e6e6;border-right:1px solid #e6e6e6;border-bottom:2px solid #e6e6e6">
                                        <table width="560" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="280" style="text-align:left">
                                                         <a href="{{url("/")}}" target="_blank">{{!! img('logo.png') !!}}</a>
                                                    </td>
                                                    <td width="280" style="text-align:right;color:#999999;font-size:12px;font-family:Calibri,Arial,sans-serif">
                                                        <a href="{{url("/")}}" style="color:000;text-decoration:underline;font-size:11px;font-family:Calibri,Arial,sans-serif" target="_blank">Página Inicial</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table>
                                            <tr>
                                                <table width="560" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Nome:</span> <span style="font-size: 13px">{{$data->name}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Email:</span> <span style="font-size: 13px">{{$data->email}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Telefone:</span> <span style="font-size: 13px">{{$data->phone}}</span></td>
                                                        </tr> 
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Celular:</span> <span style="font-size: 13px">{{$data->cellphone}}</span></td>
                                                        </tr> 
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Assunto:</span> <span style="font-size: 13px">{{$data->subject}}</span></td>
                                                        </tr>                                                          
                                                        <tr>
                                                            <td style="padding: .2rem 0;"><span style="color: 000; font-size: 15px;">Mensagem:</span> <span style="font-size: 13px">{{$data->text}}</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 40px"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table width="315" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="mailto:{{$data->email}}" target="_blank" style="display:block;padding:10px 0;text-align:center;background-color:#d00910;font-size:16px;color:#fff;font-weight:bold;border-radius:4px;width:315px;margin:0 auto;font-family:Calibri,Arial,sans-serif;text-decoration:none" target="_blank">Responder</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>