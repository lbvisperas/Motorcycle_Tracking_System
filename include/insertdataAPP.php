<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//MTOP
						$this->excel->load("./documents/application.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
						
						$this->excel->getActiveSheet()->SetCellValue('H7', "$franchise[case_no]");
						$this->excel->getActiveSheet()->SetCellValue('G16', "$franchise[address]");
						
						$this->excel->getActiveSheet()->SetCellValue('A23', "$franchise[unit_model]");
						$this->excel->getActiveSheet()->SetCellValue('C23', "$franchise[motor_no]");
						$this->excel->getActiveSheet()->SetCellValue('E23', "$franchise[chassis_no]");
						$this->excel->getActiveSheet()->SetCellValue('H23', "$franchise[plate_num]");
					
						$this->excel->getActiveSheet()->SetCellValue('C33', "$date[0] $date[1], $date[2].");
						$this->excel->getActiveSheet()->SetCellValue('G35', "$franchise[first_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('B39', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('G45', "$franchise[first_name] $franchise[last_name]");
						
						$this->excel->getActiveSheet()->SetCellValue('F48', "$date[1]th");
						$this->excel->getActiveSheet()->SetCellValue('H48', "$date[0], $date[2]");
						
						//save
						$this->excel->save('./documents/temp/application.xls');
					?>