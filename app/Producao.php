<?php
  
namespace App;
  
use Log;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Agua;
use App\Carboidratos;
use App\Proteinas;
use App\Micronutrientes;
use App\Resultado;
use App\Regra;
use App\Classes\PertenenciaTriangular;
use App\Classes\EtiquetaLinguistica;
use App\Classes\VariableLinguistica;
use App\Classes\BaseConocimiento;
use App\Classes\ReglaInferencia;
use App\Classes\ReglaInferenciaException;
use App\Classes\Minimo;
use App\Classes\Maximo;
use App\Classes\Mamdani;
use App\Classes\MotorInferenciaMamdani;
use App\Classes\DefuzificadorCOG;
   
class Producao extends Model
{
    protected $fillable = [
        'id_animal',
        'data',
        'agua',
        'carboidratos',
        'proteinas',
        'micronutrientes',
        'resultado',
        'obs',
        'producao_real',
    ];
    protected $table = 'producoes';

    public static function TermoA($termo) {
        switch ($termo) {
            case 1:
                return "Ruim";
                break;
            case 2:
                return "Regular";
                break;
            case 3:
                return "Bom";
                break;
            case 4:
                return "Excelente";
                break;
            default: 
                return "";   
        }
    }

    public static function TermoC($termo) {
        switch ($termo) {
            case 1:
                return "Ruim";
                break;
            case 2:
                return "Satisfatorio";
                break;
            case 3:
                return "Excelente";
                break;
            default: 
                return "";   
        }
    }

