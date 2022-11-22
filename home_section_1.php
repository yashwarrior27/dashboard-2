<?php
 include("header.php") ;
 include('../db.php');

 if(isset($_FILES['video']['name'])&& $_FILES['video']['error']===0){
   $fname=$_FILES['video']['name'];
   $tname=$_FILES['video']['tmp_name'];
   move_uploaded_file($tname,'../images/'.$fname);
     try{
       
        $db=connect();
        $quhs1=$db->prepare('UPDATE home_section_1 SET video= :fname WHERE id = 1');
       $ch = $quhs1->execute(['fname'=>$fname]);
       $db=null;
        
     }  
     catch(Exception $e){

        echo $e->getMessage();
     }      


 };

?>

<?php
try{

    $db=connect();
$quhs1a=$db->query('SELECT * FROM home_section_1');
$rows1a=$quhs1a->fetch(PDO::FETCH_ASSOC);
$db=null;
}
catch(Exception $e){
    echo $e->getMessage();
}

?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="contanier">
                <div class="row justify-content-center">
                    <div class="col-9 text-center">
                    <h2>Section-1</h2>
                    </div>
                </div>
                <div class="row justify-content-center pt-5">
                    <div class="col-12">
                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group row ">
                                                    <div class="col-2 pt-2 text-white text-center "  style="align-self: center;">
                                                        <label>
                                                            <h3>Video</h3>
                                                        </label>
                                                    </div>
                                                    <div class="col-7 ">
                                                        <video width="100%" height="100%" controls>
                                                            <source src="../images/<?= $rows1a['video'] ?>">
                                                        </video>
                                                       
                                                    </div>
                                                    <div class="col-3 pt-2 text-dark " style="align-self: center;">
                                                        <div class="text-center">
                                                            <label for=0 class="btn  btn-outline-success">Select Video</label>
                                                            <input type="file" name="video" style="display:none;" id=0
                                                                class="form-control-file" 
                                                                accept="video/*">
                                                        </div>
                                                       <div class="text-center pt-4 "><button type="submit" class="btn btn-outline-light btn-lg">Update</button></div> 
                                                    </div>

                                                </div>
                        </form>
                    </div>
                </div>
            </div>
           
          </div>

          <?php include("footer.php") ?>