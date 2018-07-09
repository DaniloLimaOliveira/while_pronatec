<?php

/* admin\aula\frequenciaRegisterPartial.html.twig */
class __TwigTemplate_1f68ddaef8246a49e3a3aa0ae4133877807548f75e32a4489894638df0e6dfaa extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\frequenciaRegisterPartial.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\frequenciaRegisterPartial.html.twig"));

        // line 1
        echo "<div class=\"box-body table-responsive no-padding\">
    <table class=\"table table-bordered table-striped sonata-ba-list\">
        <thead>
        <tr class=\"sonata-ba-list-field-header\">
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Aluno
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Presente
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Falta
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Falta Justificada
            </th>
        </tr>
        </thead>

        <tbody>
        ";
        // line 21
        if ( !twig_test_empty((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 21, $this->source); })()))) {
            // line 22
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 22, $this->source); })()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["frequencia"]) {
                // line 23
                echo "                <tr>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getId", array(), "method"), "html", null, true);
                echo "\">
                        ";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getMatricula", array(), "method"), "getAluno", array(), "method"), "getNome", array(), "method"), "html", null, true);
                echo "
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getId", array(), "method"), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getMatricula", array(), "method"), "getId", array(), "method"), "html", null, true);
                echo "_P\" ";
                echo (((twig_get_attribute($this->env, $this->source, $context["frequencia"], "getTipoFrequencia", array(), "method") == "P")) ? ("checked") : (""));
                echo ">
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getId", array(), "method"), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getMatricula", array(), "method"), "getId", array(), "method"), "html", null, true);
                echo "_F\" ";
                echo (((twig_get_attribute($this->env, $this->source, $context["frequencia"], "getTipoFrequencia", array(), "method") == "F")) ? ("checked") : (""));
                echo ">
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getId", array(), "method"), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["frequencia"], "getMatricula", array(), "method"), "getId", array(), "method"), "html", null, true);
                echo "_FJ\" ";
                echo (((twig_get_attribute($this->env, $this->source, $context["frequencia"], "getTipoFrequencia", array(), "method") == "FJ")) ? ("checked") : (""));
                echo ">
                    </td>
                </tr>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['frequencia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "        ";
        }
        // line 39
        echo "        </tbody>
    </table>
</div>

<script>
    \$(\"input\").iCheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
</script>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin\\aula\\frequenciaRegisterPartial.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 39,  132 => 38,  108 => 34,  96 => 31,  84 => 28,  78 => 25,  74 => 24,  71 => 23,  53 => 22,  51 => 21,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"box-body table-responsive no-padding\">
    <table class=\"table table-bordered table-striped sonata-ba-list\">
        <thead>
        <tr class=\"sonata-ba-list-field-header\">
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Aluno
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Presente
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Falta
            </th>
            <th class=\"sonata-ba-list-field-header-text  sonata-ba-list-field-header-order-asc\">
                Falta Justificada
            </th>
        </tr>
        </thead>

        <tbody>
        {% if Model is not empty %}
            {% for frequencia in Model %}
                <tr>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\" objectId=\"{{frequencia.getId()}}\">
                        {{ frequencia.getMatricula().getAluno().getNome() }}
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_{{loop.index}}\" value=\"{{frequencia.getId()}}_{{frequencia.getMatricula().getId()}}_P\" {{ (frequencia.getTipoFrequencia() == 'P') ? 'checked' : '' }}>
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_{{loop.index}}\" value=\"{{frequencia.getId()}}_{{frequencia.getMatricula().getId()}}_F\" {{ (frequencia.getTipoFrequencia() == 'F') ? 'checked' : '' }}>
                    </td>
                    <td class=\"sonata-ba-list-field sonata-ba-list-field-text\">
                        <input type=\"radio\" name=\"frequencia_{{loop.index}}\" value=\"{{frequencia.getId()}}_{{frequencia.getMatricula().getId()}}_FJ\" {{ (frequencia.getTipoFrequencia() == 'FJ') ? 'checked' : '' }}>
                    </td>
                </tr>
            {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<script>
    \$(\"input\").iCheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
</script>", "admin\\aula\\frequenciaRegisterPartial.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\frequenciaRegisterPartial.html.twig");
    }
}