    public static function EstimativaFuzzy($p_agua, $p_carboidratos, $p_proteinas, $p_micronutrientes) {
        
        //@@@@@ Definicao da Agua @@@@@
        $agua = Agua::findOrFail(1);
        // definindo pertinencia
        // construct($limite_esquerdo, $limite_direito, $centro);
        $t_agua_1 = new PertenenciaTriangular($agua->ruim_a     , $agua->ruim_b     , $agua->ruim_a); 
        $t_agua_2 = new PertenenciaTriangular($agua->regular_a  , $agua->regular_c  , $agua->regular_b); 
        $t_agua_3 = new PertenenciaTriangular($agua->bom_a      , $agua->bom_c      , $agua->bom_b); 
        $t_agua_4 = new PertenenciaTriangular($agua->excelente_a, $agua->excelente_b, $agua->excelente_b); 
        // definindo termos linguisticos
        // construct($nome, $limite_esquerdo, $limite_direito, $pertinencia);
        $t_agua_ruim      = new EtiquetaLinguistica('Ruim'     , $agua->ruim_a     , $agua->ruim_b     , $t_agua_1); 
        $t_agua_regular   = new EtiquetaLinguistica('Regular'  , $agua->regular_a  , $agua->regular_b  , $t_agua_2); 
        $t_agua_bom       = new EtiquetaLinguistica('Bom'      , $agua->bom_a      , $agua->bom_c      , $t_agua_3); 
        $t_agua_excelente = new EtiquetaLinguistica('Excelente', $agua->excelente_a, $agua->excelente_b, $t_agua_4); 
        // definindo variavel
        // construct($nome, $inferior, $superior, $termos_linguisticos, $grau) 
        $VarAgua = new VariableLinguistica('Agua', $agua->ruim_a, $agua->excelente_b, 
            array($t_agua_ruim, $t_agua_regular, $t_agua_bom, $t_agua_excelente), 0.1);

        //@@@@@ Definicao de Carboidratos @@@@@
        $carboidratos = Carboidratos::findOrFail(1);
        // definindo pertinencia
        // construct($limite_esquerdo, $limite_direito, $centro);
        $t_carboidratos_1 = new PertenenciaTriangular($carboidratos->ruim_a     , $carboidratos->ruim_b     , $carboidratos->ruim_a); 
        $t_carboidratos_2 = new PertenenciaTriangular($carboidratos->regular_a  , $carboidratos->regular_c  , $carboidratos->regular_b); 
        $t_carboidratos_3 = new PertenenciaTriangular($carboidratos->bom_a      , $carboidratos->bom_c      , $carboidratos->bom_b); 
        $t_carboidratos_4 = new PertenenciaTriangular($carboidratos->excelente_a, $carboidratos->excelente_b, $carboidratos->excelente_b); 
        // definindo termos linguisticos
        // construct($nome, $limite_esquerdo, $limite_direito, $pertinencia);
        $t_carboidratos_ruim      = new EtiquetaLinguistica('Ruim'     , $carboidratos->ruim_a     , $carboidratos->ruim_b     , $t_carboidratos_1); 
        $t_carboidratos_regular   = new EtiquetaLinguistica('Regular'  , $carboidratos->regular_a  , $carboidratos->regular_b  , $t_carboidratos_2); 
        $t_carboidratos_bom       = new EtiquetaLinguistica('Bom'      , $carboidratos->bom_a      , $carboidratos->bom_c      , $t_carboidratos_3); 
        $t_carboidratos_excelente = new EtiquetaLinguistica('Excelente', $carboidratos->excelente_a, $carboidratos->excelente_b, $t_carboidratos_4); 
        // definindo variavel
        // construct($nome, $inferior, $superior, $termos_linguisticos, $grau) 
        $VarCarboidratos = new VariableLinguistica('Carboidratos', $carboidratos->ruim_a, $carboidratos->excelente_b, 
            array($t_carboidratos_ruim, $t_carboidratos_regular, $t_carboidratos_bom, $t_carboidratos_excelente), 0.1);


        //@@@@@ Definicao de Proteinas @@@@@
        $proteinas = Proteinas::findOrFail(1);
        // definindo pertinencia
        // construct($limite_esquerdo, $limite_direito, $centro);
        $t_proteinas_1 = new PertenenciaTriangular($proteinas->ruim_a     , $proteinas->ruim_b     , $proteinas->ruim_a); 
        $t_proteinas_2 = new PertenenciaTriangular($proteinas->regular_a  , $proteinas->regular_c  , $proteinas->regular_b); 
        $t_proteinas_3 = new PertenenciaTriangular($proteinas->bom_a      , $proteinas->bom_c      , $proteinas->bom_b); 
        $t_proteinas_4 = new PertenenciaTriangular($proteinas->excelente_a, $proteinas->excelente_b, $proteinas->excelente_b); 
        // definindo termos linguisticos
        // construct($nome, $limite_esquerdo, $limite_direito, $pertinencia);
        $t_proteinas_ruim      = new EtiquetaLinguistica('Ruim'     , $proteinas->ruim_a     , $proteinas->ruim_b     , $t_proteinas_1); 
        $t_proteinas_regular   = new EtiquetaLinguistica('Regular'  , $proteinas->regular_a  , $proteinas->regular_b  , $t_proteinas_2); 
        $t_proteinas_bom       = new EtiquetaLinguistica('Bom'      , $proteinas->bom_a      , $proteinas->bom_c      , $t_proteinas_3); 
        $t_proteinas_excelente = new EtiquetaLinguistica('Excelente', $proteinas->excelente_a, $proteinas->excelente_b, $t_proteinas_4); 
        // definindo variavel
        // construct($nome, $inferior, $superior, $termos_linguisticos, $grau) 
        $VarProteinas = new VariableLinguistica('Proteinas', $proteinas->ruim_a, $proteinas->excelente_b, 
            array($t_proteinas_ruim, $t_proteinas_regular, $t_proteinas_bom, $t_proteinas_excelente), 0.1);


        //@@@@@ Definicao de Micronutrientes @@@@@
        $micronutrientes = Micronutrientes::findOrFail(1);
        // definindo pertinencia
        // construct($limite_esquerdo, $limite_direito, $centro);
        $t_micronutrientes_1 = new PertenenciaTriangular($micronutrientes->ruim_a     , $micronutrientes->ruim_b     , $micronutrientes->ruim_a); 
        $t_micronutrientes_2 = new PertenenciaTriangular($micronutrientes->regular_a  , $micronutrientes->regular_c  , $micronutrientes->regular_b); 
        $t_micronutrientes_3 = new PertenenciaTriangular($micronutrientes->bom_a      , $micronutrientes->bom_c      , $micronutrientes->bom_b); 
        $t_micronutrientes_4 = new PertenenciaTriangular($micronutrientes->excelente_a, $micronutrientes->excelente_b, $micronutrientes->excelente_b); 
        // definindo termos linguisticos
        // construct($nome, $limite_esquerdo, $limite_direito, $pertinencia);
        $t_micronutrientes_ruim      = new EtiquetaLinguistica('Ruim'     , $micronutrientes->ruim_a     , $micronutrientes->ruim_b     , $t_micronutrientes_1); 
        $t_micronutrientes_regular   = new EtiquetaLinguistica('Regular'  , $micronutrientes->regular_a  , $micronutrientes->regular_b  , $t_micronutrientes_2); 
        $t_micronutrientes_bom       = new EtiquetaLinguistica('Bom'      , $micronutrientes->bom_a      , $micronutrientes->bom_c      , $t_micronutrientes_3); 
        $t_micronutrientes_excelente = new EtiquetaLinguistica('Excelente', $micronutrientes->excelente_a, $micronutrientes->excelente_b, $t_micronutrientes_4); 
        // definindo variavel
        // construct($nome, $inferior, $superior, $termos_linguisticos, $grau) 
        $VarMicronutrientes = new VariableLinguistica('Micronutrientes', $micronutrientes->ruim_a, $micronutrientes->excelente_b, 
            array($t_micronutrientes_ruim, $t_micronutrientes_regular, $t_micronutrientes_bom, $t_micronutrientes_excelente), 0.1);


        //@@@@@ Definicao do Resultado @@@@@
        $resultado = Resultado::findOrFail(1);
        // definindo pertinencia
        // construct($limite_esquerdo, $limite_direito, $centro);
        $t_resultado_1 = new PertenenciaTriangular($resultado->ruim_a          , $resultado->ruim_b        , $resultado->ruim_a); 
        $t_resultado_2 = new PertenenciaTriangular($resultado->satisfatorio_a  , $resultado->satisfatorio_c, $resultado->satisfatorio_b); 
        $t_resultado_3 = new PertenenciaTriangular($resultado->excelente_a     , $resultado->excelente_b   , $resultado->excelente_b); 
        // definindo termos linguisticos
        // construct($nome, $limite_esquerdo, $limite_direito, $pertinencia);
        $t_resultado_ruim         = new EtiquetaLinguistica('Ruim'        , $resultado->ruim_a        , $resultado->ruim_b        , $t_resultado_1); 
        $t_resultado_satisfatorio = new EtiquetaLinguistica('Satisfatorio', $resultado->satisfatorio_a, $resultado->satisfatorio_b, $t_resultado_2); 
        $t_resultado_excelente    = new EtiquetaLinguistica('Excelente'   , $resultado->excelente_a   , $resultado->excelente_b   , $t_resultado_3); 
        // definindo variavel
        // construct($nome, $inferior, $superior, $termos_linguisticos, $grau) 
        $VarResultado = new VariableLinguistica('Resultado', $resultado->ruim_a, $resultado->excelente_b, 
            array($t_resultado_ruim, $t_resultado_satisfatorio, $t_resultado_excelente), 0.1);



        //@@@@@ Base de conhecimento @@@@@
        $Base = new BaseConocimiento();
        $Regras = Regra::all(); 
        try {
            $contador=0;
            foreach ($Regras as $Regra) {
                
                // Agua
                if ($Regra->termo_agua) {
                    $regra_agua = array($VarAgua, self::TermoA($Regra->termo_agua));
                } else {
                    $regra_agua = array();    
                }
                // Carboidratos
                if ($Regra->termo_carboidratos) {
                    $regra_carboidratos = array($VarCarboidratos, self::TermoA($Regra->termo_carboidratos));
                } else {
                    $regra_carboidratos = array();
                }
                // Proteinas
                if ($Regra->termo_proteinas) {
                    $regra_proteinas = array($VarProteinas, self::TermoA($Regra->termo_proteinas));
                } else {
                    $regra_proteinas = array();
                }
                // Micronutrientes
                if ($Regra->termo_micronutrientes) {
                    $regra_micronutrientes = array($VarMicronutrientes, self::TermoA($Regra->termo_micronutrientes));
                } else {
                    $regra_micronutrientes = array();
                }
                // Resultado
                $regra_resultado = array($VarResultado, self::TermoC($Regra->termo_resultado));

                // Monta a regra de antecedentes
                $regra_final = array();
                if (!empty($regra_agua)) {
                    array_push($regra_final, $regra_agua);
                }
                if (!empty($regra_carboidratos)) {
                    array_push($regra_final, $regra_carboidratos);
                }
                if (!empty($regra_proteinas)) {
                    array_push($regra_final, $regra_proteinas);
                }
                if (!empty($regra_micronutrientes)) {
                    array_push($regra_final, $regra_micronutrientes);
                }

                // Adiciona na Base a Regra Final
                if (!empty($regra_final)) {
                    if ($Regra->tipo_conexao==2) {
                        $regra_final = array($regra_final);    
                    }
                    $contador++;
                    $Base->add_regla(new ReglaInferencia($contador, $regra_final, $regra_resultado));
                }
            }
        }
        catch(ReglaInferenciaException $e) { 
            die('error: '.$e->getMessage()); 
        }; 

        $conjuncion = new Minimo('Min');
        $disyuncion = new Maximo('Max');
        $implicacion = new Mamdani('Mamdani');
        $agregacion = new Maximo('agregacion Max');
        
        //$base_conocimiento; - regras de inferência de entrada para o motor de inferência
        //$tnorma;            - TNorma utilizada para avaliar a conjuncion dos antecedentes   
        //$tconorma;          - TConorma utilizada para avaliar aa disjuncion dos antecedentes   
        //$implicacion;       - Tipo de implicacion utilizada en las reglas de inferencia
        //$agregacion;        - Tipo de TConorma usada en la agregacion de los resultados de las reglas de inferencia  

        $motor = new MotorInferenciaMamdani($Base, $conjuncion, $disyuncion, $implicacion, $agregacion);

        $VarAgua->fuzificar(floatval($p_agua));
        $VarCarboidratos->fuzificar(floatval($p_carboidratos));
        $VarProteinas->fuzificar(floatval($p_proteinas));
        $VarMicronutrientes->fuzificar(floatval($p_micronutrientes));

        $resultados = $motor->inferir(array($VarAgua, $VarCarboidratos, $VarProteinas, $VarMicronutrientes));
        $cog = new DefuzificadorCOG();
        $litros = $cog->defuzificar($resultados);
        if (empty($litros)) {
            $litros = 0;       
        }
        return floatval($litros['Resultado'][0]);
    }

    public static function Index() {
        return DB::table('producoes')
            ->leftJoin('animais', 'animais.id', '=', 'producoes.id_animal')
            ->select('producoes.id', 'producoes.data', 'producoes.resultado',
                     'producoes.producao_real', 'animais.identificacao')
            ->orderBy('producoes.data', 'desc')
            ->orderBy('producoes.id', 'desc')
            ->paginate(5);
    }

    public static function PorID($id) {
        return DB::table('producoes')
            ->leftJoin('animais', 'animais.id', '=', 'producoes.id_animal')
            ->select('producoes.id', 'producoes.data', 'producoes.resultado',
                     'producoes.agua', 'producoes.carboidratos',
                     'producoes.proteinas', 'producoes.micronutrientes',
                     'producoes.producao_real', 'animais.identificacao')
            ->where('producoes.id', $id)
            ->get();
    }
}