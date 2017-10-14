<?php
error_reporting(E_ALL);
require_once 'dbconnect.php';

if(isset($_POST['add_content'])) {
    
    $content_type = strip_tags($_POST['content_type']);
    $content_name = strip_tags($_POST['content_name']);
    $autor_name = strip_tags($_POST['autor_name']);
    $autor_code = strip_tags($_POST['autor_code']);
    $registred_date = strip_tags($_POST['registred_date']);
    $dvn =  strip_tags($_POST['dvn']);


    
    $content_type = $DBcon->real_escape_string($content_type);
    $content_name = $DBcon->real_escape_string($content_name);
    $autor_name = $DBcon->real_escape_string($autor_name);
    $autor_code = $DBcon->real_escape_string($autor_code);
    $registred_date = $DBcon->real_escape_string($registred_date);
    $dvn = $DBcon->real_escape_string($dvn);
    gen:
    /*$content_code =$registred_date.random_number();*/
    $content_code = $registred_date.substr(str_shuffle("0123456789"), 0, 4);
    
    $check_content = $DBcon->query("SELECT content_code FROM content WHERE  content_name ='$content_name'");
    $count=$check_content->num_rows;
    
    if ($count==0) {   

        //$content_code =$content_code.random_number();
        $check_content_code = $DBcon->query("SELECT content_code FROM content WHERE  content_name ='$content_name'");
    $count1=$check_content_code->num_rows;

        if($count1==0){

            $query = "INSERT INTO content(content_type,content_name,author_name,author_code,registred_date,dvn,content_code) VALUES('$content_type','$content_name','$autor_name','$autor_code','$registred_date','$dvn','$content_code')" or die('Error:'.mysql_error());

        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><span class='glyphicon glyphicon-ok alert-dismissable'></span> 
                                 &nbsp; Амжилттай бүртгэгдлээ !
                            </div>";
        }

        else { 

           $msg = ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <span class="glyphicon glyphicon-info-sign alert-dismissable"></span> &nbsp; Бүртгэх явцад алдаа
                            </div>
                        </div>';
        }

        }
        else{
            goto gen;
        }



    }
else{

$msg = ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <span class="glyphicon glyphicon-info-sign alert-dismissable"></span> &nbsp; Давхсаж байна.
                            </div>
                        </div>';
                                }
    
       


        
    
    $DBcon->close();
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Төсөл, Дипломын бүртгэл</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="panel panel-default">

                                <div class="panel-heading">
                            Шинээр бүртгэх
                        </div>
                        <div class="panel-body">
                                     <form class="form-signin" method="post" id="register-form">
      
       <!--  <h2 class="form-signin-heading">Төсөл, Дипломын бүртгэл</h2><hr /> -->
        
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        
        <div class="form-group">

        <select class="form-control" name="content_type"> 
        <option>Төрөлөө сонгоно уу</option>
        <option value ="Төсөл">Төсөл</option>
        <option vlaue ="Диплом">Диплом</option>
        </select>
        
        </div>  
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Сэдэв" name="content_name" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Гүйцэтгэсэн оюутны нэр" name="autor_name" required  />
        </div>
         <div class="form-group">
        <input type="text" class="form-control" placeholder="Гүйцэтгэсэн оюутны код" name="autor_code" required  />
        </div>


       <div class="form-group">

        <select class="form-control" name="registred_date"> 
        <option> Хичээлийн жил, улирал </option>
        <option value ="2017-18a">2017-2018 намар</option>
        <option value ="2017-18b">2017-2018 хавар</option
        <option value ="2016-17a">2016-2017 намар</option>
        <option value ="2016-17b">2016-2017 хавар</option>
        <option vlaue ="2015-16a">2015-2016 намар</option>
        <option value ="2015-16b">2015-2016 хавар</option>
        <option vlaue ="2014-15a">2014-2015 намар</option>
        <option value ="2014-15b">2014-2015 хавар</option>
        </select>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Гүйцэтгэл ( %-аар)" name="dvn" required  pattern="100|[0-9]+(\.[0-9]{0,2})?%?" />
        </div>
        
       
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="add_content">
            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Бүртгэх
            </button> 
           <!--  <a href="login.php" class="btn btn-default" style="float:right;">Нэвтрэх хэсэг</a> -->
        </div>
      
      </form>
      </div>

                                </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->














                                <div class="col-lg-6">
                                   <div class="panel panel-default">
                        <div class="panel-heading">
                            Бүртгэглийн жагсаалт
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Сэдэв</th>
                                            <th>Ангилал</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                    $quer = $DBcon->query("SELECT * FROM content ") or die("Alddaa");
                    $len_content=0;
                    while($quer1=$quer->fetch_assoc()){
                      $len_content++;
                      $content_name = $quer1['content_name'];
                      $content_type = $quer1['content_type'];
                      echo'<tr>
                                            <td>'.$len_content.'</td>
                                            <td>'.$content_name.'</td>
                                            <td>'.$content_type.'</td>
                                         
                                        </tr>';
                                    }

                                    ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
       





