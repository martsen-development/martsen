<?php

namespace Tests\Feature\MyCopy;

use App\Http\Controllers\MyCopy\Geradores\CNPJController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CNPJTest extends TestCase
{

    public function removerFormatacao()
    {
        $cnpj = new CNPJController();
        $this->assertStringMatchesFormat("35862021000109", $cnpj->removerFormatacao('35.862.021/0001-09'));
        $this->assertStringMatchesFormat("17387282000124", $cnpj->removerFormatacao('17.387.282/0001-24'));
        $this->assertStringMatchesFormat("16416621000190", $cnpj->removerFormatacao('16.416.621/0001-90'));
        $this->assertStringMatchesFormat("14395144000107", $cnpj->removerFormatacao('14.395.144/0001-07'));
    }

    public function testarFormatacao()
    {
        $cnpj = new CNPJController();
        $this->assertStringMatchesFormat("35.862.021/0001-09", $cnpj->formatar("35862021000109"));
        $this->assertStringMatchesFormat("17.387.282/0001-24", $cnpj->formatar("17387282000124"));
        $this->assertStringMatchesFormat("16.416.621/0001-90", $cnpj->formatar("16416621000190"));
        $this->assertStringMatchesFormat("14.395.144/0001-07", $cnpj->formatar("14395144000107"));
    }

    public function testarGerar()
    {
        $cnpj = new CNPJController();
        $this->assertTrue($cnpj->validar($cnpj->gerar()));
        $this->assertTrue($cnpj->validar($cnpj->gerar()));
        $this->assertTrue($cnpj->validar($cnpj->gerar()));
        $this->assertTrue($cnpj->validar($cnpj->gerar()));
    }

    public function testarValidacao()
    {
        $cnpj = new CNPJController();
        // CNPJ Válidos
        $this->assertTrue($cnpj->validar('35.862.021/0001-09'));
        $this->assertTrue($cnpj->validar('17.387.282/0001-24'));
        $this->assertTrue($cnpj->validar('16.416.621/0001-90'));
        $this->assertTrue($cnpj->validar('14.395.144/0001-07'));

        // CNPJ Inválidos
        $this->assertFalse($cnpj->validar('35.862.024/0001-09'));
        $this->assertFalse($cnpj->validar('17.387.232/0001-24'));
        $this->assertFalse($cnpj->validar('16.416.221/0001-90'));
        $this->assertFalse($cnpj->validar('14.395.244/0001-07'));
    }


}
