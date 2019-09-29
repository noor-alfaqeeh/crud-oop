<?php
class category {
    private $connection;
    private $table_name = "categories";
    public $id;
    public $name;

    public function __construct($connection)
    {
        $this->connection=$connection;
    }

    public function get_categories()
    {
        $query="SELECT id,name from"." ".$this->table_name." "."ORDER by name";
        $statement=$this->connection->prepare($query);
        $statement->execute();

        $categories = $statement->fetchall(PDO::FETCH_ASSOC);
        return $categories;
    }
}




?>