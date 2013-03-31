 <?php

        function generateID() {
            $template = 'Y-AB-X';
            $templen = strlen($template);
            $apartmentnumber = 'A';
            $tenantcount = 0;
            $roomnumber = 0;
            $zeropadded = '00000';
            $roompadded = '00';

            $sernum = '';
            for ($i = 0; $i < $templen; $i++) {
                $roomfinal = substr($roompadded, 0, 2 - strlen($roomnumber)).$roomnumber;
                $last = substr($zeropadded, 0, 5 - strlen($tenantcount)).$tenantcount;
                switch ($template[$i]) {
                    case 'Y': $sernum .= date('Y');
                        break;
                    case 'A': $sernum .= $apartmentnumber;
                        break;
                    case 'B': $sernum .= $roomfinal;
                        break;
                    case 'X': $sernum .= $last;
                        break;
                    case '-': $sernum .= '';
                        break;
                }

            }
            return $sernum;
        }

        for($a = 0; $a < 10; $a++){

           $lol =  generateID();
           echo $lol;
           echo "<br/>";
        }
        ?>