<?php
class CollaborationController
{
    public function searchChurches($query)
    {
        $results = (new CollaborationModel)->searchChurches($query);
        return $results;
    }

    public function ctraddMembership($data)
    {
        $results = (new CollaborationModel)->mdladdMembership($data);
        return $results;
    }

    public function ctrshowMembership()
    {
        $results = (new CollaborationModel)->mdlshowMembership();
        return $results;
    }
    
    public function ctrMemberAccept($data)
    {
        $results = (new CollaborationModel)->mdlMemberAccept($data);
        return $results;
    }
    
    public function ctrshowAffilatedMember()
    {
        $results = (new CollaborationModel)->mdlshowAffilatedMember();
        return $results;
    }
    
    public function ctrMemberReject($data)
    {
        $results = (new CollaborationModel)->mdlMemberReject($data);
        return $results;
    }
    
    public function ctrMemberRemove($data)
    {
        $results = (new CollaborationModel)->mdlMemberRemove($data);
        return $results;
    }
    
}
?>
