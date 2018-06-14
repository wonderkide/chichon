<?php

namespace frontend\components;

class helpFunction{
    
    public function dateTime($strDate) {
        $strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		return $strDay . ' ' . $strMonthThai. ' ' .$strYear;
    }
    public function dateTimeMinute($strDate) {
        $strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
    }
    
    public function cutTextByLength($text,$length) {
        if (strlen($text) > $length){
            $text = substr($text, 0, $length) . '...';
        }
        return $text;
    }
    public function cutText($text) {
        $cut = 1000;
        if (strlen($text) > $cut){
            $text = substr($text, 0, $cut) . '...';
        }
        //var_dump(strlen($text));
        return $text;
    }
    public function TopCutText($text) {
        $cut = 450;
        if (strlen($text) > $cut){
            $text = substr($text, 0, $cut) . '...';
        }
        //var_dump(strlen($text));
        return $text;
    }
    
    public function cutTextRemoveTag($text, $lenght) {
        $remove = helpFunction::removeAllTagHtml($text);
        if (strlen($remove) > $lenght){
            $remove = substr($remove, 0, $lenght) . '...';
        }
        return $remove;
    }
    
    function humanTiming ($time)
    {

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'ปี',
        2592000 => 'เดือน',
        604800 => 'สัปดาห์',
        86400 => 'วัน',
        3600 => 'ชั่วโมง',
        60 => 'นาที',
        1 => 'วินาที'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'ที่แล้ว':'ที่แล้ว');
        }

    }
    public function removeAllTagHtml($text) {
        return preg_replace('/<[^>]*>/', '', $text);
    }
    
    public function convertBet($bet) {
        
        $over = explode(".",$bet);
        
        if(!empty($over[1])){
            if($over[0]==0){
                if($over[1] == '25'){
                    $bet = 'ปป.';
                }
                else if($over[1] == '5'){
                    $bet = '0.5';
                }
                else if($over[1] == '75'){
                    $bet = '0.5+1';
                }
            }
            else{
                if($over[1] == '25'){
                    $bet = $over[0].'+'.$over[0].'.5';
                }
                else if($over[1] == '5'){
                    $bet = $over[0].'.5';
                }
                else if($over[1] == '75'){
                    $bet = $over[0].'.5+'.($over[0]+1);
                }
            }
        }
        
        return $bet;
    }
    
    public function getActionID($array) {
        $position = strpos($array[0], '/', 0);
        $action = substr_replace($array[0],'',0, $position+1);
        
        return $action;
        
    }
}
