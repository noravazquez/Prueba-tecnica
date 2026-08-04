<?php
// Clase para la conexión
class Connection {
    // CAMBIO 1: El método debe ser protegido o público para que la clase hija lo acceda
    protected function conexion() { 
        try {
            $host = "10.10.127.2";
            $port = "5432";
            $dbname = "uc3g";
            $user = "uc3g";
            $password = "7A?Tk:fJV>(M9+KD";

            $pdo = new PDO(
                "pgsql:host=$host;port=$port;dbname=$dbname",
                $user,
                $password
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // CAMBIO 2: OBLIGATORIO retornar el objeto PDO
            return $pdo; 
        } 
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

abstract class Crud extends Connection {
    private $table;
    protected $pdo;

    public function __construct($table) {
        $this->table = (string) $table;
        $this->pdo = $this->conexion();
    }

    // READ
    public function read() {
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en Read: " . $e->getMessage());
        }
    }

    // UPDATE
    public function update($id, array $data) {
        try {
            $fields = "";
            foreach ($data as $key => $value) {
                $fields .= "{$key} = :{$key}, ";
            }
            $fields = rtrim($fields, ", "); 

            $sql = "UPDATE {$this->table} SET {$fields} WHERE id_curso = :id_filter";
            $stmt = $this->pdo->prepare($sql);

            $data['id_filter'] = $id;

            $stmt->execute($data);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Error en Update: " . $e->getMessage());
        }
    }

    // PATCH
    public function patch($id, array $data) {
        if (empty($data)) return 0;
        return $this->update($id, $data); 
    }

    public function create($titulo, $descripcion) {
        try {
            $sql = "INSERT INTO public.curso (titulo, descripcion, estado, registro_fecha) 
                    VALUES (:titulo, :descripcion, 'A', NOW())";
            
            // Como $pdo es protected en Crud, la clase hija puede usarlo directamente
            $stmt = $this->pdo->prepare($sql);
            
            // Ejecutamos pasando los parámetros limpios
            return $stmt->execute([
                ':titulo' => $titulo,
                ':descripcion' => $descripcion
            ]);
        } catch (PDOException $e) {
            die("Error en Create: " . $e->getMessage());
        }
    }
}

class Curso extends Crud {
    public function __construct() {
        parent::__construct("public.curso");
    }
}
?>
