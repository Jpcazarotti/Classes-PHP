<?php
class Usuario
{
    private $nome;
    private $email;
    protected $senha;
    private $dataNascimento;
    public $tipoUsuario;

    public function __construct($nome, $email, $senha, $dataNascimento, $tipoUsuario)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
        $this->tipoUsuario = $tipoUsuario;
    }

    public function criar()
    {
        echo "Usuário $this->nome criado com sucesso!";
    }

    public function atualizar($novosDados)
    {
        $this->nome = $novosDados['nome'];
        $this->email = $novosDados['email'];
        $this->senha = $novosDados['senha'];
        $this->dataNascimento = $novosDados['dataNascimento'];
        $this->tipoUsuario = $novosDados['tipoUsuario'];
        echo "Usuário $this->nome atualizado com sucesso!";
    }

    public function remover()
    {
        echo "Usuário $this->nome removido com sucesso!";
    }

    public function deletar()
    {
        echo "Usuário $this->nome deletado permanentemente!";
    }

    public function veriflogin($email, $senha)
    {
        if ($this->email == $email && $this->senha == $senha) {
            return true;
        } else {
            return false;
        }
    }
}

class Intituicoes
{
    private $nome;
    private $endereco;
    private $telefone;
    private $emailContato;
    private $tipoInstituicao;

    public function __construct($nome, $endereco, $telefone, $emailContato, $tipoInstituicao)
    {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->emailContato = $emailContato;
        $this->tipoInstituicao = $tipoInstituicao;
    }

    public function criarInstituicao()
    {
        echo "Instituição $this->nome criada com sucesso!";
    }

    public function editarInstituicao($novaInfo)
    {
        $this->nome = $novaInfo['nome'];
        $this->endereco = $novaInfo['endereco'];
        $this->telefone = $novaInfo['telefone'];
        $this->emailContato = $novaInfo['emailContato'];
        $this->tipoInstituicao = $novaInfo['tipoInstituicao'];
        echo "Instituição $this->nome editada com sucesso!";
    }

    public function exibirInfo()
    {
        echo "
        Instituição: $this->nome<br>
        Endereço: $this->endereco<br>
        Telefone: $this->telefone<br>
        Email: $this-> emailContato<br>
        Tipo: $this->tipoInstituicao
        ";
    }
}