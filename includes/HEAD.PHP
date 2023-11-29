
    <meta charset="utf-8"/>
     <meta name="author" content="Duvan Rodriguez" />
    <title>Proyecto BD</title>

    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/general.css">
   <link rel="stylesheet" href="./css/fonts/style.css">
    <link rel="stylesheet" href="./css/dashboard.css" />
    <!-- fin Bootstrap v4.6 core CSS -->

    <link rel="stylesheet" href="./orden/assets/css/general.css"/>
    <link rel="stylesheet" href="./orden/assets/css/style.css"/>
    <link rel="stylesheet" href="./orden/assets/css/select2.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <link rel=icon href="./orden/assets/img/logo.jpeg" sizes="32x32" type="image/jpeg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link href="./css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    
      <!--iconos-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  
  <link rel="stylesheet" href="./css/custom.css"/>
   <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
.logo-div{
    margin-top: -7%;
}
.logo-header{
    width: 24%;
    margin-left: 33%;
}
.contenido{
    font-size: 13px;
    color: rgb(6, 19, 193);
}
.letras{
    font-size: 40px;
    color: #d49200;
}
.iconos{
    display: inline-table; vertical-align: inherit; 
    background: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0.75) 1%, rgba(255,255,255,0.75) 2%, rgba(161,161,161,0.96) 82%, rgba(161,161,161,1) 95%); /* ff3.6+ */
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,255,255,0.75)), color-stop(1%, rgba(255,255,255,0.75)), color-stop(2%, rgba(255,255,255,0.75)), color-stop(82%, rgba(161,161,161,0.96)), color-stop(95%, rgba(161,161,161,1))); /* safari4+,chrome */
    background:-webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0.75) 1%, rgba(255,255,255,0.75) 2%, rgba(161,161,161,0.96) 82%, rgba(161,161,161,1) 95%); /* safari5.1+,chrome10+ */
    background: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0.75) 1%, rgba(255,255,255,0.75) 2%, rgba(161,161,161,0.96) 82%, rgba(161,161,161,1) 95%); /* opera 11.10+ */
    background: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0.75) 1%, rgba(255,255,255,0.75) 2%, rgba(161,161,161,0.96) 82%, rgba(161,161,161,1) 95%); /* ie10+ */
    background:radial-gradient(ellipse at center, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0.75) 1%, rgba(255,255,255,0.75) 2%, rgba(161,161,161,0.96) 82%, rgba(161,161,161,1) 95%); /* w3c */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#A1A1A1',GradientType=1 ); /* ie6-9 */
     border-radius: 106px;
}
.iconos-uno{
    display: inline-table; vertical-align: inherit; margin-top: 12em; margin-left: 3em;
    border-radius: 71px;
}
.iconos-dos{
    display: inline-table; vertical-align: inherit; margin-top: 12em; margin-left: 5em; margin-right: 3em;
    border-radius: 43px;
}
.iconos-tres{
    display: inline-table; vertical-align: inherit; margin-top: 12em; margin-left: 3em;
    border-radius: 85px; width: 14%; height: 116px;
}
.iconos-cuatro{
    display: inline-table; vertical-align: inherit; margin-left: 3em;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#A1A1A1',GradientType=1 ); /* ie6-9 */
    border-radius: 68px;
}
.iconos:hover
{
-webkit-transform: scale(0.8);
-ms-transform: scale(0.8);
transform: scale(0.8);
}
        .social {
  position: fixed; /* Hacemos que la posición en pantalla sea fija para que siempre se muestre en pantalla*/
  left: 0; /* Establecemos la barra en la izquierda */
  top: 200px; /* Bajamos la barra 200px de arriba a abajo */
  z-index: 2000; /* Utilizamos la propiedad z-index para que no se superponga algún otro elemento como sliders, galerías, etc */
}
 
  .social ul {
    list-style: none;
  }
 
  .social ul li a {
    display: inline-block;
    color:#fff;
    background: #000;
    padding: 22px  15px;
    text-decoration: none;
    -webkit-transition:all 500ms ease;
    -o-transition:all 500ms ease;
    transition:all 500ms ease; /* Establecemos una transición a todas las propiedades */
  }
 
  .social ul li .icon-facebook {background:#3b5998;} /* Establecemos los colores de cada red social, aprovechando su class */
  .social ul li .icon-twitter {background: #00abf0;}
  .social ul li .icon-googleplus {background: #d95232;}
  .social ul li .icon-pinterest {background: #ae181f;}
  .social ul li .icon-mail {background: #666666;}
 
  .social ul li a:hover {
    background: #000; /* Cambiamos el fondo cuando el usuario pase el mouse */
    padding: 10px 30px; /* Hacemos mas grande el espacio cuando el usuario pase el mouse */
  }
    
    
    /*sud header*/
#wrap {
    width: 1288px;
    height: 1320px;
    margin-top: 0;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: auto;
    position: relative;
    top: -8px;
    text-align: center;
}
.cabezote {
    margin-left: 16%;
    margin-top: -10%;
}
/*fin sud header*/
    
        /*barra de navegacios desplegable*/
        * {
  margin:0;
  padding:0;
}
 
/*EN EL VIDEO HAY UN ERROR POR EL CUAL NO SE VISUALIZA EN GOOGLE CHROME,
EL CÓDIGO A CONTINUACIÓN YA ESTA CORREGIDO*/
.logo{
    background: white;
}

.logo-li{
        width: 6px
}

.logo-a{
    padding: 12px;
}

header {
  margin-top:10px;
    width: 100%;
    overflow: hidden;
    height: 150px;
    position: relative;
}
 
nav {
    top:-20px;
    position: fixed;
    left:0;
    right:0;
  margin:20px auto;
  /*max-width:1000px;*/
  width:100%;
    z-index: 100;
    opacity: 0.9;
}
 
nav ul {
  list-style:none;
}
 
nav > ul {
  display:table;
  /*Quitamos el overflow hidden que estaba aqui*/
  width:100%;
  background:#0F5B8B;
  position:relative;
}
 
nav > ul li {
  display:table-cell;
}
 
/*Sub-menu*/
nav > ul > li:hover > ul {
  display:block;
  height:100%;
}
 
nav > ul > li > ul {
  display:block;
  position:absolute;
  background:#000;
  left:0;
  right:0;
  overflow:hidden;
  height:0%;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -ms-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}
 
nav > ul li a {
  color:#fff;
  display:block;
  line-height:20px;
  padding:20px;
  position: relative;
  text-align:center;
  text-decoration:none;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -ms-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}
 
nav > ul > li > ul > li a:hover {
  background:#5da5a2;
}
 
nav > ul > li > a span {
  background:#174459;
  display:block;
  height:100%;
  width:100%;
  left:0;
  position:absolute;
  top:-55px;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -ms-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
    font-size: 39px;
}
 
nav > ul > li > a span .icon {
  display:block;
  line-height:60px;
}
 
nav > ul > li > a:hover > span {
  top:0;
}
 
/*Colores*/
nav ul li a .primero {
  background:#0e5061;
}
 
nav ul li a .segundo {
  background:#5da5a2;
}
 
nav ul li a .tercero {
  background:#f25724;
}
 
nav ul li a .cuarto {
  background:#174459;
}
 
nav ul li a .quinto {
  background:#37a4d9;
}
        </style>

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!-- fin Bootstrap v4.6 core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    


	
	
