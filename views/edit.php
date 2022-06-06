<h1>Editar Contato <?= $id ?></h1>

<hr>

<form action="" method="post">
  <input class="form-control mb-3" type="text" name="name" placeholder="Nome" required value="<?= $contact['name']; ?>">
  <input class="form-control mb-3" type="email" name="email" placeholder="Email" required value="<?= $contact['email']; ?>">
  <input class="form-control mb-3" type="text" name="phone" placeholder="Telefone" required value="<?= $contact['phone']; ?>">

  <button class="btn btn-primary">Editar</button>
</form>
