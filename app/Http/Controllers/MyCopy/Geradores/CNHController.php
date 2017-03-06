<?php

namespace App\Http\Controllers\MyCopy\Geradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CNHController extends Controller {

    public function gerar():string {
        $digitosCNH = "";
        $incrementoSegundoVerificador = 0;
        $primeiroVerificador = 0;
        $segundoVerificador = 0;
        $soma = 0;
        $mult = 9;
        for($i = 0; $i < 2; $i++) {
            for($j =0; $j < 9; $j++) {
                if($i == 1 && $mult == 0) $mult = 1;
                if($i == 0) $digitosCNH = $digitosCNH . rand(0, 9);
                $soma += $digitosCNH[$j]  * $mult;
                $mult = $i == 0 ?  $mult - 1 : $mult + 1;
            }
            if($i == 0){
                $primeiroVerificador = ($soma % 11 > 9) ? 0 : $soma % 11;
                if ($soma % 11 == 10) $incrementoSegundoVerificador = -2;  
            }else{
                $segundoVerificador = ((($soma % 11) + $incrementoSegundoVerificador < 0) ? (11 + ($soma % 11) + $incrementoSegundoVerificador) : ($soma % 11) + $incrementoSegundoVerificador);
                $segundoVerificador = $segundoVerificador > 9 ? 0 : $segundoVerificador;
            }
            $soma = 0;
        }

        $digitosCNH = $digitosCNH . $primeiroVerificador . $segundoVerificador;
        
        return $digitosCNH;   
    }

    public function validar($cnh):bool {
        if(strlen($cnh) < 10) return false;
        $digitosCNH = substr($cnh, 0, 9);
        $digitosVerificadors = substr($cnh, -2);

        $incrementoSegundoVerificador = 0;
        $primeiroVerificador = 0;
        $segundoVerificador = 0;
        $soma = 0;
        $mult = 9;

        for($i = 0; $i < 2; $i++) { 
            for($j =0; $j < 9; $j++) {
                if($i == 1 && $mult == 0) $mult = 1;
                $soma += $digitosCNH[$j]  * $mult;
                $mult = $i == 0 ?  $mult - 1 : $mult + 1;
            }
            if($i == 0){
                $primeiroVerificador = ($soma % 11 > 9) ? 0 : $soma % 11;
                if ($soma % 11 == 10) $incrementoSegundoVerificador = -2;
                if($primeiroVerificador != $digitosVerificadors[0]) return false;
            }else{
                $segundoVerificador = ((($soma % 11) + $incrementoSegundoVerificador < 0) ? (11 + ($soma % 11) + $incrementoSegundoVerificador) : ($soma % 11) + $incrementoSegundoVerificador);
                $segundoVerificador = $segundoVerificador > 9 ? 0 : $segundoVerificador;
                if($segundoVerificador != $digitosVerificadors[1]) return false;
            }
            $soma = 0;
        }
        return true;
    }
}
