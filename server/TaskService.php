
<?php

class TaskService {

    private $connection;
    private $task;

    public function __construct(DatabaseConnection $connection, Task $task) {
        $this->connection = $connection->connect();
        $this->task = $task;
    }

    // CREATE
    public function insert() {
        try {
            $query = 'INSERT INTO tb_tasks (name, id_status) VALUES (:name, :id_status)';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':name', $this->task->__get('name'));
            $stmt->bindValue(':id_status', $this->task->__get('id_status'));
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Failed to insert task: ' . $e->getMessage());
        }
    }

    // READ
    public function retrieve() {
        try {
            $query = '
                SELECT 
                    t.id, t.name, s.name AS status
                FROM 
                    tb_tasks AS t
                LEFT JOIN tb_status AS s ON (t.id_status = s.id)
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception('Failed to retrieve tasks: ' . $e->getMessage());
        }
    }

    // UPDATE
    public function update() {
        try {
            $query = 'UPDATE tb_tasks SET name = :name WHERE id = :id';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':name', $this->task->__get('name'));
            $stmt->bindValue(':id', $this->task->__get('id'));
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Failed to update task: ' . $e->getMessage());
        }
    }

    // DELETE
    public function remove() {
        try {
            $query = 'DELETE FROM tb_tasks WHERE id = :id';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $this->task->__get('id'));
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Failed to remove task: ' . $e->getMessage());
        }
    }

    // UPDATE (Mark as Completed)
    public function markAsCompleted() {
        try {
            $query = 'UPDATE tb_tasks SET id_status = :id_status WHERE id = :id';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id_status', $this->task->__get('statusId'));
            $stmt->bindValue(':id', $this->task->__get('id'));
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Failed to mark task as completed: ' . $e->getMessage());
        }
    }

    // READ (Task with Pending)
    public function retrievePending() {
        try {
            $query = '
                SELECT 
                    t.id, s.name, t.name 
                FROM 
                    tb_tasks AS t
                    LEFT JOIN tb_status AS s ON (t.id_status = s.id)
                WHERE
                    t.id_status = :id_status
            ';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id_status', $this->task->__get('statusId'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception('Failed to retrieve pending tasks: ' . $e->getMessage());
        }
    }
}

?>
