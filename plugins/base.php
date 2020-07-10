<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
private $dsn="mysql:host=localhost;charset=utf8;dbname=db77";
private $root ="root";
private $password="";
private $table;
private $pdo;

public function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,$this->root,$this->password);
}
public function all(...$arg)
{

    $sql = "select * from $this->table ";

    if (!empty($arg[0]) && is_array($arg[0])) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }

        $sql = $sql . " where " . implode(" && ", $tmp);
    }

    if (!empty($arg[1])) {
        $sql = $sql . $arg[1];
    }

    //echo $sql;
    return $this->pdo->query($sql)->fetchAll();
}
public function find($arg){
    $sql="select * from  $this->table ";
    if(is_array($arg)){
        foreach ($arg as $key => $value) {
            $t[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql . " where " .join(' && ',$t);
    }else{
        $sql=$sql . " where `id` = '" .$arg. "'";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

}
public function count(...$a){
    $s="select count(*) from $this->table ";
    if(!empty($a[0]) && is_array($a[0])){
        foreach ($a as $key => $value) {
            $t[]=sprintf("`%s`='%s'",$key,$value);
        }
        $s=$s . " where " .join("&&",$t);
    }
    if(!empty($a[1])){
        $s=$s.$a[1];
    }
    return $this->pdo->query($s)->fetchColumn();
}    
public function save($a){
    if(!empty($a['id'])){
        foreach ($a as $key => $value) {
            $t[]=sprintf("`%s`='%s'",$key,$value);
        }
        $s="update $this->table set " .join(",",$t) . " where `id` = '".$a['id']."'";

    }else{
        $s="insert into $this->table (`" .join("`,`",array_keys($a)) ."`) values ('" . join("','",$a) . "')";
    }
    return $this->pdo->exec($s);
}
//半小時打到這
public function del($arg)
    {

        $sql = "delete from $this->table ";

        if (is_array($arg)) {

            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }

            $sql = $sql . " where " . implode(" && ", $tmp);

        } else {
            $sql = $sql . " where `id`='$arg'";
        }

        //echo $sql;
        return $this->pdo->exec($sql);
    }

    public function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll();
    }

}

function to($url)
{
    header("location:" . $url);
}

?>