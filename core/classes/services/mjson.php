<?php

/**
 * MJSON.
 * Converte para o (e a partir do) formato JSON.
 * Esta classe é uma adaptação da classe PEAR Services_JSON, conforme disclaimer abaixo.
 * As principais mudanças são:
 * - Definição dos métodos como estáticos (static) e da visibilidade (public/private);
 * - Possibilidade de conversão para objetos Javascript (self::$jsObject = true), ao invés de objeto JSON;
 * - Tratamento de StdClass->scalar como uma string sem aspas (usado na conversão em objetos Javascript);
 * - Inclusão do método MJSON::parse(php_var), para converter para uma string representando um objeto Javascript, ao invés de um objeto JSON.
 * - Alteração do método encode(), para não registrar o cabeçalho (header) JSON.
 * - Strings em objetos Javascript são delimitadas por sigle quote (').
 */
/**
 * Encapsulate JSON utils
 */

class MJSON
{
    static public function encode($value, $options = 0, $depth = 512) {
        return json_encode($value, $options, $depth);
    }

    static public function decode($json, $assoc = FALSE, $depth = 512, $options = 0) {
        return json_decode($json, $assoc, $depth, $options);
    }

    static public function last_error() {
        return json_last_error();
    }

    static public function last_error_msg() {
        return json_last_error_msg();
    }

    static public function is_json($value) {
        if (is_string($value)) {
            $temp = json_decode($value);
            return (json_last_error() == JSON_ERROR_NONE);
        } else {
            return false;
        }
    }

    static public function parse($value) {
        return json_encode($value);
    }
}
