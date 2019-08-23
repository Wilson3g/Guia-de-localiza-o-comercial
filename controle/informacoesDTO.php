<?php
    require_once 'informacoesDAO.php';
    require_once 'administradorDAO.php';

    // SESSÃO REFERENTE AO ARQUIVO INFORMACOESDAO

    // INSERE OS DADOS NO BANCO DE DADOS LOGIN_USUARIO
    
    if(isset($_POST['cadastrar'])){
        
        $senha = sha1($_POST['senha']);
        $email = $_POST['email'];
        

        // INSTANCIA DA CLASSE CLIENTE NO ARQUIVO 'CLIENTE.PHP'
        $empresaDAO = new informacoes();
        $empresaDAO -> setEmail($email);
        $empresaDAO -> setSenha($senha);

        $salvar = $empresaDAO;

        $empresaDAO -> salvar($salvar);
    }

    // INSERE OS DADOS NO BANCO DE DADOS LOGIN_USUARIO

    if(isset($_POST['terminar'])){

        $nome = $_POST['nomeFantasia'];
        $descricao = $_POST['descricao'];
        $inicioExpediente = $_POST['inicioExpediente'];
        $fimExpediente = $_POST['fimExpediente'];
        $categoria = $_POST['categoria'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $idusuario = $_POST['idusuario'];

        // array da imagem
        $img = $_FILES['img'];

        // chamada do objeto informações
        $info = new Informacoes();
        $info -> setNome($nome);
        $info -> setDescricao($descricao);
        $info -> setInicioExpediente($inicioExpediente);
        $info -> setFimExpediente($fimExpediente);
        $info -> setTipoEstabelecimento($categoria);
        $info -> setCNPJ($cnpj);
        $info -> setTelefone($telefone);

        $array = $info;

        $info -> inserirInformacoes($array, $img, $idusuario);

        }elseif(isset($_POST['atualizar'])){
            
            $nome = $_POST['nomeFantasia'];
            $endereco = $_POST['endereco'];
            $descricao = $_POST['descricao'];
            $inicioExpediente = $_POST['inicioExpediente'];
            $fimExpediente = $_POST['fimExpediente'];
            $tipoEstabelecimento = $_POST['estabelecimento'];
            $cnpj = $_POST['cnpj'];

            $id = $_POST['fid'];

            $img = $_FILES['img'];

            // chamada do objeto informações
            $info = new Informacoes();
            $info -> setNome($nome);
            $info -> setEndereco($endereco);
            $info -> setDescricao($descricao);
            $info -> setInicioExpediente($inicioExpediente);
            $info -> setFimExpediente($fimExpediente);
            $info -> setTipoEstabelecimento($tipoEstabelecimento);
            $info -> setCNPJ($cnpj);

            $array = $info;

            $adm = new Administrador();

            $adm -> atualizarInformacoes($id, $array, $img);
        }
        
        if(isset($_POST['concluir'])){

            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estados'];
            $numero = $_POST['numero'];
            $idusuario = $_POST['idempresa'];
    
            // chamada do objeto informações
            $info = new Informacoes();
            $info -> setEndereco($endereco);
            $info -> setCidade($cidade);
            $info -> setEstado($estado);
            $info -> setNumero($numero);
    
            $array = $info;
    
            $info -> inserirEndereco($array, $idusuario);
    
        }
?>