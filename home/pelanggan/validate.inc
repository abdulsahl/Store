<?php
    function validateNama($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }

    $pattern = "/^[a-zA-Z\s]+$/";
    
    if (!preg_match($pattern, $field_list[$field_name])) {
        $error[] = "- $field_name hanya boleh huruf.";
        return false;
    }

    return true;
    }

    function validateTelp($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }
    
    if (!is_numeric($field_list[$field_name])&&strlen($field_list[$field_name])<10) {
        $error[] = "- $field_name minimal 10 digit.";
        return false;
    }

    return true;
    }

    function validateAlamat($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }

    $pattern = "/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d\s]+$/";
    
    if (!preg_match($pattern, $field_list[$field_name])) {
        $error[] = "- $field_name isian harus alfanumerik (minimal harus ada 1 angka dan 1 huruf)";
        return false;
    }

    return true;
    }

    function validateRequired($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }

    return true;
    }
?>