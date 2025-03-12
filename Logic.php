<?php require_once ("Conection.php");

class Logic{
    // Bring the method used depending of the action realized in the forms, (always is gonna be post)
    private $method;
    private $conection;
    
    public function __construct(){                 
        // Bring the conexion to db
        $this->conection = new Conection();               

        $this->method = $_SERVER["REQUEST_METHOD"];

        // Executes the handle request in the instantiate
        $this->handleRequest();        
    }
    
    public function handleRequest(){

        // If the method is post means that we are using crud
        if($this->method === "POST"){
            // Brings the action that was used depending of where was used the form
            $action = isset($_POST["action"]) ? $_POST["action"] : null;

            switch ($action) {
                case 'insert':
                    $this->insertGame();            
                    break;
                case 'delete':                        
                    $this->deleteGame();
                    break;
                case 'update':
                    $this->updateGame();            
                    break;
                default:
                // Print a console message if none of the methods were used.
                    echo "asda";
                    break;
            }
            // Redirect to the page index at the end of any crud
            header("Location: index.php");
            exit();
        }
    }
    
    function getGame()
    {
        try {
            // Brings the connection from db.php to be able of execute the queries
            $conn = $this->conection->getConnection(); 
    
            // Query that brings all data from db
            $select = "SELECT * FROM videogames"; 
            // Brings all the data and its storaged all data in result and then is returned
            $result = $conn->query($select); 
            return $result;       
        } catch (\PDOException $e) {
            echo "<script>console.log('\Get failed:');</script>" . $e->getMessage(); // Print a console message if was not completed the instruction
            return null;
        }
    }
    
    function insertGame()
    {
        try {
            // Bring the information that was writen by the user in the modal and are storaged in variables to be used in the query
            $title = $_POST['title'];
            $gender = $_POST['gender'];
            $company = $_POST['company'];
            $year_publ = $_POST['release_date'];
            $total_cost = $_POST['total_cost'];
            
            // Brings the connection from db.php to be able of execute the queries
            $conn = $this->conection->getConnection(); 
    
            // Query to the insertion of a new game
            $insert = 'INSERT INTO videogames (title, gender, company, release_date, total_cost) VALUES (:title, :gen, :com, :yearr, :total)';
            $result = $conn->prepare($insert);
            
            // We give to query the parameter in a safety way and execute the query
            $result->execute([
                ':title' => $title,
                ':gen' => $gender,
                ':com' => $company,
                ':yearr' => $year_publ,
                ':total' => $total_cost
            ]);
            
        } catch (\PDOException $e) {
            echo "<script>console.log('\Insertion failed:');</script>" . $e->getMessage(); // Print a console message if was not completed the instruction
        }
    }
    
    function deleteGame()
    {    
        try {
            // Bring the id of the row of the game that its going to be removed.
            $id = $_POST['delete_id'];        
    
            // Brings the connection from db.php to be able of execute the queries
            $conn = $this->conection->getConnection(); 
    
            // Query to the deletion of a new game
            $delete = 'DELETE FROM videogames WHERE id = :id';        
            $result = $conn->prepare($delete);
    
            // We give to query the parameter in a safety way and execute the query
            $result->execute([
                ':id' => $id
            ]);
        } catch (\PDOException $e) {
            echo "<script>console.log('\Delete failed:');</script>" . $e->getMessage(); // Print a console message if was not completed the instruction
        }
    }
    
    function updateGame()
    {
        try {
            // Bring the id and the information that was writen by the user in the modal and are storaged in variables to be used in the query to the update
            $id = $_POST['delete_id'];
            $title = $_POST['title'];
            $gender = $_POST['gender'];
            $company = $_POST['company'];
            $year_publ = $_POST['release_date'];
            $total_cost = $_POST['total_cost'];
            
            // Brings the connection from db.php to be able of execute the queries
            $conn = $this->conection->getConnection(); 
    
            // We give to query the parameter in a safety way and execute the query
            $update = 'UPDATE videogames SET title = :title, gender = :gen, company = :com, release_date = :yearr, total_cost = :total WHERE id = :id;';
            $result = $conn->prepare($update);
    
            // We give to query the parameter in a safety way and execute the query
            $result->execute([
                ':title' => $title,
                ':gen' => $gender,
                ':com' => $company,
                ':yearr' => $year_publ,
                ':total' => $total_cost,
                ':id'  => $id
            ]);
        } catch (\PDOException $e) {
            echo "<script>console.log('\Update failed:');</script>" . $e->getMessage(); // Print a console message if was not completed the instruction
        }
    }
}

$logic = new Logic();

?>