<?php
/**
 * Funções auxiliares 
 * Esse script consta no composer.json para ser incluido automaticamente
 */

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>