<?php
    function validateRequired($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }

    return true;
}
    function validatehp($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }
    if (!is_numeric($field_list[$field_name])||strlen($field_list[$field_name])<10) {
        $error[] = "- $field_name Nomor hp minimal 10 angka.";
        return false;
    }

    return true;
}    
?>
