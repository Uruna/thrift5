<?php
// timer converts date and time to min, hr, days, week
function timeConverter($date){
    // $date = "2023-02-08 03:20:30";
    $today = date('Y-m-d h:i:s');
    $result = 0;
    $differ = (strtotime($today) - strtotime($date));
    echo $differ."<br>";
    if($differ < 60){ //seconds
        $result = 'few seconds ago';
    }
    else if($differ < 60*60){ //minutes
        $result = intval($differ/60)." mins ago";
    }
    else if($differ < 60*60*24){ //hours
        $result = intval($differ/(60*60))." hours ago";
    }
    else if($differ < 60*60*24*30){ //days
        $result = intval($differ/(60*60*24))." days ago";
    }
    else if($differ < 60*60*24*30*12){ //months
        $result = intval($differ/(60*60*30*24))." hours ago";
    }
    return $result;
}
echo timeConverter();
?>