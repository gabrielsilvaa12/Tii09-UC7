<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../dao/ClienteDAO.php';
require_once __DIR__ . '/../model/Cliente.php';

$dao = new ClienteDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'listar': // GET
        echo json_encode($dao->getAll());
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida, informar action']);
        break;
}