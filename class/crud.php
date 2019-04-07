<?php
class crud{
	private $con;
	
	public function crud(){
		$this->con=new mysqli('localhost','root','','practice-hrm');
	}
	
	public function insert($table,$datas){
		if(is_array($datas)){
			$sql="insert into $table set ";
			foreach($datas as $col=>$data){
				$sql.="$col='$data',";
			}
			$sql=rtrim($sql,",");
			$rs=$this->con->query($sql);
			if($rs){
				$return=array('code'=>'1','msg'=>'Data inserted');
			}
			else{
				$return=array('code'=>'0','msg'=>'Data was not inserted.Please try again');
			}
		}else{
			$return=array('code'=>'0','msg'=>'Please provide data as array');
		}
		
		return $return;
	}
	
	public function common_select($table,$field,$sort=false,$sort_order='ASC',$cons=false){
		$sql="SELECT $field from $table";
		if(is_array($cons)){
			$sql.=" where ";
			foreach($cons as $col=>$con){
				$sql.="$col='$con' and ";
			}
			$sql=rtrim($sql," and ");
		}
		
		if($sort){
			$sql.=" order by $sort $sort_order";
		}
		
		$rss=$this->con->query($sql);
		$return=array();
		while($rs=$rss->fetch_array(MYSQLI_ASSOC)){
			$return[]=$rs;
		}
		return $return;
	}
	
	
	
	public function common_update($table,$datas,$cons){
		if(is_array($datas)){
			// First line of query
			$sql="update $table set ";
			foreach($datas as $col=>$data){
				// ready data for update
				$sql.="$col='$data',";
			}
			$sql=rtrim($sql,","); // remove last , form set data
			/* this is for multiple condition */
			if(is_array($cons)){
				$sql.=" where ";
				foreach($cons as $col=>$con){
					$sql.="$col='$con' and ";
				}
				$sql=rtrim($sql," and ");
				echo $sql;
				
				$rs=$this->con->query($sql);
				echo $rs;
				if($rs){
					$return=array('code'=>'1','msg'=>'Data updated');
				}
				else{
					$return=array('code'=>'0','msg'=>'Data was not updated.Please try again');
				}
			}else{
				$return=array('code'=>'0','msg'=>'Please provide conditoin as array');
			}
			
		}else{
			$return=array('code'=>'0','msg'=>'Please provide data as array');
		}
		return $return;
	}
}
 
 ?>
