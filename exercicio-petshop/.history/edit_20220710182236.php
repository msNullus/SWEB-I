<?php
// inicializar mensagens
$ERROR = "";
$WARNINNG = "";

// conectar com o banco de dados
$conn = new mysqli("127.0.0.1", "root", "", "projeto_petshop");

if ($conn->connect_error) {
	$ERROR = "<span style='color: red;''>Erro ".$conn->connect_error."</span>";
    echo $ERROR;
}

// buscando os dados
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $WARNNING = "<span style='color: green'>Pet atualizado!</span>";
    $id_user = $_GET['id'];

    $query = $conn->prepare("SELECT id, nome, especie, raca FROM pet WHERE id = ?");
    $query->bind_param("s", $id_user);
} else {
    $WARNNING = "<span style='color: red'>Pet não encontrado!</span>";
}
?>

<center>
<div>
    <h1>PetShop da Belinha</h1>

    <h2>Cadastrar Pet🐶</h2>

    [<a href="index.html">Home🏠</a>]
    [<a href="consulta.php">Consultar🔍</a>]
    [<a href="cadastro.php">Cadastrar✅</a>]
</div>
<br>

<!-- exibindo os dados -->
<table width="100%" border="0" cellspacing="12px" cellpadding="16px">
    <tr bgcolor="#DFDFDF" style="color: #090503; font-family: 'Poppins', cursive; font-size: 1rem">
        <th>Nome</th>
        <th>Espécie</th>
        <th>Raça</th>
    </tr>

    
    <tr bgcolor='#f1f1f1'>
        <td><?php echo $row['nome']; ?></td>
        <td><?php echo $row['especie']; ?></td>
        <td><?php echo $row['raca']; ?></td>
    </tr>    
</table>

</center>