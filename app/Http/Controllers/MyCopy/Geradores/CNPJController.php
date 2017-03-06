<?php

namespace App\Http\Controllers\MyCopy\Geradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CNPJController extends Controller
{

    public function gerar(bool $formatacao = true):string{
        $digitosCNPJ = "";

        for ($i = 0; $i < 8; $i++) {
            $digitosCNPJ = $digitosCNPJ . rand(0, 9);
        }

        $digitosCNPJ = $digitosCNPJ . "0001";

        $soma = 0;
        $indice = 5;

        for($i = $indice; $i < 7; $i++) {
            if ($indice == 7) break;
            for ($j = 0; $j < ($indice + 7); $j++) {
                $soma += $digitosCNPJ[$j] * $i;
                $i = ($i == 2) ? 9 : ($i - 1);
            }
            $digitosCNPJ = $digitosCNPJ . strval(($soma % 11 < 2) ? 0 : (11 - ($soma % 11)));
            $i = $indice;
            $indice++;
            $soma = 0;
        }

        return $formatacao ? self::formatar($digitosCNPJ) : $digitosCNPJ;
    }

    /*
     * TODO: Validar o cnpj antes de formatar o cnpj e caso não seja válido lançar uma excessão
     */
    public function formatar(string $cnpj):string {
        $mascara = "##.###.###/####-##";
        for($i = 0; $i < strlen($cnpj); $i++) $mascara = preg_replace("/#/", $cnpj[$i], $mascara, 1);
        return $mascara;
    }

    /*
     * TODO: Validar o cnpj antes de formatar o cnpj e caso não seja válido lançar uma excessão
     */
    public function removerFormatacao(string $cnpj):string{
        for($i = 0; $i < strlen($cnpj); $i++) $cnpj = preg_replace('/\D/', '', $cnpj);
        return $cnpj;
    }

    public function validar(string $cnpj):bool {
        $cnpj = self::removerFormatacao($cnpj);
        if(strlen($cnpj) < 13) {
            return false;
        }

        $digits = preg_split('/-/', self::formatar($cnpj));
        $digitosVerificacao = $digits[1];
        $cnpjDigits = self::removerFormatacao($digits[0]);

        $soma = 0;
        $indice = 5;
        for ($i = $indice; $i < 7; $i++) {
            if ($indice == 7) break;
            for ($j = 0; $j < ($indice + 7); $j++) {
                $soma += $cnpjDigits[$j] * $i;
                $i = ($i == 2) ? 9 : ($i - 1);
            }
            $verificationDigit = $soma % 11 < 2 ? 0 : (11 - ($soma % 11));
            $cnpjDigits = $cnpjDigits . $verificationDigit;
            if($verificationDigit != $digitosVerificacao[$indice-5]) {
                return false;
            }
            $i = $indice;
            $indice++;
            $soma = 0;
        }

        return true;
    }

}
