<?php

namespace App\Http\Controllers\MyCopy\Geradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CPFController extends Controller {

    public function gerar():string {
        $digitosCPF = "";

        for ($i = 0; $i < 9; $i++) {
            $digitosCPF = $digitosCPF . rand(0, 9);
        }

        $soma = 0;
        for($i= 9; $i < 11; $i++) {
            for($j = 0; $j < $i; $j++) {
                $soma += $digitosCPF[$j] * (($i + 1) - $j);
            }
            $digitoVerificacao = ($soma % 11 < 2) ? 0 : (11 - ($soma-- % 11));
            $digitosCPF = $digitosCPF . $digitoVerificacao;
            
            $soma = 0;
        }

        return $digitosCPF;        
    }

    public function formatar($cpf):string {
        $mascara = "###.###.###-##";
        for($i = 0; $i < strlen($cpf); $i++) $mascara = preg_replace("/#/", $cpf[$i], $mascara, 1);
        return $mascara;
    }

    function removerFormatacao($cpf):string {
        for($i = 0; $i < strlen($cpf); $i++) $cpf = preg_replace("/\D/", "", $cpf);
        return $cpf;
    }

    public function validar($cpf):bool {
        $cpf = self::removerFormatacao($cpf);
        if(strlen($cpf) < 10) return false;

        $digitos = preg_split('/-/', self::formatar($cpf));
        $digitosVerificacao = $digitos[1];
        $digitosCPF = self::removerFormatacao($digitos[0]);

        $soma = 0;
        for($i = 9; $i < 11; $i++) {
            for($j = 0; $j < $i; $j++) {
                $soma += $digitosCPF[$j] * (($i + 1) - $j);
            }
            $digitoVerificacao = ($soma % 11 < 2) ? 0 : (11 - ($soma-- % 11));
            $digitosCPF = $digitosCPF . $digitoVerificacao;
            if($digitoVerificacao != $digitosVerificacao[$i - 9]) return false;
            $soma = 0;
        }

        return true;
    }
    
}
