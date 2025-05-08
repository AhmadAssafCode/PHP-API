<?php
include 'db.php'; // Include the database connection file
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST,PUT,DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}




try{

    // Read
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $stmt = $db->prepare("SELECT * FROM countries WHERE id = ?");
            $stmt->execute([$id]);
            $country = $stmt->fetch(PDO::FETCH_ASSOC);
            if($country){
                echo json_encode($country);
            } else {
                echo json_encode(['message' => "Country with id $id not found"]);
            }
            // Read all
        } else {
            $stmt = $db->query("SELECT * FROM countries");
            $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($countries);
        }
    }

    // Create
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $country = $data['country'];
        $capital = $data['capital'];
        $flag = $data['flag'];

        $stmt = $db->prepare("INSERT INTO countries (country, capital, flag) VALUES (?, ?, ?)");
        $stmt->execute([$country, $capital, $flag]);
        echo json_encode(['message' => 'Country added successfully']);
    }


    // Update
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        //parse_str(file_get_contents('php://input'), $data);
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;
        $country = $data->country;
        $capital = $data->capital;
        $flag = $data->flag;

        $stmt = $db->prepare("UPDATE countries SET country=?, capital=?, flag=? WHERE id=?");
        $stmt->execute([$country, $capital, $flag, intval($id)]);
        if ($stmt->rowCount()) {
            echo json_encode(['message' => 'Country updated successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => "Country with id $id not found or data unchanged"]);
        }
    }

    // Delete
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        //parse_str(file_get_contents('php://input'), $data);
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;

        $stmt = $db->prepare("DELETE FROM countries WHERE id=?");
        $stmt->execute([$id]);
        if ($stmt->rowCount()) {
            echo json_encode(['message' => 'Country deleted successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => "Country with id $id not found or data unchanged"]);
        }
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Operation Failed: ' . $e->getMessage()]);
}

?>
