<?php
    
    session_start();

    $koneksi = new mysqli("localhost", "root","","db_penduduk");

   if ($_SESSION ['admin']) {
     
   
  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMAKMA</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SIMAKMA</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date('d-M-Y');?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/kamal.jpg" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="?home.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>

                    <li>
                        <a  href="?page=penduduk"><i class="glyphicon glyphicon-th"></i> Data Penduduk</a>
                    </li>

                    <li  >
                        <a  href="?page=tambah"><i class="glyphicon glyphicon-edit"></i> Tambah Data </a>
                    </li>
                    <li  >
                        <a  href="?page=bantuan"><i class="glyphicon glyphicon-gift"></i> Riwayat Bantuan </a>
                    </li>
                     <li  >
                        <a  href="?page=tentang"><i class="glyphicon glyphicon-user"></i> Developer </a>
                    </li>
                    
                        </ul>
                      </li>  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                    <?php

                        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                        
                        $page = ($_GET['page']);
                        $aksi = ($_GET['aksi']);

                        if($page == "penduduk"){
                          if($aksi == ""){
                            include "page/penduduk/penduduk.php";
                          } elseif ($aksi == "tambah"){
                            include "page/penduduk/tambah.php";
                          } elseif ($aksi == "hapus"){
                            include "page/penduduk/hapus.php";
                          } elseif ($aksi == "ubah"){
                            include "page/penduduk/ubah.php";
                          }
                          }elseif($page == "tambah"){
                            include "page/tambah/input.php";
                          }
                          elseif($page == ""){
                            include "home.php";
                          }elseif($page == "bantuan"){
                            include "page/bantuan/bantuan.php";
                          }elseif($page == "tentang"){
                            include "page/tentang/perancang.php";
                          }
                    ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
  </div>  
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php  

}else{
  header("location:login.php");
}

?>