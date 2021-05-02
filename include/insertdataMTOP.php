<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//MTOP
						$this->excel->load("./documents/mtop1.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
						$this->excel->getActiveSheet()->SetCellValue('C8', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('H8', "$franchise[case_no]");
						$this->excel->getActiveSheet()->SetCellValue('B9', "$franchise[address]");
						$this->excel->getActiveSheet()->SetCellValue('B10', "$date[0] $date[1], $date[2]");
						$this->excel->getActiveSheet()->SetCellValue('A16', "$franchise[unit_model]");
						$this->excel->getActiveSheet()->SetCellValue('C16', "$franchise[motor_no]");
						$this->excel->getActiveSheet()->SetCellValue('E16', "$franchise[chassis_no]");
						$this->excel->getActiveSheet()->SetCellValue('H16', "$franchise[plate_num]");
						$this->excel->getActiveSheet()->SetCellValue('C45', "$date[1]th");
						$this->excel->getActiveSheet()->SetCellValue('E45', "$date[0]");
						$this->excel->getActiveSheet()->SetCellValue('F45', "$date[2]");
						$this->excel->getActiveSheet()->SetCellValue('B52', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$var = $franchise['franchise_id'];
						$var = str_pad($var,4,'0',STR_PAD_LEFT);
						$this->excel->getActiveSheet()->SetCellValue('C55', "$var");
						//style
						$styleArray = array(
														'font'  => array(
															'bold'  => true,
															'color' => array('rgb' => '000000')
														));
						$this->excel->getActiveSheet()->getStyle('C8')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('H8')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('B9')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('B10')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('A16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('E16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('H16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C45')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('E45')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('F45')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C55')->applyFromArray($styleArray);
						
						//save
						$this->excel->save('./documents/temp/mtop1.xls');
				
					?>