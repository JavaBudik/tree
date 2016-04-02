<section>
			<p class="section-head">Companies Tree</p>
			<?php
				include('pdo.php');
				tree_view(0);
				function tree_view($c_id) {
					global $db;
					$sql = $db->prepare('SELECT * from companies where parent_id = :id');
					$data = array('id'=>$c_id);
					$sql->execute($data);
					$sql->setFetchMode(PDO::FETCH_OBJ);
					$result = $sql->fetchAll();
					echo ('tree');
					print_r($sql->fetchAll());
						foreach ($result as $row)		
						{
							$url = 'http://localhost/tree/index.php';
							$children_earn=0;
							$i = 0;									
							if ($i==0) echo '<ul>';
							global $db;
							$sql = $db->prepare('SELECT * from companies where parent_id = :id');
							$data = array('id'=>$row->id);
							$sql->execute($data);
							$sql->setFetchMode(PDO::FETCH_OBJ);
							$children = $sql->fetchAll();
							foreach ($children as $ch) {
								$children_earn+=$ch->earning;
							}
							if ($children_earn!=0) {
								$sum = $children_earn+$row->earning;
							echo '<li><a href="'.$url.'?c_id='.$row->id.'">'.$row->c_name.'</a>|$'.$row->earning.'|$'.$sum;	
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