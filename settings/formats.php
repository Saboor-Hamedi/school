<?php
class format
{
  
    protected $counter = 0;
    public function __construct()
    {
        $this->counter = 0;
    }
    public function ToUpperCase($upper)
    {
        return ucfirst($upper);
    }
    public function TimeFormat($date)
    {
        $result = "";
        $convert_date = strtotime($date);
        $month = date('F', $convert_date);
        $year = date('Y', $convert_date);
        $name_day = date('1', $convert_date);
        $day = date('j', $convert_date);
        $result = $month . " " . $day . ",  " . $year . "-" . $name_day;
        return $result;
    }
    public function BreakLine($line, $width)
    {
        echo  wordwrap($line, $width, '<br>', true);
    }
    public function increment()
    {
        return ++$this->counter;
    }
    public function ReadMore($text1, $limit = 3)
    {
        $text1 = $text1 . "";
        $text1 = substr($text1, 0, $limit);
        $text1 = substr($text1, 0, strrpos($text1, ' '));
        $text1 = $text1 . " ...";
        return $text1;
    }
    // remove html from content 
    function RemoveHTML($slashes)
    {
        $str = '';
        $str = preg_replace('/\\\\(.?)/', '', $slashes);
        return $str;
    }
    /*
        this function displays the post time
        every minute this function would load and
        show the post time
    */
    public function display_post_time($timestamp)
    {
        date_default_timezone_set("Asia/Jakarta");
        $time_ago        = strtotime($timestamp);
        $current_time    = time();
        $time_difference = $current_time - $time_ago;
        $seconds         = $time_difference;
        $minutes = round($seconds / 60); // value 60 is seconds
        $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
        $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
        $weeks   = round($seconds / 604800); // 7*24*60*60;
        $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
        $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
            return "Just Now";
        }
        if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minutes ago";
            }
        } elseif ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        } elseif ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        } elseif ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        } elseif ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        } else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }
}
