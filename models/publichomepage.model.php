<?php
require_once "connection.php";

class ChurchModel
{
    public function searchChurches($query)
    {
        $church_name = $query . '%';

        $stmt = (new Connection)->connect()->prepare("SELECT church_name, church_city, church_address FROM churches WHERE church_name LIKE :query");
        $stmt->bindParam(':query', $church_name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
