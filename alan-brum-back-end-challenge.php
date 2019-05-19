<!DOCTYPE html>
<html>   <!--HTML Utilizado-->
<head>
	<title>Conversor de Moedas</title>
		
</head>
<body>
<style>  
div.a {
        text-align: center;
}
</style>
<div class="a">
<h2>Conversor de Moedas</h2>
<form method="POST" >
	
	<span>Moeda de Entrada:</span>   <!--Selecionar a Primeira Moeda-->
	<select name="moeda_entrada">
		<option selected></option>
		<option value="Real" selected="1">Real</option>
		<option value="Dolar">Dólar</option>
		<option value="Euro">Euro</option>
	</select> <br/> <br/>
	
	<span>Moeda de Saída:</span>     <!--Selecionar a Moeda de Destino-->
	<select name="moeda_saida">
	<option selected></option>
		<option value="Real">Real</option>
		<option value="Dolar" selected="1">Dólar</option>
		<option value="Euro">Euro</option>
	</select><br/> <br/>
	
	<label>Digite a Quantidade de Moeda:</label> 
	<input type="text"  name="quantidade_moeda"/><br/> <br/> <!--Entrar com a quantidade de moeda-->
	
	
	<input type="submit" name="" value="Converter Moedas"> <br/> <br/>   <!--Botão para Enviar os Valores-->
	
	</form>
	</div>
</body>
</html>
<div style="text-align:center;">
 <?php //Aqui começa o código em PHP
$quantidade_moeda = isset($_POST['quantidade_moeda'])?$_POST['quantidade_moeda']:"Campo para Preencher"; 
$moeda_entrada = isset($_POST["moeda_entrada"])?$_POST["moeda_entrada"]:"Campo para Preencher"; 
$moeda_saida = isset($_POST["moeda_saida"])?$_POST["moeda_saida"]:"Campo para Preencher";    
	switch ($moeda_entrada) 
	{
		case (empty($quantidade_moeda)):
		echo "Digite a quantidade da Moeda de entrada";
		break;
				case "Dolar":
				switch ($moeda_saida) {
				case "Real":
				de_dolar_para_real($quantidade_moeda);
				break;
					case "Euro":
					echo "Função não Implementada";
					break;
	}
		break;
	case "Real":
		switch ($moeda_saida) 
		{
			case "Dolar":
			de_real_para_dolar($quantidade_moeda);
				break;
			case "Euro":
				de_real_para_euro($quantidade_moeda);
					break;
					case "Real":
					echo "Função não Implementada";
					
		}
	break;
	case "Euro":
		switch ($moeda_saida) 
		{
		case "Real":
			de_euro_para_real($quantidade_moeda);
			break;
				case "Dolar":
				echo "Função não Implementada";
		}
			
			
		break;
	}

function de_real_para_dolar($formatar_numero)
	{
	$open = "https://pt.exchange-rates.org/";   //Site utilizado para buscar a cotação em tempo real
	$parse_url = file_get_contents($open);
	$table = explode('td class="cross-rate">', $parse_url);
	$encontra_valor = explode("<br>", $table[2]);
	$numero_com_virgula = str_replace(",",".",$formatar_numero);
	$conversao_com_virgula =str_replace(",", ".", $encontra_valor[0]);
	$calcular_dolar_apos_conversao = $conversao_com_virgula* $numero_com_virgula;
	echo "U$ ".str_replace(".",",",$calcular_dolar_apos_conversao);
	
	}
function  de_dolar_para_real($formatar_numero){
	$open = "https://pt.exchange-rates.org/";
	$parse_url = file_get_contents($open);
	$table = explode('<td class="cross-rate">', $parse_url);
	$encontra_valor = explode("<br>", $table[15]);
	$numero_com_virgula = str_replace(",",".",$formatar_numero);
	$conversao_com_virgula =str_replace(",", ".", $encontra_valor[0]);
	$calcular_real_apos_conversao = $conversao_com_virgula * $numero_com_virgula;
	echo "R$ ".str_replace(".",",",$calcular_real_apos_conversao);
}
function de_real_para_euro($formatar_numero){
	$open = "https://pt.exchange-rates.org/";
	$parse_url = file_get_contents($open);
	$table = explode('td class="cross-rate">', $parse_url);
	$encontra_valor = explode("<br>", $table[1]);
	$numero_com_virgula = str_replace(",",".",$formatar_numero);
	$de_real_para_euro =str_replace(",", ".", $encontra_valor[0]);
	$calcular_euro_apos_conversao = $de_real_para_euro * $numero_com_virgula;
	echo "€ ".str_replace(".",",",$calcular_euro_apos_conversao);
}
function de_euro_para_real($formatar_numero){

	$open = "https://pt.exchange-rates.org/";
	$parse_url = file_get_contents($open);
	$table = explode('<td class="cross-rate">', $parse_url);
	$encontra_valor = explode("<br>", $table[8]);
	$numero_com_virgula = str_replace(",",".",$formatar_numero);
	$numero_euro_com_virgula =str_replace(",", ".",$encontra_valor[0]);
	$conversao_euro_para_real = $numero_euro_com_virgula * $numero_com_virgula;
	echo  "R$ ".str_replace(",", ".",$conversao_euro_para_real);
}	

				 ?>
				 </div>