<?php
class CollaborationController
{
    public function searchChurches($query)
    {
        $results = (new CollaborationModel)->searchChurches($query);
        return $results;
    }
}
?>
