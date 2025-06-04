<?php

header('Content-type: Application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../dao/ProdutoDAO.php';
require_once __DIR__ . '/../model/Produto.php';

$dao = new ProdutoDAO();
$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;
$inputData = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'listar':
        echo json_encode($dao->getAll());
        break;

    case 'buscar':
        if ($id) {
            $produto = $dao->getById($id);
            if ($produto) {
                echo json_encode($produto);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Produto não encontrado']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Você não informou o id']);
        }
        break;

    case 'cadastrar':
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputData) {
            $produto = new Produto(
                ($inputData['id'] ?? null),
                ($inputData['nome'] ?? ''),
                ($inputData['preco'] ?? ''),
                ($inputData['ativo'] ?? ''),
                ($inputData['dataDeCadastro'] ?? ''),
                ($inputData['dataDeValidade'] ?? '')
            );

            if ($dao->create($produto)) {
                echo json_encode(['message' => 'Produto cadastrado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao cadastrar produto']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Dados não fornecidos ou incorretos']);
        }
        break;

    case 'atualizar':
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputData && $id) {
            $produto = new Produto(
                ($id ?? null),
                ($inputData['nome'] ?? ''),
                ($inputData['preco'] ?? ''),
                ($inputData['ativo'] ?? ''),
                ($inputData['dataDeCadastro'] ?? ''),
                ($inputData['dataDeValidade'] ?? '')
            );

            if ($dao->update($produto)) {
                http_response_code(200); // troquei de 204 pra 200 pra poder ter JSON
                echo json_encode(['message' => 'Produto atualizado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao atualizar o produto']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Id não fornecido ou dados incorretos']);
        }
        break;

        case 'excluir':
            if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
                if ($dao->delete($id)) {
                    echo json_encode(['success' => true, 'message' => 'Produto excluído']);
                } else {
                    http_response_code(404); // se não deletou, retorna 404
                    echo json_encode(['success' => false, 'error' => 'Produto não encontrado ou erro ao excluir']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Id não fornecido ou método incorreto']);
            }
            break;
        
}