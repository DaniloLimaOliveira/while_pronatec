<?php

/* admin\aula\aulaRegister.html.twig */
class __TwigTemplate_f7bc162ccbbae338428b8c4f9ba69652679e336de489c9022680e2c38b3cdd18 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@SonataAdmin/standard_layout.html.twig", "admin\\aula\\aulaRegister.html.twig", 1);
        $this->blocks = array(
            'sonata_admin_content' => array($this, 'block_sonata_admin_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@SonataAdmin/standard_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaRegister.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaRegister.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_admin_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_admin_content"));

        // line 4
        echo "
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" />

    <div class=\"divOpacity\" style=\"display:none\"></div>
    <div id=\"loading\" class=\"loading\">
        <img alt=\"Processando\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/loading.gif"), "html", null, true);
        echo "\" /> Carregando...
    </div>

    <div class=\"alert alert-error alert-dismissable\" style=\"display:none\" id=\"div_mensagem\">
        <span id=\"mensagem\"></span>
    </div>
    <div class=\"sonata-ba-form\">
        <form role=\"form\" action=\"/admin/aula/save\" method=\"POST\">
            <input type=\"hidden\" id='id' name=\"id\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 17, $this->source); })()), "getId", array(), "method"), "html", null, true);
        echo "\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"box box-primary\">
                                <div class=\"box-header\">
                                    <h4 class=\"box-title\">
                                        Registro de Aula
                                    </h4>
                                </div>
                                <div class=\"box-body\">
                                    ";
        // line 29
        $this->loadTemplate("admin/aula/aulaCabecalhoPartial.html.twig", "admin\\aula\\aulaRegister.html.twig", 29)->display(array_merge($context, array("Model" =>         // line 30
(isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 30, $this->source); })()))));
        // line 32
        echo "                                    <div class=\"form-group\">
                                        <label class=\"control-label required\">
                                            Data
                                        </label>
                                        <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
                                            <input id=\"data\" type=\"date\" name=\"data\" required=\"required\" class=\"form-control\"
                                                   ";
        // line 38
        echo ((array_key_exists("Aula", $context)) ? ("readonly") : (""));
        echo "
                                                   value=\"";
        // line 39
        echo twig_escape_filter($this->env, ((array_key_exists("Aula", $context)) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Aula"]) || array_key_exists("Aula", $context) ? $context["Aula"] : (function () { throw new Twig_Error_Runtime('Variable "Aula" does not exist.', 39, $this->source); })()), "getData", array(), "method"), "Y-m-d")) : ("")), "html", null, true);
        echo "\"
                                                   autofocus>
                                            <br/>
                                            <button type=\"button\" class=\"btn btn-success\" name=\"btn_ok\" id=\"btn_ok\">
                                                <i class=\"fa fa-check\" aria-hidden=\"true\"></i> OK
                                            </button>
                                            <button type=\"reset\" class=\"btn btn-warning\" name=\"btn_reset\" id=\"btn_reset\">
                                                <i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> Limpar
                                            </button>
                                        </div>
                                    </div>
                                    <div id=\"aulaRegisterPartial\">
                                        ";
        // line 51
        if (array_key_exists("Aula", $context)) {
            // line 52
            echo "                                            ";
            $this->loadTemplate("admin/aula/aulaRegisterPartial.html.twig", "admin\\aula\\aulaRegister.html.twig", 52)->display(array_merge($context, array("Model" =>             // line 53
(isset($context["Aula"]) || array_key_exists("Aula", $context) ? $context["Aula"] : (function () { throw new Twig_Error_Runtime('Variable "Aula" does not exist.', 53, $this->source); })()))));
            // line 55
            echo "                                        ";
        }
        // line 56
        echo "                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id=\"botoes\" class=\"sonata-ba-form-actions well well-small form-actions\" ";
        // line 63
        echo ((array_key_exists("Aula", $context)) ? ("") : ("style=\"visibility:hidden"));
        echo "\">
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_update_and_edit\" value=\"1\">  <i class=\"fa fa-save\" aria-hidden=\"true\"></i> Gravar e manter</button>
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_update_and_list\" value=\"2\">  <i class=\"fa fa-save\"></i> <i class=\"fa fa-list\" aria-hidden=\"true\"></i> Gravar e sair</button>
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_create_and_create\" value=\"3\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Gravar e adicionar outra aula</button>
            </div>
        </form>
    </div>

    <script type=\"text/javascript\">

        function exibirMensagemSucesso(mensagem){
            \$(\"#div_mensagem\").css(\"display\", \"block\");
            \$(\"#mensagem\").html(mensagem);
            \$(\"#div_mensagem\").removeClass('alert-error');
            \$(\"#div_mensagem\").addClass(\"alert-success\");
        }

        function exibirMensagemErro(mensagem){
            \$(\"#div_mensagem\").css(\"display\", \"block\");
            \$(\"#mensagem\").html(mensagem);
            \$(\"#div_mensagem\").removeClass('alert-success');
            \$(\"#div_mensagem\").addClass(\"alert-error\");
        }

        function esconderMensagem(){
            \$(\"#div_mensagem\").css(\"display\", \"none\");
        }

        \$(document).ajaxStart(function() {
            \$(\".loading\").css(\"display\", \"block\");
            \$(\".divOpacity\").css(\"display\", \"block\");
        });

        \$(document).ajaxStop(function()
        {
            \$(\".loading\").css(\"display\", \"none\");
            \$(\".divOpacity\").css(\"display\", \"none\");
        });

        \$(function() {

            var mensagem = '";
        // line 104
        echo twig_escape_filter($this->env, ((array_key_exists("Mensagem", $context)) ? ((isset($context["Mensagem"]) || array_key_exists("Mensagem", $context) ? $context["Mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "Mensagem" does not exist.', 104, $this->source); })())) : ("")), "html", null, true);
        echo "';
            if(mensagem != ''){
                //\$(\"#data\").attr('readonly', 'readonly');
                exibirMensagemSucesso(mensagem);
            }

            \$(\"#btn_ok\").click(function() {
                if(\$('#data')[0].checkValidity())
                {
                    \$.post(
                        \"/admin/aula/listFrequencia\",
                        {
                            id:   \$(\"#id\").val(),
                            data: \$(\"#data\").val()
                        },
                        function( response ) {
                            if(response.status == 'success') {
                                \$(\"#aulaRegisterPartial\").html(response.data);
                                \$(\"#data\").attr('readonly', 'readonly');
                                \$(\"#botoes\").css(\"visibility\", \"visible\");
                                esconderMensagem();
                            }else {
                                exibirMensagemErro(response.data);
                            }
                        }
                    );
                }else {
                    exibirMensagemErro('Favor preencher o campo com uma data válida!');
                }
            });

            \$(\"#btn_reset\").click(function() {
                \$(\"#aulaRegisterPartial\").html('');
                \$(\"#data\").removeAttr('readonly');
                \$(\"#data\").focus();
                \$(\"#botoes\").css(\"visibility\",\"hidden\");
                \$(\"#div_mensagem\").css(\"display\", \"none\");
            });

        });

    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "admin\\aula\\aulaRegister.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 104,  137 => 63,  128 => 56,  125 => 55,  123 => 53,  121 => 52,  119 => 51,  104 => 39,  100 => 38,  92 => 32,  90 => 30,  89 => 29,  74 => 17,  63 => 9,  56 => 5,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@SonataAdmin/standard_layout.html.twig' %}

{% block sonata_admin_content %}

    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('css/style.css') }}\" />

    <div class=\"divOpacity\" style=\"display:none\"></div>
    <div id=\"loading\" class=\"loading\">
        <img alt=\"Processando\" src=\"{{ asset('images/loading.gif') }}\" /> Carregando...
    </div>

    <div class=\"alert alert-error alert-dismissable\" style=\"display:none\" id=\"div_mensagem\">
        <span id=\"mensagem\"></span>
    </div>
    <div class=\"sonata-ba-form\">
        <form role=\"form\" action=\"/admin/aula/save\" method=\"POST\">
            <input type=\"hidden\" id='id' name=\"id\" value=\"{{ Model.getId() }}\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"box box-primary\">
                                <div class=\"box-header\">
                                    <h4 class=\"box-title\">
                                        Registro de Aula
                                    </h4>
                                </div>
                                <div class=\"box-body\">
                                    {% include 'admin/aula/aulaCabecalhoPartial.html.twig'
                                        with {  'Model': Model }
                                    %}
                                    <div class=\"form-group\">
                                        <label class=\"control-label required\">
                                            Data
                                        </label>
                                        <div class=\"sonata-ba-field sonata-ba-field-standard-natural\">
                                            <input id=\"data\" type=\"date\" name=\"data\" required=\"required\" class=\"form-control\"
                                                   {{ (Aula is defined) ? 'readonly' : '' }}
                                                   value=\"{{ (Aula is defined) ? Aula.getData()|date('Y-m-d') : '' }}\"
                                                   autofocus>
                                            <br/>
                                            <button type=\"button\" class=\"btn btn-success\" name=\"btn_ok\" id=\"btn_ok\">
                                                <i class=\"fa fa-check\" aria-hidden=\"true\"></i> OK
                                            </button>
                                            <button type=\"reset\" class=\"btn btn-warning\" name=\"btn_reset\" id=\"btn_reset\">
                                                <i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> Limpar
                                            </button>
                                        </div>
                                    </div>
                                    <div id=\"aulaRegisterPartial\">
                                        {% if Aula is defined %}
                                            {% include 'admin/aula/aulaRegisterPartial.html.twig'
                                                with {  'Model': Aula }
                                            %}
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id=\"botoes\" class=\"sonata-ba-form-actions well well-small form-actions\" {{ (Aula is defined) ? '' : 'style=\"visibility:hidden' }}\">
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_update_and_edit\" value=\"1\">  <i class=\"fa fa-save\" aria-hidden=\"true\"></i> Gravar e manter</button>
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_update_and_list\" value=\"2\">  <i class=\"fa fa-save\"></i> <i class=\"fa fa-list\" aria-hidden=\"true\"></i> Gravar e sair</button>
                <button type=\"submit\" class=\"btn btn-success\" name=\"btn_create_and_create\" value=\"3\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Gravar e adicionar outra aula</button>
            </div>
        </form>
    </div>

    <script type=\"text/javascript\">

        function exibirMensagemSucesso(mensagem){
            \$(\"#div_mensagem\").css(\"display\", \"block\");
            \$(\"#mensagem\").html(mensagem);
            \$(\"#div_mensagem\").removeClass('alert-error');
            \$(\"#div_mensagem\").addClass(\"alert-success\");
        }

        function exibirMensagemErro(mensagem){
            \$(\"#div_mensagem\").css(\"display\", \"block\");
            \$(\"#mensagem\").html(mensagem);
            \$(\"#div_mensagem\").removeClass('alert-success');
            \$(\"#div_mensagem\").addClass(\"alert-error\");
        }

        function esconderMensagem(){
            \$(\"#div_mensagem\").css(\"display\", \"none\");
        }

        \$(document).ajaxStart(function() {
            \$(\".loading\").css(\"display\", \"block\");
            \$(\".divOpacity\").css(\"display\", \"block\");
        });

        \$(document).ajaxStop(function()
        {
            \$(\".loading\").css(\"display\", \"none\");
            \$(\".divOpacity\").css(\"display\", \"none\");
        });

        \$(function() {

            var mensagem = '{{ (Mensagem is defined) ? Mensagem : '' }}';
            if(mensagem != ''){
                //\$(\"#data\").attr('readonly', 'readonly');
                exibirMensagemSucesso(mensagem);
            }

            \$(\"#btn_ok\").click(function() {
                if(\$('#data')[0].checkValidity())
                {
                    \$.post(
                        \"/admin/aula/listFrequencia\",
                        {
                            id:   \$(\"#id\").val(),
                            data: \$(\"#data\").val()
                        },
                        function( response ) {
                            if(response.status == 'success') {
                                \$(\"#aulaRegisterPartial\").html(response.data);
                                \$(\"#data\").attr('readonly', 'readonly');
                                \$(\"#botoes\").css(\"visibility\", \"visible\");
                                esconderMensagem();
                            }else {
                                exibirMensagemErro(response.data);
                            }
                        }
                    );
                }else {
                    exibirMensagemErro('Favor preencher o campo com uma data válida!');
                }
            });

            \$(\"#btn_reset\").click(function() {
                \$(\"#aulaRegisterPartial\").html('');
                \$(\"#data\").removeAttr('readonly');
                \$(\"#data\").focus();
                \$(\"#botoes\").css(\"visibility\",\"hidden\");
                \$(\"#div_mensagem\").css(\"display\", \"none\");
            });

        });

    </script>

{% endblock %}", "admin\\aula\\aulaRegister.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\aulaRegister.html.twig");
    }
}
