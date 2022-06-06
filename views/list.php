<h1>Listar Contatos</h1>

<table class="table table-hover table-striped">
  <thead class="table-dark">
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($contacts as $id => $contact) {
      echo "<tr>";
      echo "<td>{$contact['name']}</td>";
      echo "<td>{$contact['email']}</td>";
      echo "<td>{$contact['phone']}</td>";
      echo
      "<td>
        <a href='{$baseUrl}/edit?id={$id}' class='btn btn-primary btn-sm'>Editar</a>
        <a href='{$baseUrl}/delete?id={$id}' class='btn btn-danger btn-sm'>Excluir</a>
      </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
