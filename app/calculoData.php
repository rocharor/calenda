<?php
    $data = strtotime(str_replace('/','-',$_GET['data']));
    $anoBissexto = date('L',$data);
    $diaNascimentodate = date('z',$data);
    if ($anoBissexto==1)
        $diaNascimentodate -=  1;   
    header("location: index.php?dia=$diaNascimentodate");
?>
