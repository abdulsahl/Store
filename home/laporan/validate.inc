<?php
    function validateTanggal($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }

    $today = date('Y-m-d');
    if ($field_list[$field_name] < $today) {
        $error[] = "- $field_name tidak boleh hari sebelum hari ini.";
        return false;
    }

    return true;
}

    function validateKeterangan($field_list, $field_name, &$error) {
    if (empty($field_list[$field_name])) {
        $error[] = "- $field_name tidak boleh kosong.";
        return false;
    }


    if (strlen($field_list[$field_name]) < 3) {
        $error[] = "- $field_name minimal 3 karakter.";
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
