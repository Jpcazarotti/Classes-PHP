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

class Paciente
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

class Psicologo {
    private $id;
    private $nome;
    private $email;
    private $CRP;
    private $especialidade;
    private $agenda = [];

    public function __construct($id, $nome, $email, $CRP, $especialidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->CRP = $CRP;
        $this->especialidade = $especialidade;
    }

    public function visualizarHorariosDisponiveis() {
        foreach ($this->agenda as $horario) {
            echo "Horário: " . $horario['data'] . " - " . $horario['hora'] . "<br>";
        }
    }
 
    public function adicionarHorarioDisponivel($data, $hora) {
        $this->agenda[] = ['data' => $data, 'hora' => $hora];
        echo "Horário disponível adicionado: $data às $hora.<br>";
    }
 
    public function visualizarAgenda() {
        if (empty($this->agenda)) {
            echo "Nenhum horário agendado.<br>";
        } else {
            foreach ($this->agenda as $consulta) {
                echo "Consulta marcada para: " . $consulta['data'] . " às " . $consulta['hora'] . "<br>";
            }
        }
    }

    public function getNome() {
        return $this->nome;
    }
 
    public function setNome($nome) {
        $this->nome = $nome;
    }
 
    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
        $this->email = $email;
    }
 
    public function getCRP() {
        return $this->CRP;
    }
 
    public function setCRP($CRP) {
        $this->CRP = $CRP;
    }
 
    public function getEspecialidade() {
        return $this->especialidade;
    }
 
    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }
}

class Agendamento
{
    private $agendamentos = array();

    public function adicionarAgendamento(Agendamento $agendamento)
    {
        $this->agendamentos[] = $agendamento;
    }

    public function removerAgendamento(Agendamento $agendamento)
    {
        foreach ($this->agendamentos as $key => $value) {
            if ($value === $agendamento) {
                unset($this->agendamentos[$key]);
                $this->agendamentos = array_values($this->agendamentos);
                break;
            }
        }
    }

    public function atualizarAgendamento(Agendamento $antigo, Agendamento $novo)
    {
        foreach ($this->agendamentos as $key => $value) {
            if ($value === $antigo) {
                $this->agendamentos[$key] = $novo;
                break;
            }
        }
    }

    public function visualizarAgenda()
    {
        $agendaVisualizacao = "";
        foreach ($this->agendamentos as $agendamento) {
            $agendaVisualizacao .= "Status: " . $agendamento->getStatus() . "\n";
            $agendaVisualizacao .= "Data: " . $agendamento->getData() . "\n";
            $agendaVisualizacao .= "Hora: " . $agendamento->getHora() . "\n";
            $agendaVisualizacao .= "Minuto: " . $agendamento->getMinuto() . "\n";
            $agendaVisualizacao .= "Horários Disponíveis:\n";
            foreach ($agendamento->getHorariosDisponiveis() as $horario) {
                $agendaVisualizacao .= " - " . $horario->getHora() . ":" . $horario->getMinuto() . " (Disponível: " . ($horario->isDisponivel() ? "Sim" : "Não") . ")\n";
            }
            $agendaVisualizacao .= "\n";
        }
        return $agendaVisualizacao;
    }

    public function buscarPorData($data)
    {
        $resultados = array();
        foreach ($this->agendamentos as $agendamento) {
            if ($agendamento->getData() === $data) {
                $resultados[] = $agendamento;
            }
        }
        return $resultados;
    }

   
    public function buscarPorStatus($status)
    {
        $resultados = array();
        foreach ($this->agendamentos as $agendamento) {
            if ($agendamento->getStatus() === $status) {
                $resultados[] = $agendamento;
            }
        }
        return $resultados;
    }
}