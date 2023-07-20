<?php
class CollaborationController
{
    public function searchChurches($query)
    {
        $results = (new CollaborationModel)->searchChurches($query);
        return $results;
    }

    public function ctraddCollaboration($data)
    {
        $results = (new CollaborationModel)->mdladdCollaboration($data);
        return $results;
    }

    public function ctrshowPendingRequest()
    {
        $results = (new CollaborationModel)->mdlshowPendingRequest();
        return $results;
    }

    public function ctrshowRequests()
    {
        $results = (new CollaborationModel)->mdlshowRequests();
        return $results;
    }

    public function ctrshowAffilatedChurches()
    {
        $results = (new CollaborationModel)->mdlshowAffilatedChurches();
        return $results;
    }

    public function ctrCancelRequest($data)
    {
        $results = (new CollaborationModel)->mdlCancelRequest($data);
        return $results;
    }

    public function ctrAcceptCollab($data)
    {
        $results = (new CollaborationModel)->mdlAcceptCollab($data);
        return $results;
    }
    
    public function ctrRejectCollab($data)
    {
        $results = (new CollaborationModel)->mdlRejectCollab($data);
        return $results;
    }

    public function ctrRemoveCollab($data)
    {
        $results = (new CollaborationModel)->mdlRemoveCollab($data);
        return $results;
    }
    
    
}
?>
