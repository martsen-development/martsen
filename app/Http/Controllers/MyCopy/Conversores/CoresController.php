<?php

namespace App\Http\Controllers\MyCopy\Conversores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @author: Francisco Lucas Sens <francisco.lucas.sens@gmail.com>
 * @author: Lucas Martins <mts.lucasmartins@gmail.com>
 *
 * @description:
 */

class CoresController extends Controller
{

    const
        HEXADECIMAL_LONG_LENGHT = 6,
        HEXADECIMAL_SHORT_LENGHT = 3,

        NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA = 0,
        NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA = 1,
        NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA = 2,
        NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA = 3,
        NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO = 4,
        NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO = 5,
        NUMERO_FORMATO_RGB_COM_VIRGULA = 6,
        NUMERO_FORMATO_RGB_SEM_VIRGULA = 7;

    const
                                                                                        // #00893C
        FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA = "rgb <r/>, <g/>, <b/>",  // rgb 0, 137, 60
        FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA = "rgb <r/> <g/> <b/>",    // rgb 0 137 60
        FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA = "rgb(<r/>, <g/>, <b/>)", // rgb(0, 137, 60)
        FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA = "rgb(<r/> <g/> <b/>)",   // rgb(0 137 60)
        FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO = "r <r/>, g <g/>, b <b/>",          // r 0, g 137, b 60
        FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO = "red <r/>, green <g/>, blue <b/>",   // red 0, green 137, blue 60
        FORMATO_RGB_COM_VIRGULA = "<r/>, <g/>, <b/>",                                   // 0, 137, 60
        FORMATO_RGB_SEM_VIRGULA = "<r/> <g/> <b/>";                                     // 0 137 60

    /**
     * @param array $rgb
     * @param int $formato
     * @param bool $capitalizado
     * @return string
     */
    public function formtatarRGB(array $rgb, int $formato, bool $capitalizado): string
    {

        switch ($formato) {
            case self::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA:
                $resultado = self::FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA;
                break;
            case self::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA:
                $resultado = self::FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA;
                break;
            case self::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA:
                $resultado = self::FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA;
                break;
            case self::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA:
                $resultado = self::FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA;
                break;
            case self::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO:
                $resultado = self::FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO;
                break;
            case self::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO:
                $resultado = self::FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO;
                break;
            case self::NUMERO_FORMATO_RGB_COM_VIRGULA:
                $resultado = self::FORMATO_RGB_COM_VIRGULA;
                break;
            case self::NUMERO_FORMATO_RGB_SEM_VIRGULA:
                $resultado = self::FORMATO_RGB_SEM_VIRGULA;
                break;
        }

        $resultado = preg_replace("/(<r\/>)/", $rgb[0], $resultado);
        $resultado = preg_replace("/(<g\/>)/", $rgb[1], $resultado);
        $resultado = preg_replace("/(<b\/>)/", $rgb[2], $resultado);

        return $capitalizado ? strtoupper($resultado) : strtolower($resultado);
    }

    /**
     * @param string $hex
     * @param int $formato |0
     * @param bool $capitalizado |false
     * @return string
     */
    public function converterHEXParaRGB(string $hex, int $formato = self::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA, bool $capitalizado = false): string
    {
        $hex = preg_replace("/#/", "", $hex);

        if (strlen($hex) == self::HEXADECIMAL_LONG_LENGHT) {
            $red = hexdec(substr($hex, 0, 2));
            $green = hexdec(substr($hex, 2, 2));
            $blue = hexdec(substr($hex, -2));
        } else if (strlen($hex) == self::HEXADECIMAL_SHORT_LENGHT) {
            $red = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $green = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $blue = hexdec(substr($hex, -1) . substr($hex, -1));
        } else {
            return "Hexadecimal Inválido";
        }

        return self::formtatarRGB(array($red, $green, $blue), $formato, $capitalizado);

    }

    /**
     * @param String $rgb
     * @param bool $long
     * @param bool $hashtag
     * @return string
     */
    public function converterRGBParaHEX(String $rgb, bool $long = true, bool $hashtag = true, $capitalizado = true)
    {
        //Encontra combinações de 3 ou mais digitos e salva em $matches
        preg_match_all("/[{\d}]+/", $rgb, $matches);

        $red = $matches[0][0];
        $green = $matches[0][1];
        $blue = $matches[0][2];

        $red = $long ? strlen(dechex($red)) < 2 ? "0" . dechex($red) : dechex($red) : dechex(round($red / 17));
        $green = $long ? strlen(dechex($green)) < 2 ? "0" . dechex($green) : dechex($green) : dechex(round($green / 17));
        $blue = $long ? strlen(dechex($blue)) < 2 ? "0" . dechex($blue) : dechex($blue) : dechex(round($blue / 17));

        $resultado = ($hashtag ? "#" : "") . $red . $green . $blue;
        return $capitalizado ? strtoupper($resultado) : strtolower($resultado);
    }
}

