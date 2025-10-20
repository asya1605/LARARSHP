<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Tabel RSHP UNAIR</title>
  <style>
    body { font-family: Poppins, sans-serif; background:#f9fbff; padding:40px; color:#002080; }
    h1 { text-align:center; }
    table { width:100%; border-collapse:collapse; margin:20px 0; }
    th, td { border:1px solid #ccc; padding:10px; text-align:left; }
    th { background:#002080; color:white; }
    tr:nth-child(even) { background:#f2f6ff; }
  </style>
</head>
<body>
  <h1>📊 Data dari Database</h1>

  <h2>👤 Tabel User</h2>
  <table>
    <tr><th>ID</th><th>Nama</th><th>Email</th></tr>
    @foreach($users as $u)
      <tr>
        <td>{{ $u->iduser }}</td>
        <td>{{ $u->nama }}</td>
        <td>{{ $u->email }}</td>
      </tr>
    @endforeach
  </table>

  <h2>🧩 Tabel Role</h2>
  <table>
    <tr><th>ID</th><th>Nama Role</th></tr>
    @foreach($roles as $r)
      <tr>
        <td>{{ $r->idrole }}</td>
        <td>{{ $r->nama_role }}</td>
      </tr>
    @endforeach
  </table>

  <h2>🔗 Relasi Role_User</h2>
  <table>
    <tr><th>ID</th><th>User</th><th>Role</th><th>Status</th></tr>
    @foreach($assignments as $a)
      <tr>
        <td>{{ $a->idrole_user }}</td>
        <td>{{ $a->user->nama }}</td>
        <td>{{ $a->role->nama_role }}</td>
        <td>{{ $a->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>
