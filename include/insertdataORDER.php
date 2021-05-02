<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//ORDER for drop
						$this->excel->load("./documents/orderfordrop.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
						$var = $franchise['franchise_id'];
						$var = str_pad($var,4,'0',STR_PAD_LEFT);
						
						$this->excel->getActiveSheet()->SetCellValue('C9', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('B10', "$franchise[case_no]");
						$this->excel->getActiveSheet()->SetCellValue('I10', "$franchise[expire_date]");
						$this->excel->getActiveSheet()->SetCellValue('F11', "$franchise[route]");
						//missing
						$this->excel->getActiveSheet()->SetCellValue('A16', "$franchise[unit_model]");
						$this->excel->getActiveSheet()->SetCellValue('C16', "$franchise[motor_no]");
						$this->excel->getActiveSheet()->SetCellValue('F16', "$franchise[chassis_no]");
						$this->excel->getActiveSheet()->SetCellValue('H16', "$franchise[plate_num]");
						
						$this->excel->getActiveSheet()->SetCellValue('E31', "$date[0] $date[1], $date[2].");
						$this->excel->getActiveSheet()->SetCellValue('C40', "$date[0] $date[1], $date[2]");
						
						//style
						$styleArray = array(
														'font'  => array(
															'bold'  => true,
															'color' => array('rgb' => '000000')
														));
						$this->excel->getActiveSheet()->getStyle('C9')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('B10')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('I10')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('F11')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('A16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('F16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('H16')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('E31')->applyFromArray($styleArray);
						$this->excel->getActiveSheet()->getStyle('C40')->applyFromArray($styleArray);
						
						//save
						$this->excel->save('./documents/temp/orderfordrop.xls');
					?>