<?php
    include '../conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $nomeMeses = array(1=>'Magnético',2=>'Lunas',3=>'Elétrico',4=>'Auto-Existente',5=>'Harmônico',6=>'Rítmico',7=>'Ressonante',8=>'Galáctico',9=>'Solar',10=>'Planetário',11=>'Espectral',12=>'Cristal',13=>'Cósmico');
    $dia=0;
    $dia_grego = date("z");
    $diaNiver='';

    if($dia_grego <= 204)
        $dia_lunar =$dia_grego+160;
    else
        $dia_lunar = $dia_grego-205;

    if(isset($_GET['dia']))
    {
        $diaNacimento = $_GET['dia'];
        if($diaNacimento <= 204)
            $diaNiver = $diaNacimento+160;
        else
            $diaNiver = $diaNacimento-205;
    }

    function kins()
    {
        global $conexao;

        $sql = "SELECT * FROM kin";
        $rs = $conexao->query($sql);
        while($row = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $kins_desc = str_replace(';','.<br>',$row['descricao']);
            $kins[$row['numero']] = "<b><font size='3'>".$row['numero'].' - '.$row['nome']."</font></b> <br> <font size='2'>".$kins_desc.'</font>';
        }
        return $kins;
    }

    $kins = kins();

    $dataKin1 = date('Y-5-24');
    $dataHoje = date('Y-m-d');

    $kins = array_map(function ($kin){
        return utf8_encode($kin);
    }, $kins);

    for($i=1;$i<=260;$i++)
    {
        if(strtotime($dataKin1) == strtotime($dataHoje)){
            $kinDia = $kins[$i];
        }

        $dataKin1 = date('Y-m-d',strtotime($dataKin1.' +1day'));
    }

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content=" text/html; charset=utf-8" />
        <link rel="shortcut icon" href="img/calendario.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/style.css" />

        <title>Calendario da PAZ </title>

    </head>
    <body>
        <h1 align="center">CALENDARIO DA PAZ => <i><u>Frequência 13:20</u></i></h1>

        <div align="center">
          <img src="img/calendario.png" width="150"><br>

          <form action="" method="post" name="form">
            Veja qual dia você nasceu no calendario da PAZ<br>
            <input type="text" name="calendario" id='calendario' style="width: 75px;">
            &nbsp;&nbsp;&nbsp;
            <input type="button" name="btData" value="Calcular" onclick="validar()">
          </form>
          <br>
          <p  id="tooltip">Calcule seu KIN<a href="http://www.sincronariodapaz.org/altera/CalculoKin/" target="_blank" title="That&apos;s what this widget is">(<font color="#f00"> clique aqui!!!</font> )</a>  </p>
        </div>

    <?php

        for($a=1;$a<=13;$a++):
    ?>
            <div style="float: <?php echo $a%2 == 0 ? 'right' : 'left' ?>;  width: 600px; height: 300px; ">
                <h2 align="center"> MÊS <?php echo  $a." - ".$nomeMeses[$a] ?> <img src="img/<?php echo $a ?>.png" width="50"></h2>
                <table cellpadding="0" cellspacing="0" style="border: solid 2px #000;" width="400" align="center" id="<?php echo $a ?>">

                <?php
                    for($m=1;$m<=4;$m++):
                ?>
                        <tr style="height: 40px; text-align: center;" >
                          <?php
                            for($d=1;$d<=7;$d++):
                              $hoje='';
                              $niver='';
                              if($m==1)$aux=0;
                              if($m==2)$aux=7;
                              if($m==3)$aux=14;
                              if($m==4)$aux=21;
                              $dia++;
                              if($dia_lunar == $dia) $hoje = 'hoje';
                              if(($dia) == $diaNiver) $niver = 'aniversoario';
                          ?>
                              <td class="<?php echo $hoje,$niver ?>" style="border: solid 1px #00f;">
                                <?php echo $d+$aux; ?>
                                <div class="descricao" style="font-weight: normal;">
                                    <?php echo $kinDia; ?>
                                </div>
                              </td>
                          <?php
                            endfor;
                          ?>
                        </tr>
                <?php
                    endfor;
                ?>
                </table>
            </div>
    <?php
        endfor;
    ?>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/calendario_da_paz.js"></script>
        <link rel="stylesheet" href="js/jquery-ui.css" />


        <script>

             function topp(posicao)
             {
                 window.scrollTo(0,posicao-60);
             }

             function getPosicaoElemento(elemID)
             {
                var elemento = document.getElementById(elemID);
                var posicao = 0;
                while (elemento) {
                    posicao += elemento.offsetTop;
                    elemento = elemento.offsetParent;
                }
                 topp(posicao)
            }
        </script>
         <?php
            if(isset($_GET['dia']))
            {
                $diaNacimento = $_GET['dia'];

                if ($diaNacimento >=206 && $diaNacimento <=262)
                    $parametro = 1;

                elseif ($diaNacimento >262 && $diaNacimento <=318)
                    $parametro = 3;

                elseif ($diaNacimento >318 || ($diaNacimento >=0 && $diaNacimento <=8))
                    $parametro = 5;

                elseif ($diaNacimento >8 && $diaNacimento <=64)
                    $parametro = 7;

                elseif ($diaNacimento >64 && $diaNacimento <=120)
                    $parametro = 9;

                elseif ($diaNacimento >120 && $diaNacimento <=176)
                    $parametro = 11;

                elseif ($diaNacimento >176 && $diaNacimento <=205)
                    $parametro = 13;

                echo "<script> getPosicaoElemento({$parametro}) </script> ";
            }
        ?>
    </body>
</html>
