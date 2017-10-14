
<?php
error_reporting(E_ALL);
require_once 'dbconnect.php';

if(isset($_POST['add_member'])) {
    
    $member_type = strip_tags($_POST['member_type']);
    $member_code = strip_tags($_POST['member_code']);
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $tel = strip_tags($_POST['tel']);
    $email =  strip_tags($_POST['email']);


    
    $member_type = $DBcon->real_escape_string($member_type);
    $member_code = $DBcon->real_escape_string($member_code);
    $firstname = $DBcon->real_escape_string($firstname);
    $lastname = $DBcon->real_escape_string($lastname);
    $tel = $DBcon->real_escape_string($tel);
    $email = $DBcon->real_escape_string($email);
 
    $check_member = $DBcon->query("SELECT member_code FROM members WHERE  member_code ='$member_code
        '");
    $count=$check_content->num_rows;
    
    if ($count==0) {   


            $query = "INSERT INTO members(member_type,member_code,firstname,lastname,tel,email) VALUES('$member_type','$member_code','$firstname','$lastname','$tel','$email')" or die('Error:'.mysql_error());

        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><span class='glyphicon glyphicon-ok alert-dismissable'></span> 
                                 &nbsp; Амжилттай бүртгэгдлээ !
                            </div>";
        }

        else { 

           $msg = ' <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <span class="glyphicon glyphicon-info-sign alert-dismissable"></span> &nbsp; Бүртгэх явцад алдаа гарлаа
                            </div>
                        </div>';
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
                    <h1 class="page-header">Хэрэглэгчийн бүртгэл</h1>
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

        <select class="form-control" name="member_type"> 
        <option> Хэрэглэгчийн төрөл</option>
        <option value ="Багш">Багш</option>
        <option vlaue ="Оюутан">Оюутан</option>
        </select>
        
        </div>  
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Хэрэглэгчийн код" name="member_code" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Хэрэглэгчийн нэр" name="firstname" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Хэрэглэгчийн овог нэр" name="lastname" required  />
        </div>
         <div class="form-group">
        <input type="text" class="form-control" placeholder="Утасны дугаар" name="tel" required  />
        </div>
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Мэйл хаяг" name="email" required  />
        </div>
       
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="add_member">
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
                            Хэрэглэгчийн жагсаалт
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Хэрэглэгчийн Нэр</th>
                                            <th>Хэрэглэгчийн код</th>
                                            <th>Хэрэглэгчийн төрөл</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                    $quer = $DBcon->query("SELECT * FROM members ") or die("Alddaa");
                    $len_content=0;
                    while($quer1=$quer->fetch_assoc()){
                      $len_content++;
                      $member_name = $quer1['firstname'];
                      $member_code = $quer1['member_code'];
                      $member_type = $quer1['member_type'];
                      echo'<tr>
                                            <td>'.$len_content.'</td>
                                            <td>'.$member_name.'</td>
                                            <td>'.$member_code.'</td>
                                            <td>'.$member_type.'</td>
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
       
