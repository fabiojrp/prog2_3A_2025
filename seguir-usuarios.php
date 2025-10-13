<?php
  include "incs/topo.php";
?>

  <!-- Conteúdo Principal -->
  <main class="container my-5 w-75">
    <h3 class="text-center">Escolha seus amigos</h3>
    <form action="" class="w-75 mx-auto text-start row">
        <div class="mb-3 col-8">
            <label class="form-label">Nome do usuário</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="mb-3 col-4">
            <button type="submit" class="btn btn-dark btn-lg my-4">Buscar</button>    
        </div>
    
      <div class="row w-50 my-3">
      <?php
        require_once "src/UsuarioDAO.php";
        
        
        if (isset($_GET['nome'])){            
          $usuarios = UsuarioDAO::buscarUsuarioParaSeguir($_SESSION['idusuario'], $_GET['nome']);
        }else{
          $usuarios = [];
        }

        foreach ($usuarios as $usuario) {
            ?>
        
        <div class="mb-2 col-8">
          <?=$usuario['nome']?>
        </div>
        <div class="mb-2 col-4">
          <a href="seguir.php?idseguido=<?=$usuario['idusuario']?>" class="btn btn-success mx-3">
            Adicionar
          </a>
        </div>
        
        <?php
        }
        
        ?>
        </div>
    </form>
  </main>

<?php
  include "incs/footer.php";
?>