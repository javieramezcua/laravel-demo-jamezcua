<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirCraft extends Model
{
	use HasFactory;
	protected $guarded = [];

	public function sort_items(){
		$total_aircrafts = $this::all()->toArray(); # on due that we inherit properties and variables, we have a "$this" variable
		
		$return = $this::sorting_aircraft( $total_aircrafts ); # if the method is not static, call it this way
		

		return json_encode($return);
	}

	public function sorting_aircraft($aircrafts){

		$return_array = array();
		$array_emergency = array();
		$array_vip 		 = array();
		$array_passenger = array();
		$array_cargo 	 = array();
		for ( $key = 0; $key < count($aircrafts); $key++ ){
	
			

			switch($aircrafts[$key]['type']){
				case "Emergency":
					array_push( $array_emergency ,$aircrafts[$key]);
				break;
				case "VIP":
					array_push( $array_vip ,$aircrafts[$key]);
				break;
				case "Passenger":
					array_push( $array_passenger ,$aircrafts[$key]);
				break;
				case "Cargo":
					array_push( $array_cargo ,$aircrafts[$key]);
				break;
			}	
			
		}
		$tmp_array_emergency = $this::sorting_inner($array_emergency);
		$tmp_array_vip 		 = $this::sorting_inner($array_vip);
		$tmp_array_passenger = $this::sorting_inner($array_passenger);
		$tmp_array_cargo 	 = $this::sorting_inner($array_cargo);
		
		$return_array	 = array_merge($tmp_array_emergency,$tmp_array_vip,$tmp_array_passenger,$tmp_array_cargo);

		return $return_array;

	}

	public function sorting_inner($aircrafts){
		$sortArray = array();
		foreach($aircrafts as $aircraft){
			foreach($aircraft as $key=>$value){
				if(!isset($sortArray[$key])){
					$sortArray[$key] = array();
				}
				$sortArray[$key][] = $value;
			}
		}
		
		$orderby = 'size';
		array_multisort($sortArray[$orderby], SORT_ASC, $aircrafts);
		return $aircrafts;
	}

	

}
