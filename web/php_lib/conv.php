<?php
function desencriptarPass($passw) 
{
	$pass=desencriptar($passw);
	return $pass;
}
function desencriptarUsu($usuario) 
{
	$user=desencriptar($usuario);
	return $user;
}
function encriptarPass($passw) 
{
	$pass=encriptar($passw);
	return $pass;
}
function encriptarUsu($usuario) 
{
	$user=encriptar($usuario);
	return $user;
}
function desencriptar($cadena) 
{
	$exploded = multiexplode(array("/","*","-",":","?","!"," "),$cadena);
	$cade=implode($exploded);
	$num=strlen($cade);
	if($num=="36"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 
	$cad9 = substr($cade, 24, 3); 
	$cad10 = substr($cade, 27, 3); 
	$cad11 = substr($cade, 30, 3); 
	$cad12 = substr($cade, 33, 3); 
	$cad13 = substr($cade, 36, 3);
	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);
	$cadEnc9=parametrosDes($cad9);
	$cadEnc10=parametrosDes($cad10);
	$cadEnc11=parametrosDes($cad11);
	$cadEnc12=parametrosDes($cad12);
	$cadEnc13=parametrosDes($cad13);
	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11.$cadEnc12.$cadEnc13;
	return $cadFin;}
	if($num=="33"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 
	$cad9 = substr($cade, 24, 3); 
	$cad10 = substr($cade, 27, 3); 
	$cad11 = substr($cade, 30, 3); 
	$cad12 = substr($cade, 33, 3); 
	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);
	$cadEnc9=parametrosDes($cad9);
	$cadEnc10=parametrosDes($cad10);
	$cadEnc11=parametrosDes($cad11);
	$cadEnc12=parametrosDes($cad12);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11.$cadEnc12;
	return $cadFin;}
	if($num=="30"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 
	$cad9 = substr($cade, 24, 3); 
	$cad10 = substr($cade, 27, 3); 
	$cad11 = substr($cade, 30, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);
	$cadEnc9=parametrosDes($cad9);
	$cadEnc10=parametrosDes($cad10);
	$cadEnc11=parametrosDes($cad11);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11;
	return $cadFin;}
	if($num=="27"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 
	$cad9 = substr($cade, 24, 3); 
	$cad10 = substr($cade, 27, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);
	$cadEnc9=parametrosDes($cad9);
	$cadEnc10=parametrosDes($cad10);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10;
	return $cadFin;}
	if($num=="24"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 
	$cad9 = substr($cade, 24, 3); 
	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);
	$cadEnc9=parametrosDes($cad9);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9;
	return $cadFin;}
	if($num=="21"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 
	$cad8 = substr($cade, 21, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);
	$cadEnc8=parametrosDes($cad8);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8;
	return $cadFin;}
	if($num=="18"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 
	$cad7 = substr($cade, 18, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);
	$cadEnc7=parametrosDes($cad7);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7;
	return $cadFin;}
	if($num=="15"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 
	$cad6 = substr($cade, 15, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);
	$cadEnc6=parametrosDes($cad6);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6;
	return $cadFin;}
	if($num=="12"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 
	$cad5 = substr($cade, 12, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);
	$cadEnc5=parametrosDes($cad5);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5;
	return $cadFin;}
	if($num=="9"){
	$cad1 = substr($cade, 0, 3);
	$cad2 = substr($cade, 3, 3); 
	$cad3 = substr($cade, 6, 3); 
	$cad4 = substr($cade, 9, 3); 

	$cadEnc1=parametrosDes($cad1);
	$cadEnc2=parametrosDes($cad2);
	$cadEnc3=parametrosDes($cad3);
	$cadEnc4=parametrosDes($cad4);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4;
	return $cadFin;}
}
function encriptar($cadena) 
{
	$num=strlen($cadena);
	if($num=="13"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 
	$cad9 = substr($cadena, 8, 1); 
	$cad10 = substr($cadena, 9, 1); 
	$cad11 = substr($cadena, 10, 1); 
	$cad12 = substr($cadena, 11, 1); 
	$cad13 = substr($cadena, 12, 1); 
	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);
	$cadEnc9=parametros($cad9);
	$cadEnc10=parametros($cad10);
	$cadEnc11=parametros($cad11);
	$cadEnc12=parametros($cad12);
	$cadEnc13=parametros($cad13);
	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11.$cadEnc12.$cadEnc13;
	return $cadFin;}
	if($num=="12"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 
	$cad9 = substr($cadena, 8, 1); 
	$cad10 = substr($cadena, 9, 1); 
	$cad11 = substr($cadena, 10, 1); 
	$cad12 = substr($cadena, 11, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);
	$cadEnc9=parametros($cad9);
	$cadEnc10=parametros($cad10);
	$cadEnc11=parametros($cad11);
	$cadEnc12=parametros($cad12);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11.$cadEnc12;
	return $cadFin;}
	if($num=="11"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 
	$cad9 = substr($cadena, 8, 1); 
	$cad10 = substr($cadena, 9, 1); 
	$cad11 = substr($cadena, 10, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);
	$cadEnc9=parametros($cad9);
	$cadEnc10=parametros($cad10);
	$cadEnc11=parametros($cad11);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10.$cadEnc11;
	return $cadFin;}
	if($num=="10"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 
	$cad9 = substr($cadena, 8, 1); 
	$cad10 = substr($cadena, 9, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);
	$cadEnc9=parametros($cad9);
	$cadEnc10=parametros($cad10);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9.$cadEnc10;
	return $cadFin;}
	if($num=="9"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 
	$cad9 = substr($cadena, 8, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);
	$cadEnc9=parametros($cad9);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8.$cadEnc9;
	return $cadFin;}
	if($num=="8"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 
	$cad8 = substr($cadena, 7, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);
	$cadEnc8=parametros($cad8);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7.$cadEnc8;
	return $cadFin;}
	if($num=="7"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1); 
	$cad7 = substr($cadena, 6, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);
	$cadEnc7=parametros($cad7);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6.$cadEnc7;
	return $cadFin;}
	if($num=="6"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 
	$cad6 = substr($cadena, 5, 1);  
	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);
	$cadEnc6=parametros($cad6);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5.$cadEnc6;
	return $cadFin;}
	if($num=="5"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 
	$cad5 = substr($cadena, 4, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);
	$cadEnc5=parametros($cad5);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4.$cadEnc5;
	return $cadFin;}
	if($num=="4"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 
	$cad4 = substr($cadena, 3, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);
	$cadEnc4=parametros($cad4);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3.$cadEnc4;
	return $cadFin;}
	if($num=="3"){
	$cad1 = substr($cadena, 0, 1);
	$cad2 = substr($cadena, 1, 1); 
	$cad3 = substr($cadena, 2, 1); 

	$cadEnc1=parametros($cad1);
	$cadEnc2=parametros($cad2);
	$cadEnc3=parametros($cad3);

	$cadFin=$cadEnc1.$cadEnc2.$cadEnc3;
	return $cadFin;}
}
function parametros($cadena)
{
	if($cadena=='0'){$cadena='tGb?';}
	if($cadena=='1'){$cadena='Bgt*';}
	if($cadena=='2'){$cadena='gtB*';}
	if($cadena=='3'){$cadena='Gbt!';}
	if($cadena=='4'){$cadena='qAz/';}
	if($cadena=='5'){$cadena='zaQ*';}
	if($cadena=='6'){$cadena='Aqz-';}
	if($cadena=='7'){$cadena='aZq:';}
	if($cadena=='8'){$cadena='Edc?';}
	if($cadena=='9'){$cadena='cDe*';}
	if($cadena=='A'){$cadena='dcE:';}
	if($cadena=='B'){$cadena='Dec!';}
	if($cadena=='C'){$cadena='uJm/';}
	if($cadena=='D'){$cadena='Mju*';}
	if($cadena=='E'){$cadena='jmU-';}
	if($cadena=='F'){$cadena='Jum:';}
	if($cadena=='G'){$cadena='xSw?';}
	if($cadena=='H'){$cadena='wsX/';}
	if($cadena=='I'){$cadena='Sxw/';}
	if($cadena=='J'){$cadena='sWx!';}
	if($cadena=='K'){$cadena='Rfv:';}
	if($cadena=='L'){$cadena='vFr-';}
	if($cadena=='M'){$cadena='frV*';}
	if($cadena=='N'){$cadena='Fvr/';}
	if($cadena=='O'){$cadena='yHn?';}
	if($cadena=='P'){$cadena='Nhy*';}
	if($cadena=='Q'){$cadena='hyN-';}
	if($cadena=='R'){$cadena='Hny!';}
	if($cadena=='S'){$cadena='zQa/';}
	if($cadena=='T'){$cadena='Xws*';}
	if($cadena=='U'){$cadena='cEd-';}
	if($cadena=='V'){$cadena='Vrf:';}
	if($cadena=='W'){$cadena='bTg?';}
	if($cadena=='X'){$cadena='Nyh-';}
	if($cadena=='Y'){$cadena='mUj/';}
	if($cadena=='Z'){$cadena='Xyz-';}
	
	return $cadena;
}
function parametrosDes($cadena)
{
	if($cadena=='tGb'){$cadena='0';}
	if($cadena=='Bgt'){$cadena='1';}
	if($cadena=='gtB'){$cadena='2';}
	if($cadena=='Gbt'){$cadena='3';}
	if($cadena=='qAz'){$cadena='4';}
	if($cadena=='zaQ'){$cadena='5';}
	if($cadena=='Aqz'){$cadena='6';}
	if($cadena=='aZq'){$cadena='7';}
	if($cadena=='Edc'){$cadena='8';}
	if($cadena=='cDe'){$cadena='9';}
	if($cadena=='dcE'){$cadena='A';}
	if($cadena=='Dec'){$cadena='B';}
	if($cadena=='uJm'){$cadena='C';}
	if($cadena=='Mju'){$cadena='D';}
	if($cadena=='jmU'){$cadena='E';}
	if($cadena=='Jum'){$cadena='F';}
	if($cadena=='xSw'){$cadena='G';}
	if($cadena=='wsX'){$cadena='H';}
	if($cadena=='Sxw'){$cadena='I';}
	if($cadena=='sWx'){$cadena='J';}
	if($cadena=='Rfv'){$cadena='K';}
	if($cadena=='vFr'){$cadena='L';}
	if($cadena=='frV'){$cadena='M';}
	if($cadena=='Fvr'){$cadena='N';}
	if($cadena=='yHn'){$cadena='O';}
	if($cadena=='Nhy'){$cadena='P';}
	if($cadena=='hyN'){$cadena='Q';}
	if($cadena=='Hny'){$cadena='R';}
	if($cadena=='zQa'){$cadena='S';}
	if($cadena=='Xws'){$cadena='T';}
	if($cadena=='cEd'){$cadena='U';}
	if($cadena=='Vrf'){$cadena='V';}
	if($cadena=='bTg'){$cadena='W';}
	if($cadena=='Nyh'){$cadena='X';}
	if($cadena=='mUj'){$cadena='Y';}
	if($cadena=='Xyz'){$cadena='Z';}
	
	return $cadena;
}

function multiexplode ($delimiters,$string) {
   
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
?>