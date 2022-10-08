<?php


    $nomeCliente = "Wlad";
    $itensCarrinho = 2;
    $cartaoCliente = "NossaLoja";
    $cpfCliente = "12345678912";
    $itensCarrinho = 2;


    function adicionarItem($itensCarrinho): int
    {
        
        $itensCarrinho = ++$itensCarrinho;

        return $itensCarrinho;

    }

    function removerItem($itensCarrinho): int
    {

        $itensCarrinho = --$itensCarrinho;

        return $itensCarrinho;

    }

    function validaCPF($cpfCliente): bool
    {

        if(is_string($cpfCliente)){
            return true;
        }
        else {
            return false;
        }


    }

    function isCartaoLoja($cartaoCliente): bool
    {

        $cartaoloja = "NossaLoja";

        if($cartaoCliente === $cartaoloja){
            return true;
            
        } else{
            return false;
        }
    }

    function descontoCompra($cartaoCliente): bool
    {
        
        if(isCartaoLoja($cartaoCliente) === true){
            
            return true;

        }
        else{
            return false;
        }
    }

    function exibeResumoCompra($nomeCliente, $valorTotalCompra): string
    {

        $resumoCompra = "Nome: " . $nomeCliente . " Subtotal: " . $valorTotalCompra;

        return $resumoCompra;
    }