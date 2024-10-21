<?php
    require_once("init_pdo.php");

    function get_allusers($pdo){
        //$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $sql = "SELECT * FROM users";
        $exe = $pdo->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function get_specificuser($pdo, $id){
        $sql = "SELECT * FROM users WHERE id = :id" ;
        $stmt = $pdo ->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res ? $res : "user not found";
    }

    function create_user($pdo, $name, $email) {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $pdo->lastInsertId(); 
    }

    function update_user($pdo, $id, $name, $email) {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); 
    }
    
    function delete_user($pdo, $id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    function setHeaders() {
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }


    setHeaders();

    switch($_SERVER["REQUEST_METHOD"]) {

        case 'GET':
            $result = get_allusers($pdo);
            if ($result) {
                exit(json_encode($result)); 
            } else {
                http_response_code(404); 
                exit(json_encode(['message' => 'No users found.']));
            }
            break;
            
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            if (isset($data['name']) && isset($data['email'])) {
                $id = create_user($pdo, $data['name'], $data['email']);
                http_response_code(201);
                exit(json_encode(['id' => $id]));
            } else {
                http_response_code(400); 
                exit(json_encode(['error' => 'Invalid input']));
            }

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            if (isset($data['id']) && isset($data['name']) && isset($data['email'])) {
                $success = update_user($pdo, $data['id'], $data['name'], $data['email']);
                if ($success) {
                    http_response_code(200); 
                    exit(json_encode(['message' => 'User updated successfully']));
                } else {
                    http_response_code(404); 
                    exit(json_encode(['error' => 'User not found']));
                }
            } else {
                http_response_code(400); 
                exit(json_encode(['error' => 'Invalid input']));
            }
        
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"), true);
            if (isset($data['id'])) {
                $success = delete_user($pdo, $data['id']);
                 if ($success) {
                    http_response_code(200); 
                    exit(json_encode(['message' => 'User deleted successfully']));
                } else {
                    http_response_code(404); 
                    exit(json_encode(['error' => 'User not found']));
                }
            } else {
                http_response_code(400);
                exit(json_encode(['error' => 'Invalid input']));
            }
        
         default:
            http_response_code(405); 
            exit(json_encode(['error' => 'Method not allowed']));


    }

?>