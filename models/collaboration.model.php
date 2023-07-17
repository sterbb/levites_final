<?php
require_once "connection.php";
class CollaborationModel
{
    public function searchChurches($query)
    {
        $church_name =  $query["churchName"] . '%';

        $stmt = (new Connection)->connect()->prepare("SELECT * FROM churches WHERE church_name LIKE :query");
        $stmt->bindParam(':query', $church_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

