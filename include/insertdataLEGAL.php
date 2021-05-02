<?php
						$today = getdate();
						$date[0] = $today['month'];
						$date[1] = $today['mday'];
						$date[2] = $today['year'];
					
						$this->load->library("excel");
						
						//LEGALIZATION
						$this->excel->load("./documents/legalization.xls");
						$this->excel->setActiveSheetIndex(0);
						//data
						
						$this->excel->getActiveSheet()->SetCellValue('G17', "$franchise[first_name] $franchise[middle_name] $franchise[last_name]");
						$this->excel->getActiveSheet()->SetCellValue('B18', "$franchise[address]");
						$this->excel->getActiveSheet()->SetCellValue('A21', "$franchise[route]");
				
						$this->excel->getActiveSheet()->SetCellValue('D31', "$date[1]th");
						
						$this->excel->getActiveSheet()->SetCellValue('F31', "$date[0], $date[2]");
						
						//save
						$this->excel->save('./documents/temp/legalization.xls');
?>