<?php
session_start();

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        unset($_SESSION['filter']);
   }
}

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

require_once "config.php";

if (isset($_POST['checkbox_1'])){   

    $checkbox_1 = $_POST['checkbox_1'];
    $checkbox_2 = $_POST['checkbox_2'];
    $checkbox_3 = $_POST['checkbox_3'];

    $status_filter = $_SESSION['status'];

    $filter = "";  
    if ($checkbox_1 == -1 ) {
        $filter .= " AND plan_type_id <> 1";
    }
    if ($checkbox_2 == -1 ) {
        $filter .= " AND plan_type_id <> 2";
    }
    if ($checkbox_3 == -1 ) {
        $filter .= " AND plan_type_id <> 3";
    } 

    $_SESSION['filter'] = $filter;                               ;

    $pageno = 1;

}

if (isset($_POST['status_filter'])){

    $status_filter = $_POST['status_filter'];

    
    if (isset($_SESSION['filter'])) {
        $filter = $_SESSION['filter'];
    } else {
        $filter = "";
    }                            

    $_SESSION['status'] = $status_filter;
    
    $pageno = 1;

}

if (isset($_POST['new_page'])) {
    $pageno = $_POST['new_page'];   
    $status_filter = $_SESSION['status'];
    if (isset($_SESSION['filter'])) {
        $filter = $_SESSION['filter'];
    } else {
        $filter = "";
    } 
    // if ($change == -1 || $change == 1) {
    //     $pageno = $current_page + $change;        
    // } else if ($change == -2) {
    //     $pageno = 1;
    // } else if ($change == 2) {
    //     // $pageno = $total_pages;
    // }
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    if ($status_filter != 2) {
        $total_pages_sql = "
        SELECT COUNT(*) FROM lead
        WHERE status = " . $status_filter. $filter . " AND id NOT IN
        (SELECT leads_id FROM proposal 
        LEFT JOIN lead ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = ". $_SESSION['id'] . ")";
        $sql = "
        SELECT * FROM lead
        WHERE status = " . $status_filter . $filter . " AND id NOT IN
        (SELECT leads_id FROM proposal 
        LEFT JOIN lead ON proposal.leads_id = lead.id
        WHERE proposal.agent_id = ". $_SESSION['id'] . ") LIMIT $offset, $no_of_records_per_page";
    } else {
        $total_pages_sql = "SELECT COUNT(*) FROM lead
        RIGHT JOIN proposal ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = ". $_SESSION['id'] . $filter;


        $sql = "SELECT * FROM lead 
        RIGHT JOIN proposal ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = " . $_SESSION['id'] . $filter . " LIMIT $offset, $no_of_records_per_page";        
    }        

} else {
    $total_pages_sql = "SELECT COUNT(*) FROM lead WHERE status = " . $status_filter . $filter;
    $sql = "SELECT * FROM lead WHERE status = " . $status_filter . $filter . " LIMIT $offset, $no_of_records_per_page";
}


$result = mysqli_query($link, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$rows = mysqli_query($link, $sql); 


echo "<span>". $total_rows ." Leads found</span>";
echo "<div class='container'>";
while($row = mysqli_fetch_array($rows)) {
    echo "<div class='single-job-items mb-30'>";
    echo "<div class='job-items'>";
    echo "<div class='job-tittle job-tittle2'>";
    echo $row['name'];
    echo "<ul>";
    echo "<li>Plan Type</li>";
    echo "<li>$3500 - $4000</li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "<div class='items-link items-link2 f-right'>";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo "<a href='job_details.phpid=".$row['id']."'>Propose Plan</a>";
    } else {
        echo "<a href='login.php' class='disabled'>Login to Propose</a>";
    }
    echo "<span>15 May 2020</span>";
    echo "</div>";
    echo "</div>";
}
mysqli_close($link);
echo "</div>";

?>