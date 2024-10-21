<?php


    require 'vendor/autoload.php'; 

    use PhpOffice\PhpSpreadsheet\IOFactory;


    //   define('_MYSQL_HOST','127.0.0.1');
    //   define('_MYSQL_PORT',3306);
    //   define('_MYSQL_DBNAME','idawdb');
    //   define('_MYSQL_USER','root');
    //   define('_MYSQL_PASSWORD','root');
    //   $conn = new mysqli($host, $username, $password, $database);

    //   if ($conn->connect_error) {
    //     die("fail: " . $conn->connect_error);
    // }
    
    // xlsx file path
    $inputFileName = 'aliments.xls';

try {


    

    $spreadsheet = IOFactory::load($inputFileName);
    $sheet = $spreadsheet->getActiveSheet();

    $highestRow = $sheet->getHighestRow();
    

    for ($rowIndex = 2; $rowIndex <= $highestRow; $rowIndex++) { 
        $rowData = [];

        for ($col = 'A'; $col <= 'F'; $col++) {
            $cellValue = $sheet->getCell($col . $rowIndex)->getValue();
            $rowData[] = $cellValue;
        }

        $id = $rowData[0];     
        $name = $rowData[3];   

        // $sql = "INSERT INTO my_table (id, name) VALUES (?, ?)";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("is", $id, $name);

        // if ($stmt->execute()) {
        //     echo "row {$rowIndex} insert sucessful\n";
        // } else {
        //     echo "fail: " . $stmt->error . "\n";
        // }

         echo `<tr>
                <td>{$rowIndex}</td>
                <td>{$id}</td>
                <td>{$name}</td>
              </tr>`;

    }

} catch(Exception $e) {
    die('error: ' . $e->getMessage());
}

// $conn->close();
?>
