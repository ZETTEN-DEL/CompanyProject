<!DOCTYPE html>
<html>

<head>

<title>Data Artikel</title>

<style>

table{
width:100%;
border-collapse:collapse;
}

table,th,td{
border:1px solid black;
}

th,td{
padding:8px;
}

h2{
text-align:center;
}


</style>

</head>


<body>


<h2>DATA ARTIKEL</h2>


<table>


<thead>

<tr>

<th>No</th>
<th>Foto</th>
<th>Judul</th>
<th>Author</th>
<th>Tanggal</th>

</tr>

</thead>



<tbody>


@foreach($articles as $article)

<tr>


<td>{{ $loop->iteration }}</td>


<td>

<img 
src="{{ public_path('image/'.$article->foto) }}"
width="80">

</td>


<td>
{{ $article->title }}
</td>


<td>
{{ $article->author }}
</td>


<td>
{{ $article->publish_date }}
</td>


</tr>


@endforeach


</tbody>


</table>


</body>

</html>