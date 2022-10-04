<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Agenda Médica</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Administrador</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Deslogar" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Médicos</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule menu-active menu-icon-schedule-active">
                        <a href="schedule.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Agenda Médica</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Consulta</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Pacientes</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule">
                        <a href="video.php" class="non-style-link-menu" target="_blank"><div><p class="menu-text">Painel Teleconferência</p></div></a>
                    </td>
                </tr>

            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="schedule.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Voltar</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Agenda Médica</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Dia de hoje
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('America/Sao_Paulo');

                        $today = date('d-m-Y');
                        echo $today;

                        $list110 = $database->query("select  * from  schedule;");

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Agendar uma sessão</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Adicionar Sessão</font></button>
                        </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Todas as sessões (<?php echo $list110->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        Data:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                        <td width="5%" style="text-align: center;">
                        Médico:
                        </td>
                        <td width="30%">
                        <select name="docid" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;" >
                            <option value="" disabled selected hidden>Selecionar nome do Médico</option><br/>
                                
                            <?php 
                            
                                $list11 = $database->query("select  * from  doctor order by docname asc;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $sn=$row00["docname"];
                                    $id00=$row00["docid"];
                                    echo "<option value=".$id00.">$sn</option><br/>";
                                };


                                ?>

                        </select>
                    </td>
                    <td width="12%">
                        <input type="submit"  name="filter" value=" Filtrar" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                
                <?php
                    if($_POST){
                        //print_r($_POST);
                        $sqlpt1="";
                        if(!empty($_POST["sheduledate"])){
                            $sheduledate=$_POST["sheduledate"];
                            $sqlpt1=" schedule.scheduledate='$sheduledate' ";
                        }


                        $sqlpt2="";
                        if(!empty($_POST["docid"])){
                            $docid=$_POST["docid"];
                            $sqlpt2=" doctor.docid=$docid ";
                        }
                        //echo $sqlpt2;
                        //echo $sqlpt1;
                        $sqlmain= "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop,schedule.link from schedule inner join doctor on schedule.docid=doctor.docid ";
                        $sqllist=array($sqlpt1,$sqlpt2);
                        $sqlkeywords=array(" where "," and ");
                        $key2=0;
                        foreach($sqllist as $key){

                            if(!empty($key)){
                                $sqlmain.=$sqlkeywords[$key2].$key;
                                $key2++;
                            };
                        };
                        //echo $sqlmain;

                        
                        
                        //
                    }else{
                        $sqlmain= "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop,schedule.link from schedule inner join doctor on schedule.docid=doctor.docid  order by schedule.scheduledate desc";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Título da Sessão
                                
                                </th>
                                
                                <th class="table-headin">
                                    Médico
                                </th>
                                <th class="table-headin">
                                    
                                    Data e Hora
                                    
                                </th>
                                <th class="table-headin">
                                    
                                Número Máximo
                                    
                                </th>
                                
                                <th class="table-headin">
                                    
                                    Ações
                                    
                                </tr>
                                
                                
                                
                        </thead>
                        <tbody>
                        
                            <?php

                                
                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Não conseguimos encontrar nada relacionado as palavras-chave !</p>
                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Mostrar todas as sessões &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $scheduleid=$row["scheduleid"];
                                    $title=$row["title"];
                                    $docname=$row["docname"];
                                    $scheduledate=$row["scheduledate"];
                                    $scheduletime=$row["scheduletime"];
                                    $nop=$row["nop"];
                                    $link=$row["link"];
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($title,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($docname,0,20).'
                                        </td>
                                        <td style="text-align:center;">
                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                                        </td>
                                        <td style="text-align:center;">
                                            '.$nop.'
                                        </td>
                                        
                                        
                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=view&id='.$scheduleid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Visualizar</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=drop&id='.$scheduleid.'&name='.$title.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remover</font></button></a>
                                        </div>
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php
    
    if($_GET){
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='add-session'){

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                    
                        <a class="close" href="schedule.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">'.
                                   ""
                                
                                .'</td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Adicionar nova Sessão.</p><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <form action="add-session.php" method="POST" class="add-new-form">
                                    <label for="title" class="form-label">Título da Sessão: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="title" class="input-text" placeholder="Nome dessa Sessão" required><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="docid" class="form-label">Selecionar Médico: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="docid" id="" class="box" >
                                    <option value="" disabled selected hidden>Selecionar Médico</option><br/>';
                                        
        
                                        $list11 = $database->query("select  * from  doctor order by docname asc;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $sn=$row00["docname"];
                                            $id00=$row00["docid"];
                                            echo "<option value=".$id00.">$sn</option><br/>";
                                        };
        
        
        
                                        
                        echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nop" class="form-label">Número de Pacientes/Número de Consultas: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="number" name="nop" class="input-text" min="0"  placeholder="O número máximo de sessões dependerá desse número" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="date" class="form-label">Data da Sessão: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="date" class="input-text" min="'.date('d-m-Y').'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="time" class="form-label">Hora: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="time" name="time" class="input-text" placeholder="Hora" required><br>
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                                    <input type="text" name="link" class="input-text" placeholder="Link" required><br>
                                </td>

                            </tr>

                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Limpar" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Inserir Sessão" class="login-btn btn-primary btn" name="shedulesubmit">
                                </td>
                
                            </tr>

                        </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }elseif($action=='session-added'){
            $titleget=$_GET["title"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Sessão.</h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                        '.substr($titleget,0,40).' Marcado com sucesso.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='drop'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Você tem certeza?</h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            Você quer deletar<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-session.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Sim&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Não&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='view'){
            $sqlmain= "select schedule.scheduleid,schedule.title,doctor.docname,schedule.scheduledate,schedule.scheduletime,schedule.nop,schedule.link from schedule inner join doctor on schedule.docid=doctor.docid  where  schedule.scheduleid=$id";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $docname=$row["docname"];
            $scheduleid=$row["scheduleid"];
            $title=$row["title"];
            $scheduledate=$row["scheduledate"];
            $scheduletime=$row["scheduletime"];
            $link=$row["link"];
            
           
            $nop=$row['nop'];


            $sqlmain12= "select * from appointment inner join patient on patient.pid=appointment.pid inner join schedule on schedule.scheduleid=appointment.scheduleid where schedule.scheduleid=$id;";
            $result12= $database->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Ver Detalhes.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Título da Sessão: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$title.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Médico da Sessão: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$docname.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Data do Agendamento: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$scheduledate.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Data do Agendamento: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$scheduletime.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Link: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$link.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label"><b>Paciente já registrado na Sessão:</b> ('.$result12->num_rows."/".$nop.')</label>
                                    <br><br>
                                </td>
                            </tr>

                            
                            <tr>
                            <td colspan="4">
                                <center>
                                 <div class="abc scroll">
                                 <table width="100%" class="sub-table scrolldown" border="0">
                                 <thead>
                                 <tr>   
                                        <th class="table-headin">
                                             Id do Paciente
                                         </th>
                                         <th class="table-headin">
                                             Nome do Paciente
                                         </th>
                                         <th class="table-headin">
                                             
                                             Número da Sessão
                                             
                                         </th>
                                        
                                         
                                         <th class="table-headin">
                                             Telefone do Paciente
                                         </th>
                                         
                                         
                                 </thead>
                                 <tbody>';
                                 
                
                
                                         
                                         $result= $database->query($sqlmain12);
                
                                         if($result->num_rows==0){
                                             echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>
                                             <img src="../img/notfound.svg" width="25%">
                                             
                                             <br>
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Não conseguimos encontrar nada relacionado as palavras-chave !</p>
                                             <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Mostrar todas Consultas &nbsp;</font></button>
                                             </a>
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';
                                             
                                         }
                                         else{
                                         for ( $x=0; $x<$result->num_rows;$x++){
                                             $row=$result->fetch_assoc();
                                             $apponum=$row["apponum"];
                                             $pid=$row["pid"];
                                             $pname=$row["pname"];
                                             $ptel=$row["ptel"];
                                             $link=$row["link"];
                                             
                                             echo '<tr style="text-align:center;">
                                                <td>
                                                '.substr($pid,0,15).'
                                                </td>
                                                 <td style="font-weight:600;padding:25px">'.
                                                 
                                                 substr($pname,0,25)
                                                 .'</td >
                                                 <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                                 '.$apponum.'
                                                 
                                                 </td>
                                                 <td>
                                                 '.substr($ptel,0,25).'
                                                 </td>
                                                 
                                                 
                
                                                 
                                             </tr>';
                                             
                                         }
                                     }
                                          
                                     
                
                                    echo '</tbody>
                
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';  
    }
}
        
    ?>
    </div>

</body>
</html>