function getArticle(ref, callback){
	
	var xhr = getXMLHttpRequest();
	xhr.open('post','modele/ReqArt.php',true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('ref='+ref);
	xhr.addEventListener('readystatechange', function(){
		if (xhr.readyState === xhr.DONE && (xhr.status == 200 || xhr.status == 0 )){ // 0 pour en local
			//stringUsers = xhr.responseText ;
			//alert (stringUsers);
			callback(xhr.responseText);
		}
	}, false);

}

function existImg(ref, callback){
	
	var xhr = getXMLHttpRequest();
	xhr.open('post','modele/ReqImg.php',true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('ref='+ref);
	xhr.addEventListener('readystatechange', function(){
								if (xhr.readyState === xhr.DONE && (xhr.status == 200 || xhr.status == 502 )){ // 0 pour en local 
									//stringUsers = xhr.responseText ; 
									//alert (stringUsers);
									callback(xhr.responseText);
								}
							}, false);
	
}
