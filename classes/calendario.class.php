<?php
  class calendario
  {
    function kinsDiario()
    {
        $dataKin1 = '2015-04-04';
        $dataHoje = date('Y-m-d');
        
        $sql = "SELECT * FROM kin";
        $rst = mysql_query($sql); 
        while($row = mysql_fetch_assoc($rst))
        {            
            $kins_desc = str_replace(';','.<br>',$row['desc_kin']);
            
            $kins[$row['numero_kin']] = "<b><font size='3'>".$row['nome_kin']."</font></b> <br> <font size='2'>".$kins_desc.'</font>';
           
        } 
        
        for($i=1;$i<=260;$i++)
        {
            if(strtotime($dataKin1) == strtotime($dataHoje))
                $kinDia = $kins[$i];

            $dataKin1 = date('Y-m-d',strtotime($dataKin1.' +1day'));               
        }  
           
        return $kinDia;
    }
  }
?>
