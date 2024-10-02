<?php
use PHPUnit\Framework\TestCase;
require_once 'src/Form.php'; // Inclure le fichier contenant la logique

class FormTest extends TestCase {
    
    // Test de validation du nom
    public function testValidateName() {
        // Nom valide
        $this->assertTrue(Form::validateName("Jean"));
        
        // Nom vide
        $this->assertFalse(Form::validateName(""));
        
        // Nom trop court
        $this->assertFalse(Form::validateName("A"));
    }
    
    // Test de validation de l'email
    public function testValidateEmail() {
        // Email valide
        $this->assertTrue(Form::validateEmail("test@example.com"));
        
        // Email invalide
        $this->assertFalse(Form::validateEmail("invalid-email"));
        
        // Email vide
        $this->assertFalse(Form::validateEmail(""));
    }
}
