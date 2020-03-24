<!doctype html>
<html lang="en">

  <head>
    <title>BABRIOJEKA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  
  <style>
	.avatar {
		vertical-align: middle;
		width: 50px;
		height: 50px;
		border-radius: 50%;
	}
	  
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {background-color: #f2f2f2;}
  </style>

	<?php
	
		session_start();
		
		$idAluno = $_SESSION['id_aluno']
	
	?>
  
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3 ">
              <div class="site-logo">
				<img src="images/bibliotecaria.jpg" alt="Avatar" class="avatar">
				<a style="font-size: 16px;" ><?php echo($_SESSION['nome']); ?></a>
              </div>
            </div> 
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/principal2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-2">"Não importa o quanto você bate, mas sim o quanto aguenta apanhar e continuar lutando."</h1>
              <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"></span> <span>by: Rocky Balboa</span></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="realestate-filter">
      <div class="container">
        <div class="realestate-filter-wrap nav">
          <a href="#for-rent" onclick="cadusu()" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">Cadastrar Usúario</a>
          <a href="#for-sale" onclick="delusu()" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">Deletar Usúario</a>
		  <a href="#for-sale" onclick="cadliv()" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">Cadastrar Livro</a>
		  <a href="#for-sale" onclick="delliv()" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">Deletar Livro</a>
        </div>
      </div>
    </div>

	<form action="acaoadm.php" method="POST" > 
	  <div id="cadusu" style="display:inline;" >
		  <div class="realestate-tabpane pb-5">
			<div class="container tab-content">
			   <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
			   
				 <div class="row">
				   <div class="col-md-4 form-group">
					 <input type="text" name="RAcad" class="form-control" placeholder="RA Do Aluno">
				   </div>
				   <div class="col-md-4 form-group">
					 <input type="password" name="senhacad" class="form-control" placeholder="Senha do Aluno">
				   </div>
				   <div class="col-md-4 form-group">
					 <input type="text" name="nomecad" class="form-control" placeholder="Nome">
				   </div>
				 </div>
				 
				 <div class="row">
				   <div class="col-md-4">
					 <input type="submit" name="cadusu" class="btn btn-black py-3 btn-block" value="CADASTRAR USÚARIO">
				   </div>
				 </div>
				 
			   </div>
			</div>
		  </div>
	  </div>
	</form>
	
	<form action="acaoadm.php" method="POST" >  
	  <div id="delusu" style="display:none;" >
		  <div class="realestate-tabpane pb-5">
			<div class="container tab-content">
			   <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
			   
				 <div class="row">
				   <div class="col-md-6 form-group">
					 <input type="text" name="RAdel" class="form-control" placeholder="RA Do Aluno">
				   </div>
				 </div>
				 <div class="row">
				   <div class="col-md-6">
					 <input type="submit" name="delusu" class="btn btn-black py-3 btn-block" value="EXCLUIR USÚARIO">
				   </div>
				 </div>
				 
			   </div>
			</div>
		  </div>
	  </div>
    </form>
	
	<form action="acaoadm.php" method="POST" > 
	  <div id="cadliv" style="display:none;" >
		  <div class="realestate-tabpane pb-5">
			<div class="container tab-content">
			   <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
			   
				 <div class="row">
				   <div class="col-md-4 form-group">
					 <input type="text" name="cadlivro" class="form-control" placeholder="Nome Do Livro">
				   </div>
				   <div class="col-md-4 form-group">
					 <input type="text" name="cadautor" class="form-control" placeholder="Autor">
				   </div>
				   <div class="col-md-4 form-group">
					 <input type="text" name="cadeditora" class="form-control" placeholder="Editora">
				   </div>
				 </div>
				 
				 <div class="row">
				   <div class="col-md-4">
					 <input type="submit" name="cadliv" class="btn btn-black py-3 btn-block" value="CADASTRAR LIVRO">
				   </div>
				 </div>
				 
			   </div>
			</div>
		  </div>
	  </div>
	</form>
	
	<form action="acaoadm.php" method="POST" >  
	  <div id="delliv" style="display:none;" >
		  <div class="realestate-tabpane pb-5">
			<div class="container tab-content">
			   <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
			   
				 <div class="row">
				   <div class="col-md-6 form-group">
					 <input type="text" name="dellivro" class="form-control" placeholder="Codigo Do Livro">
				   </div>
				 </div>
				 <div class="row">
				   <div class="col-md-6">
					 <input type="submit" name="delliv" class="btn btn-black py-3 btn-block" value="EXCLUIR LIVRO">
				   </div>
				 </div>
				 
			   </div>
			</div>
		  </div>
	  </div>
    </form>
    	
	<script>
	
		function cadusu(){
			
			document.getElementById("cadusu").style.display = "inline";
			document.getElementById("delusu").style.display = "none";
			document.getElementById("cadliv").style.display = "none";
			document.getElementById("delliv").style.display = "none";
		}
		
		function delusu(){
			
			document.getElementById("cadusu").style.display = "none";
			document.getElementById("delusu").style.display = "inline";
			document.getElementById("cadliv").style.display = "none";
			document.getElementById("delliv").style.display = "none";
		}
		
		function cadliv(){
			
			document.getElementById("cadusu").style.display = "none";
			document.getElementById("delusu").style.display = "none";
			document.getElementById("cadliv").style.display = "inline";
			document.getElementById("delliv").style.display = "none";
		}
		
		function delliv(){
			
			document.getElementById("cadusu").style.display = "none";
			document.getElementById("delusu").style.display = "none";
			document.getElementById("cadliv").style.display = "none";
			document.getElementById("delliv").style.display = "inline";
		}
	
	</script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

