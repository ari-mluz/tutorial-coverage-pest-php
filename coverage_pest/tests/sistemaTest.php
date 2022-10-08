<?php

require_once 'src/sistema.php';

test('Testa se o cartão do cliente é o cartão da loja.', function(){
    expect(isCartaoLoja("NossaLoja"))->toBeTrue();

});

// test('Testa se o cartão do cliente não é o cartão da loja.', function(){
//    expect(isCartaoLoja("OutraLoja"))->toBeFalse();

// });


test('Testa a adição de itens do carrinho.', function(){
    expect(adicionarItem(2))->toBe(3);
});

test('Testa a remoção de itens do carrinho.', function(){
    expect(removerItem(2))->toEqual(1);
});


test('Testa se o CPF está no formato de string.', function(){
    expect(validaCPF("12345678912"))->toBeTrue();
});

// test('Testa se o CPF não está no formato de string.', function(){
//    expect(validaCPF(12345678912))->toBeFalse();
// });


test('Testa se exibe resumo da compra.', function(){
    expect(exibeResumoCompra("Wlad", 420.5))->toContain("Nome: Wlad Subtotal: 420.5");

});


test('Testa se o desconto será aplicado.', function(){
    expect(descontoCompra("NossaLoja"))->toBeTrue();

});

// test('Testa se o desconto não será aplicado.', function(){
//    expect(descontoCompra("OutraLoja"))->toBeFalse();

// });