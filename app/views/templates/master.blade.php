<!doctype html>
<html>
	<head>
		<script type="text/javascript" src="/js/angular.min.js"></script>
		<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>


		<script type="text/javascript" src="/bootstrap-3.3.2/js/bootstrap.min.js"></script>		

		<script type="text/javascript" src="/js/ui-bootstrap-tpls-0.12.0.min.js"></script>

		<link rel="stylesheet" href="/bootstrap-3.3.2/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/bootstrap-3.3.2/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="/css/default.css" />
		
		@yield("head")
	</head>
	<body>
		<div class="container">
			@yield("content")
		</div>
	</body>

</html>