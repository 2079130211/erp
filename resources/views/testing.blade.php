<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="/testing" method="post" enctype="multipart/form-data">
		@csrf
			<input type="file"  accept="image/*" name="file_upload">

			<button type="submit"> Upload</button>

	</form>

</body>
</html>