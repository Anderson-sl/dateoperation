<?php
namespace DateOperation\Operation;
define("LITERAL_TYPE", 0);
define("DATETIME_TYPE", 1);

class DateOperation
{
	private $h = 0;
	private $i = 0;
	private $timeZone = "America/Sao_Paulo";
	

	public function __construct()
	{

	}

	public function setTimeZone(string $timeZone)
	{
		if (!is_string($timeZone)) {
			throw new Exception("esperado string no parametro 1 do método setTimeZone", 1);
		}
		$this->timeZone = $timeZone;
		
	}

	public function dateSum($arr = [], $return = true, $tipe = DATETIME_TYPE)
	{
		if (empty($arr)) {
			throw new Exception("Não foi informado coleção de datas para realizar operações matemáticas", 1);
			
		}
		switch ($tipe) {
			case LITERAL_TYPE:
	
				foreach($arr as $key => $value)
				{
					$this->h += $value[0];
					$this->i += $value[1];
				
				}


				break;

			case DATETIME_TYPE:

				foreach ($arr as $key => $value) {
					$value->setTimeZone(new DateTimeZone($this->timeZone));
					$this->h += $value->format("H");
					$this->i += $value->format("i");
				}


				break;
			default:
				# code...
				break;

		}

		$result = intval($this->h)*60;
		
		$result += intval($this->i);
		
		$result = intval($result)/60;
		
		return $this->dateAssemble($arr,$result,$return);
			
	

}

public function dateSub($arr = [], $return = true, $tipe = DATETIME_TYPE)
	{
		if (empty($arr)) {
			throw new Exception("Não foi informado coleção de datas para realizar operações matemáticas", 1);
			
		}
		switch ($tipe) {
			case LITERAL_TYPE:
				$first = false;
				foreach($arr as $key => $value)
				{		
					if($first == false){
						$this->h = $value[0];
						$this->i = $value[1];
						$first = true;
					}else{
						$this->h -= $value[0];
						$this->i -= $value[1];
					}
				
				}


				break;

			case DATETIME_TYPE:

				foreach ($arr as $key => $value) {
					$value->setTimeZone(new DateTimeZone($this->timeZone));
					$first = false;
					if(!$first){
						$this->h = $value->format("H");
						$this->i = $value->format("i");
						$first == true;
						continue;
					}
					$this->h -= $value->format("H");
					$this->i -= $value->format("i");
				}


				break;
			default:
				# code...
				break;

		}

		$result = intval($this->h)*60;
		
		$result += intval($this->i);
		
		$result = intval($result)/60;

		
		return $this->dateAssemble($arr,$result,$return);
			
	

}

public function dateDiffSum($arr = [], $return = true, $tipe = DATETIME_TYPE)
	{
		if (empty($arr)) {
			throw new Exception("Não foi informado coleção de datas para realizar operações matemáticas", 1);
			
		}
		if (count($arr) % 2 != 0) {
			throw new Exception("A coleção de horas informada deve ser par. número impar de datas é inválido", 1);
			
		}
		/*Variavel que armazena a soma das diferenças*/
		$result = 0;
		/******/
		switch ($tipe) {
			case LITERAL_TYPE:
				for($i = 0; $i <= count($arr); $i++)
				{		
					if(isset($arr[$i+1])){
						$this->h = $arr[$i+1][0];
						$this->i = $arr[$i+1][1];
						$this->h -= $arr[$i][0];
						$this->i -= $arr[$i][1];
						$result += (intval($this->h)*60)+intval($this->i);
						$i = $i+1;
					}
					
				}


				break;

			case DATETIME_TYPE:

				for($i = 0; $i <= count($arr); $i++)
				{
					$value->setTimeZone(new DateTimeZone($this->timeZone));
					if(isset($arr[$i+1]))
					{
						$this->h = $arr[$i+1]->format("H");
						$this->i = $arr[$i+1]->format("i");
						$this->h -= $arr[$i]->format("H");
						$this->i -= $arr[$i]->format("i");
						$result += (intval($this->h)*60)+intval($this->i);
						$i = $i+1;
					}
	
				}



				break;
			default:
				# code...
				break;

		}



		$result = intval($result)/60;

		
		return $this->dateAssemble($arr,$result,$return);
			
	

}

protected function dateAssemble($arr = [], $result, $return = true)
{
	if(!is_float($result)){
			return $return == true ? str_pad(intval($result), 2, "0", STR_PAD_LEFT).":"."00" : ["hour"=>$result];
			
		}
			$arr = explode(".", strval($result));
			$hora=str_pad(intval($arr[0]), 2, "0", STR_PAD_LEFT);
			
			$min=strval(round(60*(floatval("0.".$arr[1]))));
			$result < 0 ? $min *= -1: "" ; 

			$min = str_pad($min, 2, "0", STR_PAD_LEFT);
			$result=$hora.":".$min;
			return $return == true ? $result : ["hour"=>$hora,"minute"=>$min];
}

}
