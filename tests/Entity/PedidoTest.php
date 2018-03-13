<?php declare(strict_types=1);

namespace Tests\Entity;

use PHPUnit\Framework\TestCase;
use Bling\Entity\Cliente;
use Bling\Entity\Endereco;
use Bling\Entity\Item;
use Bling\Entity\Pedido;
use Tests\Traits\EntityGeneratorTrait;

class PedidoTest extends TestCase
{
    use EntityGeneratorTrait;

    public function testInitialization(): void
    {
        $numeroNotaFiscal = '123';
        $cliente = $this->generateCliente();
        $itens = [$this->generateItems()];
        $valorDesconto = 0;
        $parcelas = [];
        $valorFrete = 0;
        $valorSeguro = 0;
        $valorDespesas = 0;
        $observacao = '';

        $pedido = new Pedido(
            $numeroNotaFiscal,
            $cliente,
            $itens,
            $valorDesconto,
            $parcelas,
            $valorFrete,
            $valorSeguro,
            $valorDespesas,
            $observacao
        );

        $this->assertInstanceOf(Pedido::class, $pedido);
        $this->assertEquals($numeroNotaFiscal, $pedido->getNumeroNotaFiscal());
        $this->assertInstanceOf(Cliente::class, $pedido->getCliente());
        $this->assertInternalType('array', $pedido->getItens());
        $this->assertEquals($valorDesconto, $pedido->getValorDesconto());
        $this->assertInternalType('array', $pedido->getParcelas());
        $this->assertEquals($valorFrete, $pedido->getValorFrete());
        $this->assertEquals($valorSeguro, $pedido->getValorSeguro());
        $this->assertEquals($valorDespesas, $pedido->getValorDespesas());
        $this->assertEquals($observacao, $pedido->getObservacao());
    }


}
