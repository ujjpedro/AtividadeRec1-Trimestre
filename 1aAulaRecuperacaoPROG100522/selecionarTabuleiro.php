<?php
require_once "Tabuleiro.class.php";

function exibir($chave, $dados){
    $str = 0;
    foreach($dados as $linha){
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

function listarTabuleiro($idTabuleiro){
    $tab = new tabuleiro("","");
    $lista = $tab->buscarTabuleiro($idTabuleiro);
    return exibir(array('idTabuleiro', 'idTabuleiro'), $lista);
}
?>