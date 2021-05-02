<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//ORDER for drop
						$this->excel->load("./documents/petition.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
					
						$this->excel->getActiveSheet()->SetCellValue('A7', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('H7', "$franchise[case_no]");
						$this->excel->getActiveSheet()->SetCellValue('C17', "$franchise[route]");
						$this->excel->getActiveSheet()->SetCellValue('D18', "$franchise[expire_date]");
						//missing
						$this->excel->getActiveSheet()->SetCellValue('A22', "$franchise[unit_model]");
						$this->excel->getActiveSheet()->SetCellValue('C22', "$franchise[motor_no]");
						$this->excel->getActiveSheet()->SetCellValue('E22', "$franchise[chassis_no]");
						$this->excel->getActiveSheet()->SetCellValue('H22', "$franchise[plate_num]");
						
						$this->excel->getActiveSheet()->SetCellValue('C32', "$date[0] $date[1], $date[2].");
						$this->excel->getActiveSheet()->SetCellValue('G35', "$franchise[first_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('B39', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('A48', "$franchise[first_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('F51', "$date[1]th");
						$this->excel->getActiveSheet()->SetCellValue('H51', "$date[0], $date[2].");
						$this->excel->getActiveSheet()->SetCellValue('B53', "$date[0] $date[1], $date[2].");
						$this->excel->getActiveSheet()->SetCellValue('E53', "Sorsogon City Philippines.");
						
						//save
						$this->excel->save('./documents/temp/petition.xls');
					?>