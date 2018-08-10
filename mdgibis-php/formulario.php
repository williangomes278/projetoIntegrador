<?php

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$rg = $_POST["rg"];
$aniversario = $_POST["aniversario"];
$cpf = $_POST["cpf"];

$rua = $_POST["rua"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];

$email = $_POST["email"];
$login = $_POST["login"];
$senha = $_POST["pass"];
$confSenha = $_POST["passconfirm"];

$erro = 0;

if (empty($nome))
{echo "Favor digitar seu nome corretamente.<br>"; $erro=1;}

if (empty($sobrenome))
{echo "Favor digitar seu sobrenome corretamente.<br>"; $erro=1;}

if(!is_numeric($rg))
{echo "Preencha o campo rg somente com números.<br>"; $erro = 1;}

function isCPFValido($valor){

    $valor = str_replace(array('.','-','/'), "", $valor);
    $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'):
        return false;
    else:
        for ($t = 9; $t < 11; $t++):
            for ($d = 0, $c = 0; $c < $t; $c++) :
                $d += $cpf{$c} * (($t + 1) - $c);
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d):
                return false;
            endif;
        endfor;
        return true;
    endif;
}

$valor = $cpf;

if(isCPFValido($valor)):
    echo 'CPF válido.<br>';
else:
    echo 'CPF inválido.<br>';
endif;


if (empty($rua))
{echo "Favor digitar sua rua.<br>"; $erro=1;}

if(!is_numeric($numero))
{echo "Preencha o campo número corretamente.<br>"; $erro = 1;}

if (empty($bairro))
{echo "Favor digitar seu bairro.<br>"; $erro=1;}

if (empty($cidade))
{echo "Favor digitar sua cidade.<br>"; $erro=1;}

if (preg_match('/[0-9]{5,5}([-]?[0-9]{3})?$/', $cep)):
    echo 'CEP válido';
else:
    echo 'CEP inválido';
endif;

if(filter_var($email, FILTER_VALIDATE_EMAIL)):
    echo 'E-mail válido.';
else:
    echo 'E-mail inválido.';
endif;
  ?>
