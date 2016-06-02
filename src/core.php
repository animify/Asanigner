<?php

class Asana {
	public function getTeam() {
		//edit members here
		//use api to find IDs
		return array (
			"Orvis" => "10195101372080",
			"Mike" => "13156938126329",
			"Nathan" => "75397031620485",
			"Stefan" => "36897880645766",
			"Rich" => "71446175595290"
		);
	}
	public function updateTask($uid, $tid) {
		$data = array("assignee" => $uid);
		$curl = curl_init('https://app.asana.com/api/1.0/tasks/' . $tid);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/x-www-form-urlencoded',
			// 'Authorization: Bearer 0/XXXXXXXXXXXXXXXXXXXXXXXXX'
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl,CURLOPT_USERAGENT,'runscope/0.1');
		$content = curl_exec($curl);
		$httpll = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		echo $httpll;
		curl_close($curl);
	}
}

?>
