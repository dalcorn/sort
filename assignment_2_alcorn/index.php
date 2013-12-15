<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Assignment_2_D_Alcorn</title>
    </head>
    <body>
        <?php
        //display array
        echo'$dates array <br />';
        $dates = array('10-10-2003', '2-17-2002', '2-16-2003', '1-01-2005', '10-10-2004');
        print_r($dates);
        echo "<br />";
        
        //sort dates
        echo "<br />";
        echo'1.  sort($dates)  <br />';
        sort($dates);
        print_r($dates);
        echo "<br />\n";
        
        //display array with natsort
        echo "<br />";
        echo'2.  natsort($dates)  <br />';
        natsort($dates);
        print_r($dates);
        echo "<br />\n";
        
        //display with usort
        echo "<br />";
        echo'3.  usort   <br />';

        //to compare dates and sort ascending
        function cmp($a, $b) {

            $a = date_parse_from_format('m,d,Y', $a);
            $b = date_parse_from_format('m,d,Y', $b);

            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }

        usort($dates, "cmp");
        foreach ($dates as $key => $value) {
            echo $value . '<br/>';
        }
        //to sort array using mktime and usort and display ascending
        echo "<br />";
        echo'4.  usort and mktime <br />';

        function toTime($dates) {
            list($month, $day, $year) = explode('-', $dates);
            return mktime(0, 0, 0, $month, $day, $year);
        }

        function sortAsc($a, $b) {
            $a = toTime($a);
            $b = toTime($b);
            if ($a == $b) {
                return 0;
            }
            return $a < $b ? -1 : 1;
        }

        usort($dates, 'sortAsc');

        foreach ($dates as $key => $value) {
            echo $value . '<br/>';
        }




//        echo 'using ksort and strtotime <br />';
//        
//        echo "<br />\n";
//
//
//        foreach ($dates as $v) {
//            $unixTime = strtotime($v);
//            $dates2[$unixTime] = $v;
//        }
//        ksort($dates2);
//        foreach ($dates2 as $key => $value) {
//            echo $value . '<br/>';
//        }
        ?>


    </body>
</html>
