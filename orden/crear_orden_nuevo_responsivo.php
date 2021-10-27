<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">  
    <title>Document</title>
    <style>
     @media (max-width: 600px) {
        .ingresoInformacion {
            font-size: 28px;
            width: 35%;
            background-color: transparent;
            color:black;
            border-color: black; 
            margin:10px;
        }
        .botonResponsivo{
            font-size: 20px;
            margin: 10px;
        }
        .resultadosValidacion{
            border:1px solid black;
            font-size: 20px;
            margin:10px;
        }
    }
    </style>
</head>
<body>
    <div id= "principal_responsivo" class="container" align = "center">
        <h2>CREAR ORDEN PLACA</h2>
        <!-- <h3>DIGITE LA PLACA </h3> -->
        <input type="text" class = "ingresoInformacion" id="placa" value = "QJT42F"> 
        
        <button class="btn btn-primary botonResponsivo" id = "consultarOrden" onclick="valide();">CONSULTAR</button>
        <div id="resultadosValidacion" class="resultadosValidacion" align = "left">
            
        </div>
    </div>
</body>
</html>
<script src="../orden/js/orden.js"></script>
