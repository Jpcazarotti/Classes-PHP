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
class Eventos
{
    private $titulo;
    private $descricao;
    private $data;
    private $localizacao;
    private $organizadores;
    private $participantes = [];

    public function __construct($titulo, $descricao, $data, $localizacao, $organizadores)
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->localizacao = $localizacao;
        $this->organizadores = $organizadores;
    }

    public function criarEvento($usuario)
    {
        if ($usuario->tipoUsuario == 'adm') {
            echo "Evento '$this->titulo' criado com sucesso!";
        } else {
            echo "Você não tem permissão para criar eventos.";
        }
    }

    public function editarEvento($usuario, $novosDados)
    {
        if ($usuario->tipoUsuario == 'adm') {
            $this->titulo = $novosDados['titulo'];
            $this->descricao = $novosDados['descricao'];
            $this->data = $novosDados['data'];
            $this->localizacao = $novosDados['localizacao'];
            $this->organizadores = $novosDados['organizadores'];
            echo "Evento '$this->titulo' editado com sucesso!";
        } else {
            echo "Você não tem permissão para editar eventos.";
        }
    }

    public function excluirEvento($usuario)
    {
        if ($usuario->tipoUsuario == 'adm') {
            echo "Evento '$this->titulo' excluído com sucesso!";
        } else {
            echo "Você não tem permissão para excluir eventos.";
        }
    }

    public function addParticipante($participante)
    {
        $this->participantes[] = $participante;
        echo "Participante '$participante' adicionado ao evento '$this->titulo'.";
    }

    public function removerParticipante($usuario, $participante)
    {
        if ($usuario->tipoUsuario == 'adm') {
            if (($key = array_search($participante, $this->participantes)) !== false) {
                unset($this->participantes[$key]);
                echo "Participante '$participante' removido do evento '$this->titulo'.";
            }
        } else {
            echo "Você não tem permissão para remover participantes.";
        }
    }

    public static function listarEventos()
    {
        echo "Listagem de eventos...";
    }

    public function detalhesEventos()
    {
        echo "Detalhes do evento '$this->titulo': $this->descricao, em $this->data, localizado em $this->localizacao.";
    }

    public static function buscarEventosPorData($data)
    {
        echo "Buscando eventos na data: $data...";
    }
}
class paciente
{
    private $id;
    private $deficiencia;
    private $telefone;

    public function __construct($id, $deficiencia, $telefone)
    {
        $this->id = $id;
        $this->deficiencia = $deficiencia;
        $this->telefone = $telefone;
    }
    public function agendarConsulta() {}
    public function cancelarConsulta() {}
    public function visuHistConsultas() {}
}
