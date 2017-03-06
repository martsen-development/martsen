<?php

namespace Tests\Feature\MyCopy;

use App\Http\Controllers\MyCopy\Conversores\CoresController;
use Tests\TestCase;

class CoresTest extends TestCase
{

    public function testConverterRGBParaHEX()
    {
        $color = new CoresController();

        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb 0, 137, 60"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb 0 137 60"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb(0, 137, 60)"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb(0 137 60)"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("r 0, g 137, b 60"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("red 0, green 137, blue 60"));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("0, 137, 60"));

        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb 0, 137, 60", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb 0 137 60", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb(0, 137, 60)", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("rgb(0 137 60)", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("r 0, g 137, b 60", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("red 0, green 137, blue 60", true, true, true));
        $this->assertEquals("#00893C", $color->converterRGBParaHEX("0, 137, 60", true, true, true));

        $this->assertEquals("00893c", $color->converterRGBParaHEX("rgb 0, 137, 60", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("rgb 0 137 60", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("rgb(0, 137, 60)", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("rgb(0 137 60)", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("r 0, g 137, b 60", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("red 0, green 137, blue 60", true, false, false));
        $this->assertEquals("00893c", $color->converterRGBParaHEX("0, 137, 60", true, false, false));

        $this->assertEquals("00893C", $color->converterRGBParaHEX("rgb 0, 137, 60", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("rgb 0 137 60", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("rgb(0, 137, 60)", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("rgb(0 137 60)", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("r 0, g 137, b 60", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("red 0, green 137, blue 60", true, false, true));
        $this->assertEquals("00893C", $color->converterRGBParaHEX("0, 137, 60", true, false, true));

        $this->assertEquals("#00893c", $color->converterRGBParaHEX("rgb 0, 137, 60", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("rgb 0 137 60", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("rgb(0, 137, 60)", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("rgb(0 137 60)", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("r 0, g 137, b 60", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("red 0, green 137, blue 60", true, true, false));
        $this->assertEquals("#00893c", $color->converterRGBParaHEX("0, 137, 60", true, true, false));

        $this->assertEquals("#07A", $color->converterRGBParaHEX("rgb 0, 119, 170", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("rgb 0 119 170", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("rgb(0, 119, 170)", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("rgb(0 119 170)", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("r 0, g 119, b 170", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("red 0, green 119, blue 170", false, true, true));
        $this->assertEquals("#07A", $color->converterRGBParaHEX("0, 119, 170", false, true, true));

        $this->assertEquals("07A", $color->converterRGBParaHEX("rgb 0, 119, 170", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("rgb 0 119 170", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("rgb(0, 119, 170)", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("rgb(0 119 170)", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("r 0, g 119, b 170", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("red 0, green 119, blue 170", false, false, true));
        $this->assertEquals("07A", $color->converterRGBParaHEX("0, 119, 170", false, false, true));

        $this->assertEquals("#07a", $color->converterRGBParaHEX("rgb 0, 119, 170", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("rgb 0 119 170", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("rgb(0, 119, 170)", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("rgb(0 119 170)", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("r 0, g 119, b 170", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("red 0, green 119, blue 170", false, true, false));
        $this->assertEquals("#07a", $color->converterRGBParaHEX("0, 119, 170", false, true, false));

        $this->assertEquals("07a", $color->converterRGBParaHEX("rgb 0, 119, 170", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("rgb 0 119 170", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("rgb(0, 119, 170)", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("rgb(0 119 170)", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("r 0, g 119, b 170", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("red 0, green 119, blue 170", false, false, false));
        $this->assertEquals("07a", $color->converterRGBParaHEX("0, 119, 170", false, false, false));
    }

    /**
     * @author: Francisco Lucas Sens <francisco.lucas.sens@gmail.com>
     * @author: Lucas Martins <mts.lucasmartins@gmail.com>
     */
    public function testConvertHEXParaRGB()
    {
        $cores = new CoresController();

        $this->assertEquals("rgb 0, 137, 60", $cores->converterHEXParaRGB("#00893C"));
        $this->assertEquals("rgb 0, 137, 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb 0 137 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("rgb(0, 137, 60)", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb(0 137 60)", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("r 0, g 137, b 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO));
        $this->assertEquals("red 0, green 137, blue 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO));
        $this->assertEquals("0, 137, 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA));
        $this->assertEquals("0 137 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_SEM_VIRGULA));

        $this->assertEquals("RGB 0, 137, 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA, true));
        $this->assertEquals("RGB 0 137 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA, true));
        $this->assertEquals("RGB(0, 137, 60)", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA, true));
        $this->assertEquals("RGB(0 137 60)", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA, true));
        $this->assertEquals("R 0, G 137, B 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO, true));
        $this->assertEquals("RED 0, GREEN 137, BLUE 60", $cores->converterHEXParaRGB("#00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO, true));

        $this->assertEquals("rgb 0, 137, 60", $cores->converterHEXParaRGB("00893C"));
        $this->assertEquals("rgb 0, 137, 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb 0 137 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("rgb(0, 137, 60)", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb(0 137 60)", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("r 0, g 137, b 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO));
        $this->assertEquals("red 0, green 137, blue 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO));
        $this->assertEquals("0, 137, 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA));
        $this->assertEquals("0 137 60", $cores->converterHEXParaRGB("00893C", CoresController::NUMERO_FORMATO_RGB_SEM_VIRGULA));

        $this->assertEquals("rgb 0, 136, 68", $cores->converterHEXParaRGB("#084"));
        $this->assertEquals("rgb 0, 136, 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb 0 136 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("rgb(0, 136, 68)", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb(0 136 68)", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("r 0, g 136, b 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO));
        $this->assertEquals("red 0, green 136, blue 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO));
        $this->assertEquals("0, 136, 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA));
        $this->assertEquals("0 136 68", $cores->converterHEXParaRGB("#084", CoresController::NUMERO_FORMATO_RGB_SEM_VIRGULA));


        $this->assertEquals("rgb 0, 136, 68", $cores->converterHEXParaRGB("084"));
        $this->assertEquals("rgb 0, 136, 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb 0 136 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_SEM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("rgb(0, 136, 68)", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_COM_VIRGULA));
        $this->assertEquals("rgb(0 136 68)", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RBG_COM_RGB_ANTES_COM_PARENTESES_SEM_VIRGULA));
        $this->assertEquals("r 0, g 136, b 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_ABREVIACAO));
        $this->assertEquals("red 0, green 136, blue 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA_COM_RGB_DESCRITO));
        $this->assertEquals("0, 136, 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RGB_COM_VIRGULA));
        $this->assertEquals("0 136 68", $cores->converterHEXParaRGB("084", CoresController::NUMERO_FORMATO_RGB_SEM_VIRGULA));
    }
}
