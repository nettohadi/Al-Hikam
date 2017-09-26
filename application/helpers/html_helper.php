<?php



		function input_date ($label, $name, $width){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';

			$text.='<div class="div-con" style="width:'.$width.'">';

			$text.= '<label style="display:inline-block;margin-right:5px;">Tgl</label>';

			$text.= '<select name="'.$name.'_tgl" style="width: 40px; display:inline-block;" class="con-date">';			

			for($i = 1; $i <=31; $i++){

				$text.='<option value="'.$i.'">'.$i.'</option>';

			}

			$text.='</select>';

			$text.= '<label style="display:inline-block;margin-right:5px;">Bln</label>';

			$text.='<select name="'.$name.'_bln" style="width: 40px;display:inline-block;" class="con-date">';



			for($i = 1; $i <=12; $i++){

				$text.='<option value="'.$i.'">'.$i.'</option>';

			}



			$text.='</select>';

			$text.= '<label style="display:inline-block;margin-right:5px;">Thn</label>';

			$text.='<select name="'.$name.'_thn" style="width: 70px;display:inline-block;" class="con-date">';

			for($i=date("Y");$i<=(date("Y") + 10);$i++){

				$text.='<option value="'.$i.'">'.$i.'</option>';

			}

			$text.='</select>';	

			$text.='</div>';		

			return $text;		

		}



		function input_text($label, $name, $width, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.'" class="con-text"></input></div>';

			return $text;		

		}



		function input_text_hidden($label, $name, $width, $value=""){

			$text='<div class="div-label" style="display:none;"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con" style="display:none;"><input autocomplete="off" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.'" class="con-text"></input></div>';

			return $text;		

		}		



		function input_currency($label, $name, $width, $value=""){			

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.';display:inline-block;text-align:right;" class="con-currency"></input></div>';

			return $text;		

		}



		function input_number($label, $name, $width, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.';text-align:right" class="con-number"></input></div>';

			return $text;		

		}



		function input_percent($label, $name, $width, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.';display:inline-block;;text-align:right" class="con-percent"></input></div>';

			return $text;		

		}



		function input_option($dataModel, $value, $caption, $label, $name, $width, $selectedValue=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';

			$text.='<div class="div-con"><select name="'.$name.'"  style="width: '.$width.'" class="con-select">';

			foreach ($dataModel as $model) {

				if ($model->{$value} == $selectedValue) {

					$text.='<option selected="selected" value="'.$model->{$value}.'">'.$model->{$caption}.'</option>';

				}



				else {

					$text.='<option value="'.$model->{$value}.'">'.$model->{$caption}.'</option>';

				}				

			}

			$text.='</select></div>';

			return $text;

		}



		function submit_button($id, $caption, $width){

			$text= '<div class="div-submit"><input id="'.$id.'" type="submit"  value="'.$caption.'"  class="con-button" style="width:'.$width.'"></input></div>';

			return $text;

		}



		function label_text($label, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-text-label"><label class="con-text-label">'.$value.'</label></div>';

			return $text;		

		}



		function link_button_style($label, $href, $width){

			$text= '<a class="link-button-style" href="'.$href.'" style="width:'.$width.';">'.$label.'</a>';

			return $text;

		}



		function normal_button($id, $caption, $width){

			$text= '<button id="'.$id.'" class="con-button" style="width:'.$width.'">'.$caption.'</button>';

			return $text;

		}

		

?>