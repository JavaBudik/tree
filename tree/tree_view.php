<section>
			<p class="section-head">Companies Tree</p>
			<?php
				include('pdo.php');
				tree_view(0);
				$suma = 0;
				function suma($f_id) {
					global $suma;
					global $db;
					$sql = $db->prepare('SELECT * from companies where parent_id = :id');
					$data = array('id'=>$f_id);
					$sql->execute($data);
					$sql->setFetchMode(PDO::FETCH_OBJ);
					$result = $sql->fetchAll();
						foreach ($result as $row) {
							global $suma;
							$suma = $suma + $row->earning;
							suma($row->id);
						}
					return $suma;
				}
				
				function tree_view($c_id) {
					global $db;
					$sql = $db->prepare('SELECT * from companies where parent_id = :id');
					$data = array('id'=>$c_id);
					$sql->execute($data);
					$sql->setFetchMode(PDO::FETCH_OBJ);
					$result = $sql->fetchAll();				
					
						foreach ($result as $row)		
						{
							global $suma;
							$suma = 0;
							$url = 'http://acmacros.temp.swtest.ru/index.php';
							$i = 0;									
							if ($i==0) echo '<ul>';							
							$child_sum = suma($row->id);								
							$sum_total = $row->earning+$child_sum;
							
							if ($child_sum!=0) {
							echo '<li><a href="'.$url.'?c_id='.$row->id.'">'.$row->c_name.'</a>|$'.$row->earning.'|$'.$sum_total;	
							} else {
								echo '<li><a href="'.$url.'?c_id='.$row->id.'">'.$row->c_name.'</a>|$'.$row->earning;
							}
							tree_view($row->id);
							echo '</li>';
							$i++;
							if ($i>0) echo '</ul>';						
						}	
				}
			?>
			
		</section>	
	</div>