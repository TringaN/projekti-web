 

    <!-- // define("HOSTNAME" , "localhost");
    // define("USERNAME" , "root");
    // define("PASSWORD" , "");
    // define("DATABASE" , "crud");

    // $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD,DATABASE);

    // if(!$connection){
    //     die("Connection Failed");
    // }
    // else{
    //     echo "yesss";
    // } -->
    <?php
    class dbconn {
        private $host = "localhost:3307";
        private $username = "tringe";
        private $password = "";
        private $db = "crud";
    
        function startConnection() {
            try {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                // Log error but don't echo it
                error_log("Connection failed: " . $e->getMessage());
                return null;
            }
        }
    }
    ?>
    