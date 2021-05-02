<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//MTOP
						$this->excel->load("./documents/certification.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
						$var = $franchise['franchise_id'];
						$var = str_pad($var,4,'0',STR_PAD_LEFT);
						$this->excel->getActiveSheet()->SetCellValue('I8', "$var");
						$this->excel->getActiveSheet()->SetCellValue('H7', "$franchise[case_no]");
						$this->excel->getActiveSheet()->SetCellValue('C16', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('C18', "$franchise[route]");
						//missing
						$this->excel->getActiveSheet()->SetCellValue('A24', "$franchise[unit_model]");
						$this->excel->getActiveSheet()->SetCellValue('C24', "$franchise[motor_no]");
						$this->excel->getActiveSheet()->SetCellValue('E24', "$franchise[chassis_no]");
						$this->excel->getActiveSheet()->SetCellValue('H24', "$franchise[plate_num]");
						$expire = $date[2] + 3;
						$this->excel->getActiveSheet()->SetCellValue('G27', "$date[0] $date[1], $expire");
						$this->excel->getActiveSheet()->SetCellValue('B31', "$date[1]th");
						$this->excel->getActiveSheet()->SetCellValue('E31', "$date[0]");
						$this->excel->getActiveSheet()->SetCellValue('F31', "$date[2]");
						
						$this->excel->getActiveSheet()->SetCellValue('B44', "$date[0] $date[1], $date[2]");
						
						//style
						$styleArray = array(
														'font'  => array(
															'bold'  => true,
															'color' => array('rgb' => '000000')
														));
						$this->excel->getActiveSheet()->getStyle('I7')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('H6')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C15')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C17')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('A23')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C23')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('E23')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('H23')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('G26')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('B30')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('E30')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('F30')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('B44')->applyFromArray($styleArray);
						//save
						$this->excel->save('./documents/temp/certification.xls');
					?>