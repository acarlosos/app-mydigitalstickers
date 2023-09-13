<?php

use Illuminate\Support\Facades\Route;

function onlyNumbers($s)
{
    return preg_replace('/\D/', '', $s);
}
function ativo($route, $output = 'active open')
{
    $rota_atual = Route::currentRouteName();

    $s = explode('.', $rota_atual);
    // $output = $rota_atual;
    if (is_array($route)) {
        return in_array($s[0], $route) ? $output : '';
    }

    if ($s[0] == $route) {
        return $output;
    }
}

function mascaraTelefone($phone)
{
    $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
    }

    return $phone; // return number without format
}
function mascaraCpf($value)
{
    return mask($value , '###.###.###-##');
}

function mascaraCnpj($value)
{
    return mask($value , '##.###.###/####-##');
}

function mascaraDinheiro($value)
{
    return number_format($value, 2, ",", ".");
}


function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k])) $maskared .= $val[$k++];
        } else {
            if(isset($mask[$i])) $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

