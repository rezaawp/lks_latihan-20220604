<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Monitoring</title>
</head>
<body>
	<!-- Harus di filter lagi bagaimana caranya supaya nama murid sesuai dengan yang diajar nya. -->
	@foreach($user as $item)
		<a href="">{{ $item->nama_lengkap }}</a> <br>
	@endforeach
</body>
</html>