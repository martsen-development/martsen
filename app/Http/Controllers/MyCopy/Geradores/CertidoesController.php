<?php

namespace App\Http\Controllers\MyCopy\Geradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertidoesController extends Controller {
    const CERTIDAO_TIPO_NASCIMENTO = "1",
     CERTIDAO_TIPO_CASAMENTO = "2",
     CERTIDAO_TIPO_CASAMENTO_RELIGIOSO = "3",
     CERTIDAO_TIPO_OBITO = "4";
     
    public function gerar($tipo = self::CERTIDAO_TIPO_NASCIMENTO):string {
        $digitosCertidao = self::gerarSequenciaAleatoria(6) . "01" . "55" . "2013" . $tipo . self::gerarSequenciaAleatoria(5) . self::gerarSequenciaAleatoria(3) . self::gerarSequenciaAleatoria(7);
        $soma = 0;
        for($i = 2; $i > 0; $i--){
            $mult = $i;
            for($j = 0; $j < strlen($digitosCertidao); $j++) {
                $soma += $digitosCertidao[$j] * $mult;
                $mult = $mult == 10 ? 0 : $mult + 1;
            }
            $digitosCertidao = $digitosCertidao . (($soma % 11 == 10) ? 1 : $soma % 11);
            $soma = 0;
        }
        
        return self::formatar($digitosCertidao);

    }

    public function formatar($certidao):string {
        $mascara = "###### ## ## #### # ##### ### #######-##";
        for($i = 0; $i < strlen($certidao); $i++) $mascara = preg_replace("/#/", $certidao[$i], $mascara, 1);
        return $mascara;
    }

    public function removerFormatacao($certidao):string {
        for($i = 0; $i < strlen($certidao); $i++) $certidao = preg_replace("/\D/", "", $certidao);
        return $certidao;
    }

    public function validar($certidao):bool {
        $digitosCertidao = self::removerFormatacao($certidao);
        $digitosVerificadores = substr($certidao, -2);
        $soma = 0;
        for($i = 2; $i > 0; $i--){
            $mult = $i;
            for($j = 0; $j < strlen($digitosCertidao); $j++) {
                $soma += $digitosCertidao[$j] * $mult;
                $mult = $mult == 10 ? 0 : $mult + 1;
            }
            if ($i == 2) break;
            if ($digitosVerificadores[$i] != (($soma % 11 == 10) ? 1 : $soma % 11)) return false;
            $soma = 0;
        }
        
        return true;
    }

    public function gerarSequenciaAleatoria($lenght, $min = 0, $max = 9):string {
        $sequencia = "";
        for($i = 0; $i < $lenght; $i++) $sequencia = $sequencia . rand($min, $max);
        return $sequencia;
    }

    public function gerarAnoAleatorio($min, $max):int {
        return rand($min, $max);
    }

}
