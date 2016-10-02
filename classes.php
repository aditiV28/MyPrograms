<?php 

class user{
	private $UserId,$UserName,$UserMail,$UserPassword;

	public function getUserID(){
		return $this->UserId;
	}

	public function setUserID($UserId){
		$this->UserId = $UserId;
	}

	public function getUserName(){
		return $this->UserName;
	}

	public function setUserName($UserName){
		$this->UserName = $UserName;
	}

	public function getUserMail(){
		return $this->UserMail;
	}

	public function setUserMail($UserMail){
		$this->UserMail = $UserMail;
	}

	public function getUserPassword(){
		return $this->UserPassword;
	}

	public function setUserPassword($UserPassword){
		$this->UserPassword = $UserPassword;
	}

	public function InsertUser(){
		include "conn.php";
		$UserName=$this->getUserName();
		$UserMail=$this->getUserMail();
		$UserPassword=$this->getUserPassword();
		$sql = "INSERT INTO users(UserName,UserMail,UserPassword) VALUES('".$UserName."','".$UserMail."','".$UserPassword."')";
		$result=mysqli_query($link,$sql);
	}

	public function UserLogin(){
		include "conn.php";
		$UserMail=$this->getUserMail();
		$UserPassword=$this->getUserPassword();
		$sql1 = "SELECT * FROM users WHERE $UserMail='".$UserMail."' AND UserPassword='".$UserPassword."' ";
		$result1 = mysqli_query($link,$sql1);
		
		$cnt = $result1->num_rows;
	

		if($cnt==0){
			header("Location: ../index.php?error=1");
			return false;
		}

		else{
			while($data = $result1->fetch_assoc()){
				$this->setUserID($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserMail($data['UserMail']);
				$this->setUserPassword($data['UserPassword']);
				header("Location:Home.php");
				return true;
			}
		}
	}
}

class chat{
	private $ChatId,$ChatUserId,$ChatText;

	public function getChatId(){

		return $this->ChatId;
	}

	public function setChatId($ChatId){
		$this->ChatId = $ChatId;
	}

	public function getChatUserId(){

		return $this->ChatUserId;
	}

	public function setChatUserId($ChatUserId){
		$this->ChatUserId = $ChatUserId;
	}

	public function getChatText(){

		return $this->ChatText;
	}

	public function setChatText($ChatText){
		$this->ChatText = $ChatText;
	}

	public function InsertChat()
	{
		include "conn.php";
		$ChatUserId=$this->getChatUserId;
		$ChatText=$this->getChatText();
		$sql2 = "INSERT INTO chats(ChatUserId,ChatText) VALUES ('".$ChatUserId."','".$ChatText."')";
		$result2 = mysqli_query($link,$sql2);
	}

	public function DisplayMessages(){
		include "conn.php";
		$sql3 = "SELECT * FROM chats";
		$result3 = mysqli_query($link,$sql3);

		while($DataChat = $result3->fetch_assoc()){
			$UserId = $DataChat['ChatUserId'];
			$sql4 = "SELECT * FROM users WHERE UserId='".$UserId."' ";
			$result4 = mysqli_query($link,$sql4);
			$DataUser = $result4->fetch_assoc();
						?>

			<span class="UserNames"><?php echo $DataUser['UserName'];?></span> says: <br/>
			<span class="ChatMessages"><?php echo $DataChat['ChatText'];?></sapn><br/>
			<?php


		}
	}




}



?>
