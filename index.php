<?php
try{
    $pdo=new PDO("mysql:dbname=crudpdo;host=localhost","root","");
}
catch(PDOException $e){
    echo "Erro com banco de dados:";
}
catch(Exception $e)
{
    echo "Erro generico:".$e->getMessage();;
}

//INSERT
$pdo->query("INSERT INTO pessoa(nome,telefone,email)VALUES('CASSIO','0000','cassiofbar@gmail.com')");

//DELETE 
$cmd =$pdo->prepare("DELETE FROM pessoa WHERE id = :id");
$id=2;
$cmd->bindValue(":id",$id);
$cmd->execute();
$res=$pdo->query("DELETE FROM pessoa WHERE id='4'");

//UPDATE
$res=$pdo->query("UPDATE pessoa SET email='cassio1@hotmail.com'WHERE id=''");

//SELECT
$cmd=$pdo->prepare("SELECT*FROM pessoa WHERE id =:id");
$cmd->bindValue(":id",10);
$cmd->execute();
$resultado=$cmd->fetch(PDO::FETCH_ASSOC);

foreach($resultado as $key=> $value){
   echo $key.":".$value."<br>";
}

?>



