<?php

include_once ("Cliente.php");
include_once ("Moto.php");
include_once ('MotoImportada.php');
include_once ('MotoNacional.php');
include_once ("Venta.php");
include_once ("Empresa.php");

$objCliente1 = new Cliente("Monica","Zuluaga","no","dni",95051120);
$objCliente2 = new Cliente("Pedro","Sanchez","no","dni",32541236);

$obMoto11 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10/100);
$obMoto12 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10/100);
$obMoto13 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$obMoto14 = new MotoImportada(14, 12499900, 2023, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);

$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$obMoto11, $obMoto12, $obMoto13, $obMoto14], []);

echo "INFO DE LA EMPRESA\n***************\n";
//echo $empresa;

echo "4) Info de la venta";
echo $empresa->registrarVenta([11,12,13,14], $objCliente2)." $\n";

echo "5) Info de la venta";
echo $empresa->registrarVenta([13,14], $objCliente2)." $\n";


echo "6) Info de la venta";
echo $empresa->registrarVenta([14,2], $objCliente2)." $\n";

echo "7) Ventas realizadas con motos importadas";
$ventasConMotoImportada = $empresa->informarVentasImportadas();
echo $empresa->imprimirColeccion($ventasConMotoImportada);

echo "8) Importe total venta de motos nacionales: ";
echo "$".$empresa->informarSumaVentasNacionales()."\n\n";

echo "INFO DE LA EMPRESA DESPUES DE LAS VENTAS\n***************\n";
echo $empresa;
