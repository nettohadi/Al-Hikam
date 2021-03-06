<?php


		function YMD_to_DMY($date){
			$text = substr($date, 8, 2)."-".
			substr($date, 5, 2)."-".
			substr($date, 0, 4);

			return $text;
		}


		function input_date_YMD_to_DMY ($label, $name, $width, $value="0000-00-00"){
			$value = YMD_to_DMY($value);
			
			$text ='<div class="div-label"><label class="con-label">'.$label.'</label></div>';

			$text.='<div class="div-con" style="width:'.$width.'">';

			$text.= '<label style="display:inline-block;margin-right:5px;">Tgl</label>';

			$text.= '<select name="'.$name.'_tgl" style="width: 40px; display:inline-block;" class="con-date">';			

			for($i = 0; $i <=31; $i++){
				if (strlen($i)!=2) {$val = "0".$i;}else{$val=$i;}
				if ($val == substr($value, 0, 2)) {
					$text.='<option value="'.$val.'" selected="selected">'.$val.'</option>';
				}
				else{
					$text.='<option value="'.$val.'">'.$val.'</option>';	
				}

			}

			$text.='</select>';

			$text.= '<label style="display:inline-block;margin-right:5px;">Bln</label>';

			$text.='<select name="'.$name.'_bln" style="width: 40px;display:inline-block;" class="con-date">';



			for($i = 0; $i <=12; $i++){

				if (strlen($i)!=2) {$val = "0".$i;}else{$val=$i;}
				if ($val == substr($value, 3, 2)) {
					$text.='<option value="'.$val.'" selected="selected">'.$val.'</option>';
				}
				else{
					$text.='<option value="'.$val.'">'.$val.'</option>';	
				}
			}



			$text.='</select>';

			$text.= '<label style="display:inline-block;margin-right:5px;">Thn</label>';

			$text.='<select name="'.$name.'_thn" style="width: 70px;display:inline-block;" class="con-date">';

			$text.='<option value="00">0000</option>';	

			for($i=date("Y");$i<=(date("Y") + 10);$i++){

				if ($i == (int)(substr($value, 6, 4))) {
					$text.='<option value="'.$i.'" selected="selected">'.$i.'</option>';
				}
				else{
					$text.='<option value="'.$i.'">'.$i.'</option>';	
				}

			}

			$text.='</select>';	

			$text.='</div>';		

			return $text;		

		}



		function input_text($label, $name, $width, $value="", $class=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="text" style="width: '.$width.'" class="con-text '.$class.'"></input></div>';

			return $text;		

		}



		function input_text_hidden($name, $value="", $id=""){

			$text='<input autocomplete="off" id="'.$id.'" name="'.$name.'" value="'.$value.'" type="text" style="display:none;"></input>';

			return $text;		

		}		



		function input_currency($label, $name, $width, $value=""){			

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="tel" style="width: '.$width.';display:inline-block;text-align:right;" class="con-currency"></input></div>';

			return $text;		

		}



		function input_number($label, $name, $width, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="tel" style="width: '.$width.';text-align:right" class="con-number"></input></div>';

			return $text;		

		}



		function input_percent($label, $name, $width, $value=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';



			$text.='<div class="div-con"><input autocomplete="off" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="tel" style="width: '.$width.';display:inline-block;;text-align:right" class="con-percent"></input></div>';

			return $text;		

		}


		function input_option_with_quickAdd($dataModel, $value, $caption, $label, $name, $width, $selectedValue="", $defaultValue="", $formUrl=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';

			$text.='<div class="div-con" style="width: '.$width.'" ><select id="'.$name.'" name="'.$name.'"  class="con-select-quickAdd">';

			// jika data kosong, isi data kosong dan keluar
			if ($dataModel == NULL) {				
				$text.='</select></div><div class="quick-add" formUrl="'.$formUrl.'/'.$name.'"><span class="quick-add-ico"></span></div></div>';
				return $text;
			}

			$text.='<option value="">'.$defaultValue.'</option>';

			foreach ($dataModel as $model) {

				if ($model->{$value} == $selectedValue) {

					$text.='<option selected="selected" value="'.$model->{$value}.'">'.$model->{$caption}.'</option>';

				}



				else {

					$text.='<option value="'.$model->{$value}.'">'.$model->{$caption}.'</option>';

				}				

			}

			$text.='</select><div class="quick-add" formUrl="'.$formUrl.'/'.$name.'"><span class="quick-add-ico"></span></div></div>';

			return $text;
		}

		function input_option($dataModel, $value, $caption, $label, $name, $width, $selectedValue="",$defaultValue=""){

			$text='<div class="div-label"><label class="con-label">'.$label.'</label></div>';

			$text.='<div class="div-con"><select id="'.$name.'" name="'.$name.'"  style="width: '.$width.'" class="con-select">';

			// jika data kosong, isi data kosong dan keluar
			if ($dataModel == NULL) {				
				$text.='</select></div>';
				return $text;
			}

			$text.='<option value="">'.$defaultValue.'</option>';

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

			$text= '<div class="div-link-button-style"><a class="link-button-style" href="'.$href.'" style="width:'.$width.';">'.$label.'</a></div>';

			return $text;

		}



		function normal_button($id, $caption, $width,$href=''){

			$text= '<div class="div-button"><button id="'.$id.'" class="con-button" style="width:'.$width.'" onclick="goTo(\''.$href.'\')">'.$caption.'</button></div>';

			return $text;

		}

		
		function print_html_select_options($dataModel, $value, $caption, $defaultValue){
			$text.='<option value="">'.$defaultValue.'</option>';
			foreach ($dataModel as $model) {
				$text.='<option value="'.$model->{$value}.'">'.$model->{$caption}.'</option>';
			}

			return $text;
		}

?>