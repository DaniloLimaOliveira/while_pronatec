<?php

/* admin\aula\aulaList.html.twig */
class __TwigTemplate_67c9f197d6f26bf161d040da101ed78e4416ebe407dda4b3ae4c6f66a7cbcfa0 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@SonataAdmin/standard_layout.html.twig", "admin\\aula\\aulaList.html.twig", 1);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaList.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaList.html.twig"));

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
        echo "    <div class=\"box box-primary\" style=\"margin-bottom: 100px;\">
        <div class=\"box-body table-responsive no-padding\">
            <table class=\"table table-bordered table-striped sonata-ba-list\">
                <thead>
                    <tr class=\"sonata-ba-list-field-header\">
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Curso
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Turma
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Turno
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Disciplina
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Professor
                        </th>
                        <th class=\"sonata-ba-list-field-header-actions\">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    ";
        // line 31
        if ( !twig_test_empty((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 31, $this->source); })()))) {
            // line 32
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 32, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cargaHoraria"]) {
                // line 33
                echo "                            <tr>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getId", array(), "method"), "html", null, true);
                echo "\">
                                    ";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getTurma", array(), "method"), "getCurso", array(), "method"), "getNome", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getTurma", array(), "method"), "getNome", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getTurma", array(), "method"), "getTurno", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getDisciplina", array(), "method"), "getNome", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getColaborador", array(), "method"), "getNome", array(), "method"), "html", null, true);
                echo "
                                </td>

                                <td class=\"sonata-ba-list-field sonata-ba-list-field-actions\">
                                    <div class=\"btn-group\">
                                        <a href=\"/admin/aula/";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getId", array(), "method"), "html", null, true);
                echo "/register\" class=\"btn btn-sm btn-default edit_link\" title=\"Registrar Aula\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                            Registrar
                                        </a>
                                        <a href=\"/admin/aula/";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cargaHoraria"], "getId", array(), "method"), "html", null, true);
                echo "/show\" class=\"btn btn-sm btn-default view_link\" title=\"Consultar Aulas\">
                                            <i class=\"fa fa-search\" aria-hidden=\"true\"></i>
                                            Consultar
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargaHoraria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "                    ";
        }
        // line 66
        echo "                </tbody>
            </table>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "admin\\aula\\aulaList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 66,  150 => 65,  135 => 56,  128 => 52,  120 => 47,  114 => 44,  108 => 41,  102 => 38,  96 => 35,  92 => 34,  89 => 33,  84 => 32,  82 => 31,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@SonataAdmin/standard_layout.html.twig' %}

{% block sonata_admin_content %}
    <div class=\"box box-primary\" style=\"margin-bottom: 100px;\">
        <div class=\"box-body table-responsive no-padding\">
            <table class=\"table table-bordered table-striped sonata-ba-list\">
                <thead>
                    <tr class=\"sonata-ba-list-field-header\">
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Curso
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Turma
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Turno
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Disciplina
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Professor
                        </th>
                        <th class=\"sonata-ba-list-field-header-actions\">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    {% if Model is not empty %}
                        {% for cargaHoraria in Model %}
                            <tr>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"{{cargaHoraria.getId()}}\">
                                    {{ cargaHoraria.getTurma().getCurso().getNome() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ cargaHoraria.getTurma().getNome() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ cargaHoraria.getTurma().getTurno() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ cargaHoraria.getDisciplina().getNome() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ cargaHoraria.getColaborador().getNome() }}
                                </td>

                                <td class=\"sonata-ba-list-field sonata-ba-list-field-actions\">
                                    <div class=\"btn-group\">
                                        <a href=\"/admin/aula/{{cargaHoraria.getId()}}/register\" class=\"btn btn-sm btn-default edit_link\" title=\"Registrar Aula\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                            Registrar
                                        </a>
                                        <a href=\"/admin/aula/{{cargaHoraria.getId()}}/show\" class=\"btn btn-sm btn-default view_link\" title=\"Consultar Aulas\">
                                            <i class=\"fa fa-search\" aria-hidden=\"true\"></i>
                                            Consultar
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        {% endfor %}
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
{% endblock %}", "admin\\aula\\aulaList.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\aulaList.html.twig");
    }
}
