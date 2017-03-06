<?php

namespace App\Http\Controllers\MyCopy\Geradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RGController extends Controller
{

    public function gerar():string {
        $digitosRG = "";
        
        for ($i = 0; $i < 9; $i++) {
            $digitosRG = $digitosRG . rand(0, 9);
        }

        $soma = 0;

        for ($i = 0; $i < strlen($digitosRG); $i++) {
            if ($i == strlen($digitosRG) - 1) {
                $soma += $digitosRG[$i] * 100;
            } else {
                $soma += $digitosRG[$i] * ($i + 2);
            }
        }

        return ($soma % 11 == 0) ? self::formatar($digitosRG) : self::gerar();
    }

    public function formatar($rg) {
        $mascara = "##.###.###-#";
        for($i = 0; $i < strlen($rg); $i++) $mascara = preg_replace("/#/", $rg[$i], $mascara, 1);
        return $mascara;
    }

    public function removerFormatacao($rg):string {
        for($i = 0; $i < strlen($rg); $i++) $rg = preg_replace("/\D/", "", $rg);
        return $rg;
    }

    public function validar($rg):bool {
        $digitosRG = self::removerFormatacao($rg);

        $soma = 0;

        for ($i = 0; $i < strlen($digitosRG); $i++) {
            if ($i == strlen($digitosRG) - 1) {
                $soma += $digitosRG[$i] * 100;
            } else {
                $soma += $digitosRG[$i] * ($i + 2);
            }
        }
        return ($soma % 11 == 0) ? true : false;
    }

}
