
<!DOCTYPE html>
<!--
    Copyright (c) 2012-2014 Adobe Systems Incorporated. All rights reserved.

    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>
<head>
	<meta charset="utf-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="msapplication-tap-highlight" content="no" />
	<!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-3.3.5-dist/css/bootstrap.css" />
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<title>Connexion</title>
</head>
<body>
<div class="app">
	<script type="text/javascript">
		getVue();
	</script>
</div>
<script type="text/javascript" src="cordova.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/oXHR.js"></script>
<script type="text/javascript">
	app.initialize();

	/*getVue(){

		var xhr = getXMLHttpRequest();
		xhr.open('post','Contro/ReqArt.php',true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send('ref='+ref);
		xhr.addEventListener('readystatechange', function(){
			if (xhr.readyState === xhr.DONE && (xhr.status == 200 || xhr.status == 0 )){ // 0 pour en local
				//stringUsers = xhr.responseText ;
				//alert (stringUsers);
				callback(xhr.responseText);
			}
		}, false);
	}*/
</script>
</body>
</html>




