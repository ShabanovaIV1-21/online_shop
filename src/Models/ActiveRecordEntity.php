<?php
namespace Src\Models;
use Src\Services\Db;

abstract class ActiveRecordEntity //объекты класса создать нельзя, но от него можно наследоваться
{
    protected $id;

    public function getId():int
    {
        return $this->id;
    }

    public function __set($name, $value) //вызывается при попытке присвоить значение несуществуующему свойству класса 
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName  = $value;
        // echo "пытаюсь задать для свойства $name значение $value <br>";
        // $his->name = $value;
    }

    private function camelCaseToUnderscore(string $source):string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    private function underscoreToCamelCase(string $source):string  //snakeCase
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function mapPropertiesToDbFormat():array
    {
        $reflector  = new \ReflectionObject($this); //позволяеть получить доступ к названиям свойств объекта
        $properties = $reflector->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore  = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    public static function getById(int $id): ?self
    {
        $db  = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM " . static::getTableName() . " WHERE id=:id",
            [":id" => $id],
            static::class
        );
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities[0] : null;
    }

    public static function findAll():array
    {
        $db  = Db::getInstance();
        return $db->query("SELECT * FROM " . static::getTableName()  . " ;", [], static::class); //вызывается свойство или метод того класса, который его вызывает
    } 

    public function save():void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        // var_dump($mappedProperties);
        if ($this->id  == null) {
            // var_dump($this);
            $this->insert($mappedProperties);
        } else {
            $this->update($mappedProperties);
        }
        // var_dump($mappedProperties);
    }

    private function update(array $mappedProperties):void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . '=' . $param;
            $params2values[$param] = $value;
            $index++;
        }
        $sql = "UPDATE " . static::getTableName() . " SET " . implode(", ", $columns2params) . " WHERE id = $this->id";
        $db  = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    //     var_dump($sql);
    //     var_dump($columns2params);
    //     var_dump($params2values);
    }

    private function insert(array $mappedProperties):void
    {
        $filteredProperties  = array_filter($mappedProperties);
        // var_dump($filteredProperties);
        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $columnName => $value) {
            $columns[]  = '`' . $columnName  . '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }
        // var_dump($columns);
        $columnsViaSemicolon  = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);
        $sql = "INSERT INTO " . static::getTableName() . " ($columnsViaSemicolon) VALUES ($paramsNamesViaSemicolon);";
        // var_dump($sql);
        $db = Db::getInstance();
        // var_dump($sql);
        // var_dump($params2values);
        $db->query($sql, $params2values, static::class);

        // var_dump($db->query($sql, $params2values, static::class));
        $this->id  = $db->getLastInsertId();
        // var_dump($params2values);
        // var_dump($paramsNames);
        // var_dump($mappedProperties);
    }   
    
    public function delete():void
    {
        $sql = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        $db = Db::getInstance();
        $db->query($sql, [":id" => $this->id]);
        $this->id = null;
    }

    public static function findOneByColumn (string $columnName, $value)
    {
        $db = Db::getInstance();
        $result = $db->query("SELECT * FROM " . static::getTableName()  . " WHERE $columnName = :value LIMIT 1;", 
        [":value" => $value], static::class);
        if ($result === []) {
            return null;
        }
        return $result[0];
    }

    // public static function getPagesCount(int $itemPerPage):int
    // {
    //     $db = Db::getInstance();
    //     var_dump("SELECT COUNT * AS cnt FROM " . static::getTableName());
    //     $result = $db->query("SELECT COUNT (1) AS cnt FROM " . static::getTableName());
    //     return ceil($result[0]->cnt / $itemPerPage);
    // }

    public static function getPagesCount(int $itemsPerPage): int
    {
        $db = Db::getInstance();
        $result = $db->query('SELECT COUNT(*) AS cnt FROM ' . static::getTableName() . ';');
        return ceil($result[0]->cnt / $itemsPerPage);
    }

    public static function getPage(int $pageNum, int $itemsPerPage):array
    {
        $db = Db::getInstance();
        return $db->query(
            sprintf(
                "SELECT * FROM %s ORDER BY id DESC LIMIT %d OFFSET %d;",
                static::getTableName(),
                $itemsPerPage,
                ($pageNum - 1) * $itemsPerPage
            ),
            [],
            static::class
        );
    } 

    abstract protected static function getTableName():string; //в наследуемом классе этот метод должен быть определен

}


?>