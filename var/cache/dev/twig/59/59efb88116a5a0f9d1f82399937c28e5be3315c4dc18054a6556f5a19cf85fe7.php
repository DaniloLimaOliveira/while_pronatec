<?php

/* admin\aula\aulaCabecalhoPartial.html.twig */
class __TwigTemplate_0a0af62c70a248873007f9b3650bb9655b52eccaa1173db94c9c381bc09d0e73 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaCabecalhoPartial.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin\\aula\\aulaCabecalhoPartial.html.twig"));

        // line 1
        echo "<div class=\"sonata-ba-collapsed-fields\">
    <div class=\"sonata-ba-field\">
        <label class=\"control-label\">
            Curso: ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 4, $this->source); })()), "getTurma", array(), "method"), "getCurso", array(), "method"), "getNome", array(), "method"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 4, $this->source); })()), "getTurma", array(), "method"), "getNome", array(), "method"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 4, $this->source); })()), "getTurma", array(), "method"), "getTurno", array(), "method"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 4, $this->source); })()), "getDisciplina", array(), "method"), "getNome", array(), "method"), "html", null, true);
        echo "
        </label>
    </div>
    <div class=\"sonata-ba-field\">
        <label class=\"control-label\">
            Professor:  ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Model"]) || array_key_exists("Model", $context) ? $context["Model"] : (function () { throw new Twig_Error_Runtime('Variable "Model" does not exist.', 9, $this->source); })()), "getColaborador", array(), "method"), "getNome", array(), "method"), "html", null, true);
        echo "
        </label>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin\\aula\\aulaCabecalhoPartial.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  34 => 4,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"sonata-ba-collapsed-fields\">
    <div class=\"sonata-ba-field\">
        <label class=\"control-label\">
            Curso: {{ Model.getTurma().getCurso().getNome() }} - {{ Model.getTurma().getNome() }} - {{ Model.getTurma().getTurno() }} - {{ Model.getDisciplina().getNome() }}
        </label>
    </div>
    <div class=\"sonata-ba-field\">
        <label class=\"control-label\">
            Professor:  {{ Model.getColaborador().getNome() }}
        </label>
    </div>
</div>
", "admin\\aula\\aulaCabecalhoPartial.html.twig", "C:\\Pronatec\\pronatec\\templates\\admin\\aula\\aulaCabecalhoPartial.html.twig");
    }
}
