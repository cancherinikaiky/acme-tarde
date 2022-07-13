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

/**
 * ####################
 * ###      URL     ###
 * ####################
 */

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    if(strpos($_SERVER['HTTP_HOST'], "localhost")){
        if($path){
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }
    if($path){
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
}