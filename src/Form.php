<?php
class Form {
    // Méthode pour valider le nom
    public static function validateName($name) {
        return !empty($name) && strlen($name) > 2;
    }

    // Méthode pour valider l'email
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
