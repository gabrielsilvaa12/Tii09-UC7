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

    case 'buscar': // GET
        if ($id) {
            $cliente = $dao->getById($id);
            if ($cliente)
                echo json_encode($cliente);
            else {
                http_response_code(404);
                echo json_encode(["error" => "Cliente não encontrado!"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Você não informou o ID"]);
        }
        break;

        case 'cadastrar': // POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputBody) {
                // Cria um objeto Cliente
                $cliente = new Cliente(
                null, 
                $inputBody['nome'],
                $inputBody['cpf'],
                $inputBody['dataNascimento'],
                $inputBody['ativo']
);

        
                // Chama o método create do DAO, passando o objeto
                if ($dao->create($cliente)) {
                    echo json_encode(['message' => 'Cliente cadastrado com sucesso!']);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Erro ao cadastrar cliente']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID não fornecido ou método incorreto']);
            }
            break;
        

            case 'atualizar': // PUT
                if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $inputBody && $id) {
                    // Cria um objeto Cliente com o ID
                    $cliente = new Cliente(
                        $id,
                        $inputBody['nome'],
                        $inputBody['cpf'],
                        $inputBody['dataNascimento'],
                        $inputBody['ativo']
                    );
            
                    // Chama o método update do DAO
                    if ($dao->update($cliente)) {
                        echo json_encode(['message' => 'Cliente atualizado com sucesso!']);
                    } else {
                        http_response_code(500);
                        echo json_encode(['error' => 'Erro ao atualizar cliente']);
                    }
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'ID não fornecido, dados incompletos ou método incorreto']);
                }
                break;
            

    case 'excluir': // DELETE
        if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if ($dao->delete($id)) {
                echo json_encode(['message' => 'Cliente excluído!']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao excluir!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID não fornecido ou método incorreto']);
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida, informar action']);
        break;
}