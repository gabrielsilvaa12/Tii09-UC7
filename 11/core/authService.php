<?php

session_start();

require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../model/Usuario.php';
function checkLogin(bool $returnUser = false): ?usuario {
    if(!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit();
    }

    $usuarioDao = new usuarioDAO();
    $usuario = $usuarioDao->getByToken($_SESSION['token']);

    if (!$usuario) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }

    if ($returnUser) {
        return $usuario;
    }
    return null;
}

function logout(): void {
    if (isset($_SESSION['token'])) {
        $usuarioDao = new usuarioDAO();
        $usuario = $usuarioDao->getByToken($_SESSION['token']);
        if ($usuario) {
            $usuarioDao->updateToken($usuario->getId(), null);
        }
    }

    session_unset();
    session_destroy();

    header('Location: login.php');
    exit();
}

function login(): ?usuario {
    if (!isset($_SESSION['token'])) {
        return null;
    }

    $usuarioDao = new usuarioDAO();
    $usuario = $usuarioDao->getByToken($_SESSION['token']);

    if (!$usuario) {
        session_unset();
        session_destroy();
        return null;
    }

    return $usuario;
}