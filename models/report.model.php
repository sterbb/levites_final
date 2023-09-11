<?php
require_once "connection.php";

class ModelReport
{
    public function mdlShowEventReport($data)
    {
        if (!empty($data['selectedValue'])) {
            $query = 'AND event_category = :selectedValue';
        } else {
            $query = '';
        }
    
        $churchID = $_COOKIE['church_id'];
        $sql = "SELECT * FROM calendar WHERE churchID = :churchID AND event_date <= :endDate  AND event_date2 >= :startDate $query";
        
        $conn = (new Connection)->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':churchID', $churchID, PDO::PARAM_STR);
        $stmt->bindParam(':startDate', $data['date1'], PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $data['date2'], PDO::PARAM_STR);
       
        if (!empty($data['selectedValue'])) {
            $stmt->bindParam(':selectedValue', $data['selectedValue'], PDO::PARAM_STR);
        }
       
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mdlgetRegisteredUsers($data)
    {
        $month = json_decode($data['month'], true);
        $year = json_decode($data['year'], true);

        if ($month[0] != '') {
            $query = 'AND MONTH(created_at) IN (';
            
            if(is_array($month) && count($month)> 1){
                for($i = 0; $i < count($month); $i++){
                    if($i === count($month)-1){
                        $query .= $month[$i] . ')';
                    }else{
                        $query .= $month[$i] . ',';
                    }
                }
            }else{
                $query .= $month[0] . ')';
            }

        } else {
            $query = '';
        }

        if ($year[0] != '') {
            $query2 = 'AND YEAR(created_at) IN (';
            
            if(is_array($year) && count($year)> 1){
                for($i = 0; $i < count($year); $i++){
                    if($i === count($year)-1){
                        $query2 .= $year[$i] . ')';
                    }else{
                        $query2 .= $year[$i] . ',';
                    }
                }
            }else{
                $query2 .= $year[0] . ')';
            }

        } else {
            $query2 = '';
        }

        $acctype1 = "public";
        $acctype2 = "publicSub";

        $sql = "SELECT * FROM account WHERE (acc_type = :acc_type1 OR  acc_type = :acc_type2) $query $query2";
        
        $conn = (new Connection)->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':acc_type1', $acctype1, PDO::PARAM_STR);
        $stmt->bindParam(':acc_type2', $acctype2, PDO::PARAM_STR);
       
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mdlgetChurchStatus($data)
    {
        $month = json_decode($data['month'], true);
        $year = json_decode($data['year'], true);
        $church_status = $data['church_status'];

        $conditions = [];

        if ($church_status == 'accepted') {
            $conditions[] = "church_status = 1";
        } elseif ($church_status == 'rejected') {
            $conditions[] = "rejected_status = 1";
        } elseif ($church_status == 'waitlist') {
            $conditions[] = "(rejected_status = 0 AND church_status = 0)";
        }
        
        if ($month[0] != '') {
            $monthConditions = [];
            foreach ($month as $m) {
                $monthConditions[] = "MONTH(status_date) = $m";
            }
            $conditions[] = "(" . implode(' OR ', $monthConditions) . ")";
        }
        
        if ($year[0] != '') {
            $yearConditions = [];
            foreach ($year as $y) {
                $yearConditions[] = "YEAR(status_date) = $y";
            }
            $conditions[] = "(" . implode(' OR ', $yearConditions) . ")";
        }
        
        // Build the WHERE clause
        $whereClause = (!empty($conditions)) ? "WHERE " . implode(' AND ', $conditions) : '';
        
        // Construct the SQL query
        $sql = "SELECT * FROM churches $whereClause";
        
        $conn = (new Connection)->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function mdlgetCollaborationStatus($data)
    {
        $month = json_decode($data['month'], true);
        $year = json_decode($data['year'], true);
        $church_status = $data['church_status'];

        $conditions = [];

        if ($church_status == 'accepted') {
            $conditions[] = "collab_status = 1";
        } elseif ($church_status == 'rejected') {
            $conditions[] = "reject_status = 1";
        } elseif ($church_status == 'waitlist') {
            $conditions[] = "(reject_status = 0 AND collab_status = 0)";
        }
        
        if ($month[0] != '') {
            $monthConditions = [];
            foreach ($month as $m) {
                $monthConditions[] = "MONTH(collabdate) = $m";
            }
            $conditions[] = "(" . implode(' OR ', $monthConditions) . ")";
        }
        
        if ($year[0] != '') {
            $yearConditions = [];
            foreach ($year as $y) {
                $yearConditions[] = "YEAR(collabdate) = $y";
            }
            $conditions[] = "(" . implode(' OR ', $yearConditions) . ")";
        }
        
        // Build the WHERE clause
        $whereClause = (!empty($conditions)) ? "WHERE " . implode(' AND ', $conditions) : '';
        
        // Construct the SQL query
        $sql = "SELECT * FROM churchcollab $whereClause";
        
        $conn = (new Connection)->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }


}
?>
