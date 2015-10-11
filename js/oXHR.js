// construction du XHR
function getXMLHttpRequest(){
				var xhr = null ;
				
				if (window.XMLHttpRequest || window.ActiveXObect) {
					if( window.ActiveXObect ){
						try{
							xrh = new ActiveXObect("Msxml2.HMLHTTP");
						}catch(e) {
							xhr = new ActiveXObect("Microsoft.XMLHTTP") ;
						}
					}
					else{
						xhr = new XMLHttpRequest() ;
					}
				}else{
					alert('Votre navigateur ne supporte pas l\'objet XMLHttpRequest ... Pensez à le mettre à jour.');
					return null; 
				}
				return xhr;
}	