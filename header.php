<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title><?php echo $title?></title>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<style type="text/css">
body {
	/* 	background-color:rgb(20,60,20); */
	padding-top: <?php echo $padding?>px;
}

legend {
	font-size: 30px;
	color: purple;
}

form {
	width: 400px;
	margin: auto;
}

input {
	width: 100%;
	text-align: center;
	height: 30px;
}

fieldset {
	display: grid;
	align-items: center;
	height:<?php echo $taille?>vh;
	padding: 20px;
}

fieldset div {
	height: 100px;
}

button {
	width: 80px;
	margin: auto;
	height: 30px;
}

#ul {
	background-color: #909192;
}

li {
	padding: 5px 0;
	color: #9f9;
}
.red{
    border-color:red;
    color:red;
}
.cred{
    color:red:
}
/* body { */
/* 	background-color: #354351; */
/* } */

/* form { */
/* 	width: 25%; */
/* 	margin: auto; */
/* 	margin-top: 2%; */
/* 	height: 80vh; */
/* 	background-color: #452465; */
/* 	font-size: 20px; */
/* } */

/* fieldset { */
/* 	padding: 0px; */
/* 	height: 100%; */
/* 	box-shadow: 0 0 30px #541564; */
/* } */

/* legend { */
/* 	font-size: 30px; */
/* } */

/* #field { */
/* 	width: 100%; */
/* 	height: 100%; */
/* } */

/* .pfield { */
/* 	margin: 50px; */
/* 	display: flex; */
/* 	align-items: center; */
/* 	justify-content: center; */
/* } */

/* input { */
/* 	width: 50%; */
/* 	height: 40px; */
/* } */

/* label { */
/* 	width: 50%; */
/* } */

/* button { */
/* 	background-color: #459856; */
/* 	width: 100px; */
/* 	height: 50px; */
/* 	border-color: #459856; */
/* 	box-shadow: 0 0 12px #549846; */
/* } */

/* button:active { */
/* 	box-shadow: 0 0 black; */
/* 	transition: 0.5s; */
/* } */

/* .erreur { */
/* 	background-color: rgba(200,70,70,1); */
/* 	font-size:20px; */
/* 	padding:10px; */
/* 	width: 80%; */
/* 	border-radius: 10px; */
/* 	margin:20px auto 0 auto; */
/* } */
/* a{ */
/*     margin:0 10px; */
/*     color:orange; */
/*     text-decoration: none; */
/* } */
</style>
</head>
<body>