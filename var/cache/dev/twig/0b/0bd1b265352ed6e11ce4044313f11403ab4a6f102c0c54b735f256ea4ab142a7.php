<?php

/* admin\aula\aulaShow.html.twig */
class __TwigTemplate_c37bd2b2f6585c4150949337f911fbff7bb88edeb48f6d9bbb7448d22f172452 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@SonataAdmin/standard_layout.html.twig", "admin\\aula\\aulaShow.html.twig", 1);
        $this->blocks = array(
            'sonata_page_content_header' => array($this, 'block_sonata_page_content_header'),
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaShow.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaShow.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_sonata_page_content_header($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_page_content_header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_page_content_header"));

        // line 4
        echo "    ";
        $this->loadTemplate("admin/aula/aulaCabecalhoPartial.html.twig", "admin\\aula\\aulaShow.html.twig", 4)->display(array_merge($context, array("Model" =>         // line 5
(isset($context["CargaHoraria"]) || array_key_exists("CargaHoraria", $context) ? $context["CargaHoraria"] : (function () { throw new Twig_Error_Runtime('Variable "CargaHoraria" does not exist.', 5, $this->source); })()))));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 9
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_admin_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_admin_content"));

        // line 10
        echo "    <div class=\"box box-primary\" style=\"margin-bottom: 100px;\">
        <div class=\"box-body table-responsive no-padding\">
            <table class=\"table table-bordered table-striped sonata-ba-list\">
                <thead>
                    <tr class=\"sonata-ba-list-field-header\">
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Data
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Tipo Aula
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Horas
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Conteúdo
                        </th>
                        <th class=\"sonata-ba-list-field-header-actions\">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    ";
        // line 34
        if ( !twig_test_empty((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 34, $this->source); })()))) {
            // line 35
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 35, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["aula"]) {
                // line 36
                echo "                            <tr>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getId", array(), "method"), "html", null, true);
                echo "\">
                                    ";
                // line 38
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getData", array(), "method"), "d-m-Y"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getTipoAula", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getQuantidadeHoras", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    ";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getConteudoMinistrado", array(), "method"), "html", null, true);
                echo "
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-actions\">
                                    <div class=\"btn-group\">
                                        <a href=\"/admin/aula/";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getId", array(), "method"), "html", null, true);
                echo "/register?idAula=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aula"], "getId", array(), "method"), "html", null, true);
                echo "\" class=\"btn btn-sm btn-default edit_link\" title=\"Editar\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                            Editar
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['aula'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                    ";
        }
        // line 61
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
        return "admin\\aula\\aulaShow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 61,  157 => 60,  140 => 51,  133 => 47,  127 => 44,  121 => 41,  115 => 38,  111 => 37,  108 => 36,  103 => 35,  101 => 34,  75 => 10,  66 => 9,  56 => 5,  54 => 4,  45 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@SonataAdmin/standard_layout.html.twig' %}

{% block sonata_page_content_header %}
    {% include 'admin/aula/aulaCabecalhoPartial.html.twig'
        with {  'Model': CargaHoraria }
    %}
{% endblock %}

{% block sonata_admin_content %}
    <div class=\"box box-primary\" style=\"margin-bottom: 100px;\">
        <div class=\"box-body table-responsive no-padding\">
            <table class=\"table table-bordered table-striped sonata-ba-list\">
                <thead>
                    <tr class=\"sonata-ba-list-field-header\">
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Data
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Tipo Aula
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Horas
                        </th>
                        <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                            Conteúdo
                        </th>
                        <th class=\"sonata-ba-list-field-header-actions\">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    {% if Model is not empty %}
                        {% for aula in Model %}
                            <tr>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"{{aula.getId()}}\">
                                    {{ aula.getData()|date('d-m-Y') }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ aula.getTipoAula() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ aula.getQuantidadeHoras() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                                    {{ aula.getConteudoMinistrado() }}
                                </td>
                                <td class=\"sonata-ba-list-field sonata-ba-list-field-actions\">
                                    <div class=\"btn-group\">
                                        <a href=\"/admin/aula/{{aula.getId()}}/register?idAula={{aula.getId()}}\" class=\"btn btn-sm btn-default edit_link\" title=\"Editar\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                            Editar
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
{% endblock %}", "admin\\aula\\aulaShow.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\aulaShow.html.twig");
    }
}
